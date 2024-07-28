<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TicketFormController extends Controller
{
    public function __construct()
    {
        //maximum 1 ticket creation in a minute
        $this->middleware('throttle:1,1')->only('store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.user.dashboard');
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
    public function store(TicketFormRequest $request)
    {
        $request->validated();
        $postData = $request->all();

        $fileName = null;
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $fileName = 'ticket_' . time() . $postData['user_id'] . '.' . $attachment->getClientOriginalExtension();
            $attachment->storeAs('attachments', $fileName, 'public');
        }
        Ticket::create([
            'authorName' => fake()->name('mixed'), 'author_id' => $postData['user_id'], 'ticketTitle' => $postData['title'], 'description' => $postData['description'], 'attachment' => $fileName, 'severity' => $postData['severity'], 'status' => fake()->randomElement(['Open', 'Closed']),
        ]);

        return redirect()->back()->with([
            "success" => "Ticket submitted successfully",
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
