    <div class="card col-md-10 col-lg-9 text-center p-3 overflow-hidden d-flex flex-column justify-content-evenly">
        <div class="text-success fw-semibold align-self-start mb-2">Total Result: {{ $result }}</div>

        <div class="d-flex flex-column gap-3">

            {{ $slot }}

        </div>
    </div>
