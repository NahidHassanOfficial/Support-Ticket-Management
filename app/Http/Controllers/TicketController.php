<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filteringOptions = $request->all();
        $query = Ticket::query();

        if (isset($filteringOptions['severity'])) {
            $query->where('severity', $filteringOptions['severity']);
        }

        if (isset($filteringOptions['status'])) {
            $query->where('status', $filteringOptions['status']);
        }

        if (isset($filteringOptions['orderBy']) && in_array($filteringOptions['orderBy'], ['asc', 'desc'])) {
            $query->orderBy('created_at', $filteringOptions['orderBy']);
        }

        if (isset($filteringOptions['search'])) {
            $search = trim($filteringOptions['search']); // Sanitize the input
            $query->where(function ($q) use ($search) {
                $q->where('ticketTitle', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $data = $query->paginate(10)->withQueryString();

        return view('layouts.admin.dashboard', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function filterTicket(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:Open,Closed',
            // 'closedBy' => 'sometimes|required_if:status,Closed|integer',
            // |exists:users,id
        ]);

        $ticket->update($validatedData);
        return response()->json(['message' => 'Ticket updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
