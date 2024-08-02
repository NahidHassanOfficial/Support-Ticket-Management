    <div class="sortingOptions bg-light shadow-sm col-md-10 col-lg-9 sticky-lg-top">
        <div class="d-none d-md-flex flex-wrap justify-content-center text-center gap-3 mb-2 ">
            <div class="col-md-2 border rounded p-2 bg-light">
                <label for="severity" class="form-label">Severity</label>
                <select class="form-select form-select-md text-center" name="severity" id="severity">
                    <option value="default" selected>Default</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div class=" col-md-2 border rounded p-2 bg-light">
                <label for="status" class="form-label">Filter Tickets</label>
                <select class="form-select form-select-md text-center" name="status" id="status">
                    <option value="default" selected>Default</option>
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
            <div class="col-md-2 border rounded p-2 bg-light">
                <label for="orderBy" class="form-label">Order By</label>
                <select class="form-select form-select-md text-center" name="orderBy" id="orderBy">
                    <option value="default" selected>Default</option>
                    <option value="desc">New</option>
                    <option value="asc">Old</option>
                </select>
            </div>
            <div class="col-md-2 border rounded p-2 bg-light d-flex flex-column gap-1">
                <input type="text" class="rounded px-2" id="search">
                <button type="button" class="btn btn-dark" id="search-button">Search</button>
            </div>
        </div>
    </div>

    <script>
        // Get the select elements
        const severitySelect = document.getElementById('severity');
        const statusSelect = document.getElementById('status');
        const orderBySelect = document.getElementById('orderBy');
        const searchInput = document.getElementById('search');
        const searchButton = document.getElementById('search-button');

        // Function to update the URL parameters and navigate to the new URL
        function updateUrlParams(event) {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);

            // Check if the selected value is the default value
            if (event.target.value === 'default') {
                // Remove the parameter from the URL
                params.delete(event.target.id);
            } else {
                // Update the parameter value in the URL
                params.set(event.target.id, event.target.value);
            }

            url.search = params.toString();
            window.location.href = url.href;
        }

        // Function to update the select elements based on URL parameters
        function updateSelectElements() {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);

            // Update the select elements based on URL parameters
            if (params.has('severity')) {
                severitySelect.value = params.get('severity');
            } else {
                severitySelect.value = 'default';
            }
            if (params.has('status')) {
                statusSelect.value = params.get('status');
            } else {
                statusSelect.value = 'default';
            }
            if (params.has('orderBy')) {
                orderBySelect.value = params.get('orderBy');
            } else {
                orderBySelect.value = 'default';
            }

            // Update the input box based on URL parameter
            if (params.has('search')) {
                searchInput.value = params.get('search');
                if (searchInput.value === '') {
                    params.delete('search');
                    url.search = params.toString();
                    window.location.href = url.href;
                }
            } else {
                searchInput.value = '';
            }
        }

        // Function to handle search button click
        function handleSearchButtonClick() {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);

            // Update the search parameter if input value is not null
            if (searchInput.value.trim() !== '') {
                // Update the search parameter value in the URL
                params.set('search', searchInput.value.trim());

                url.search = params.toString();
                window.location.href = url.href;
            }
        }

        // Add event listener to the search input for enter key press
        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                handleSearchButtonClick();
            }
        });

        // Add event listeners to the select elements
        severitySelect.addEventListener('change', updateUrlParams);
        statusSelect.addEventListener('change', updateUrlParams);
        orderBySelect.addEventListener('change', updateUrlParams);
        searchButton.addEventListener('click', handleSearchButtonClick);

        // Update the select elements on page load
        updateSelectElements();
    </script>
