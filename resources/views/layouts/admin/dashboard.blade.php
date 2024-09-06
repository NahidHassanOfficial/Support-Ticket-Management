<x-layouts.home>
    <x-ticketmanager.components.navbar></x-ticketmanager.components.navbar>
    <x-ticketmanager.components.mobileMenu></x-ticketmanager.components.mobileMenu>
    <x-ticketmanager.components.ticketSorting></x-ticketmanager.components.ticketSorting>
    {{-- <x-ticketmanager.layouts.ticketsLayout :result="count($data)"> --}}
    <x-ticketmanager.layouts.ticketsLayout :result="$data->total()">

        @foreach ($data as $ticket)
            <x-ticketmanager.components.tickets :$ticket></x-ticketmanager.components.tickets>
        @endforeach

        {{ $data->links('pagination::bootstrap-5') }}

        <script>
            async function updateTicketStatus(status, url) {
                try {
                    const data = {
                        _method: 'PATCH',
                        'status': status == 'Open' ? 'Closed' : 'Open',
                    };
                    const response = await axios.post(url, data);
                    location.reload();
                } catch (error) {
                    console.error('Error updating ticket status:', error);
                }
            }
        </script>

    </x-ticketmanager.layouts.ticketsLayout>

</x-layouts.home>
