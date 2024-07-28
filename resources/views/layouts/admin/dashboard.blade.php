<x-layouts.home>
    <x-ticketmanager.components.navbar></x-ticketmanager.components.navbar>
    <x-ticketmanager.components.mobileMenu></x-ticketmanager.components.mobileMenu>
    <x-ticketmanager.components.ticketSorting></x-ticketmanager.components.ticketSorting>
    <x-ticketmanager.layouts.ticketsLayout :result="count($data)">

        @foreach ($data as $ticket)
            <x-ticketmanager.components.tickets :$ticket></x-ticketmanager.components.tickets>
        @endforeach

    </x-ticketmanager.layouts.ticketsLayout>

</x-layouts.home>
