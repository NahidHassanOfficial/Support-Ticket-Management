        <div class="offcanvas offcanvas-end w-50 p-3" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="d-flex flex-column justify-content-center gap-3 mb-2">
                <div class="col-md-2">
                    <label for="severity" class="form-label">Severity</label>
                    <select class="form-select form-select-md" name="severity" id="severity-mobile">
                        <option value="default" selected>Default</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="status" class="form-label">Filter Tickets</label>
                    <select class="form-select form-select-md" name="status" id="status-mobile">
                        <option value="default" selected>Default</option>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="orderBy" class="form-label">Order By</label>
                    <select class="form-select form-select-md" name="orderBy" id="orderBy-mobile">
                        <option value="default" selected>Default</option>
                        <option value="desc">New</option>
                        <option value="asc">Old</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex flex-column gap-1">
                    <input type="text" class="rounded px-2" id="search-mobile">
                    <button type="button" class="btn btn-dark" id="search-button-mobile">Search</button>
                </div>
            </div>
        </div>


        <script>
            // Get the select elements
            const severitySelectMobile = document.getElementById('severity-mobile');
            const statusSelectMobile = document.getElementById('status-mobile');
            const orderBySelectMobile = document.getElementById('orderBy-mobile');
            const searchInputMobile = document.getElementById('search-mobile');
            const searchButtonMobile = document.getElementById('search-button-mobile');

            // Function to update the URL parameters and navigate to the new URL
            function updateUrlParams(event) {
                const url = new URL(window.location.href);
                const params = new URLSearchParams(url.search);

                // Remove the '-mobile' suffix from the ID
                const paramName = event.target.id.replace('-mobile', '');

                // Check if the selected value is the default value
                if (event.target.value === 'default') {
                    // Remove the parameter from the URL
                    params.delete(paramName);
                } else {
                    // Update the parameter value in the URL
                    params.set(paramName, event.target.value);
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
                    severitySelectMobile.value = params.get('severity');
                } else {
                    severitySelectMobile.value = 'default';
                }
                if (params.has('status')) {
                    statusSelectMobile.value = params.get('status');
                } else {
                    statusSelectMobile.value = 'default';
                }
                if (params.has('orderBy')) {
                    orderBySelectMobile.value = params.get('orderBy');
                } else {
                    orderBySelectMobile.value = 'default';
                }
                if (params.has('search')) {
                    searchInputMobile.value = params.get('search');
                } else {
                    searchInputMobile.value = '';
                }
            }

            // Function to handle search button click
            function handleSearchButtonClick() {
                const url = new URL(window.location.href);
                const params = new URLSearchParams(url.search);

                // Update the search parameter value in the URL
                params.set('search', searchInputMobile.value);

                url.search = params.toString();
                window.location.href = url.href;
            }


            // Add event listeners to the select elements
            severitySelectMobile.addEventListener('change', updateUrlParams);
            statusSelectMobile.addEventListener('change', updateUrlParams);
            orderBySelectMobile.addEventListener('change', updateUrlParams);
            searchButtonMobile.addEventListener('click', handleSearchButtonClick);

            // Update the select elements on page load
            updateSelectElements();
        </script>
