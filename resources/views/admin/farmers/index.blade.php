@extends('layouts.index')

@section('content')
    @if (session()->has('message'))
        <div id="success-alert" class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div id="error-alert" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <script>
        // Function to hide the alert after a specified number of milliseconds
        function hideAlert(alertId, delay) {
            setTimeout(function() {
                document.getElementById(alertId).style.display = 'none';
            }, delay);
        }

        // Automatically hide success alert after 3 seconds
        if (document.getElementById('success-alert')) {
            hideAlert('success-alert', 3000);
        }

        // Automatically hide error alert after 3 seconds
        if (document.getElementById('error-alert')) {
            hideAlert('error-alert', 3000);
        }
    </script>

    <div class="pagetitle">
        <h1>Farmers Data</h1>
        <nav>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item active">Farmers Data</li> --}}
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="add-employee mb-3 mt-3">
                            <a href="{{ url('create-add') }}" class="btn btn-primary">
                                <i class="bi bi-plus"></i> Add Farmer
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-3" style="display: none;">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                        </div>

                        <div class="row d-flex justify-content-end mt-3">
                            <div class="col-md-2">
                                <div id="commoditiesFilterDisplay" style="display: none;"></div>
                            </div>
                            <div class="col-md-2">
                                <select id="barangayFilter" class="form-select" aria-label="Barangay Filter">
                                    <option value="">All Barangays</option>
                                    @foreach ($barangays as $barangay)
                                        <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <div class="dropdown" style="margin-left: 10px;">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="commoditiesDropdown" data-bs-toggle="dropdown" style="background-color: white; border: 1px solid #ccc;">
                                        Commodities
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="commoditiesDropdown">
                                        <li>
                                            <input class="form-check-input" type="checkbox" value="all" id="commodityCheckboxAll">
                                            <label class="form-check-label" for="commodityCheckboxAll">All Commodities</label>
                                        </li>
                                        @foreach ($commodities as $commodity)
                                            <li>
                                                <input class="form-check-input commodity-checkbox" type="checkbox" value="{{ $commodity->id }}" id="commodityCheckbox{{ $commodity->id }}">
                                                <label class="form-check-label" for="commodityCheckbox{{ $commodity->id }}">{{ $commodity->commodities }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <select name="statusFilter" id="statusFilter" class="form-select" aria-label="Status Filter">
                                    <option value="">All Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Commodities</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmers as $farmer)
                                        <tr data-barangay="{{ $farmer->barangay->id }}"
                                            data-commodities="{{ implode(',', $farmer->crops->pluck('commodities_id')->toArray()) }}"
                                            data-status="{{ $farmer->status }}">
                                            <td>{{ $farmer->farmersNumbers?->first()?->farmersnumber ?? 'No Data' }}</td>
                                            <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                            <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                            <td>
                                                @php
                                                    $farmerCommodities = $farmer->crops->pluck('commodities_id')->toArray();
                                                    $selectedCommodities = $selectedCommodities ?? []; // Ensure $selectedCommodities is an array

                                                    $selectedFarmerCommodities = array_intersect($farmerCommodities, $selectedCommodities);

                                                    if (!empty($selectedFarmerCommodities)) {
                                                        $selectedCommodityNames = $commodities->whereIn('id', $selectedFarmerCommodities)->pluck('commodities')->toArray();
                                                        echo implode('<br>', $selectedCommodityNames);
                                                    } else {
                                                        echo 'No Data';
                                                    }
                                                @endphp
                                            </td>

                                            <td>
                                                @if ($farmer->status === 'Active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('generate.pdf', ['id' => $farmer->id]) }}" class="btn btn-sm btn-info" style="margin-right: 10px;">
                                                        <i class="fa fa-file-pdf"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>

                                                    <a href="{{ route('farmers.showed', ['id' => $farmer->id]) }}" class="btn btn-sm btn-info" style="margin-right: 10px;">
                                                        <i class="fa fa-eye"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>

                                                    <a href="{{ route('farmers.edit', ['id' => $farmer->id]) }}" class="btn btn-sm btn-primary" style="margin-right: 10px;">
                                                        <i class="fa fa-pencil"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>

                                                    <a href="{{ route('farmers.generate', ['id' => $farmer->id]) }}" class="btn btn-sm btn-secondary">
                                                        <i class="fa fa-cog"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .status-circle {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .active {
            background-color: green;
        }

        .inactive {
            background-color: red;
        }

        .dataTables_length {
            margin-bottom: 20px;
            /* Adjust the margin as needed */
        }
    </style>
</div>


<script>
// JavaScript variable containing the mapping of commodity IDs to names
var commodityMap = {
    @foreach ($commodities as $commodity)
        {{ $commodity->id }}: '{{ $commodity->commodities }}',
    @endforeach
};

// Keep track of the selected commodity IDs
var selectedCommodityIds = [];

$(document).ready(function() {
    $('#myTable').DataTable({
        "lengthMenu": [10, 25, 50, 100], // Set your desired entries per page values
        "pageLength": 10, // Default number of entries per page
        "pagingType": "full_numbers", // Use full pagination control
        // Disable the search bar
    });

    // Event listener for changing the number of entries per page
    $('#showEntries').on('change', function() {
        var entriesPerPage = parseInt($(this).val());
        $('#myTable').DataTable().page.len(entriesPerPage).draw();
    });

    // Event listener for checkboxes
    $('.commodity-checkbox').on('change', function() {
        updateSelectedCommodities();
        filterTable();
    });

    // Event listener for the "All Commodities" checkbox
    $('#commodityCheckboxAll').on('change', function() {
        // If "All Commodities" is checked, uncheck all other checkboxes
        if ($(this).is(':checked')) {
            $('.commodity-checkbox').prop('checked', false);
        }
        updateSelectedCommodities();
        filterTable();
    });

    // Update the selectedCommodityIds array based on the checkboxes
    function updateSelectedCommodities() {
        selectedCommodityIds = [];

        if ($('#commodityCheckboxAll').is(':checked')) {
            selectedCommodityIds.push('all');
        } else {
            $('.commodity-checkbox:checked').each(function() {
                selectedCommodityIds.push($(this).val());
            });
        }
    }



        // Function to filter the table based on selected filters
        function filterTable() {
            var selectedBarangayIds = $('#barangayFilter').val();
            var selectedStatus = $('#statusFilter').val();
            var searchText = $('#search').val().toLowerCase();

            $('#myTable tbody tr').each(function() {
                var tr = $(this);
                var trBarangayId = tr.data('barangay');
                var trCommodities = tr.data('commodities').split(',').map(Number);
                var trStatus = tr.data('status');
                var trText = tr.text().toLowerCase();

                var showRow = true;

                if (selectedBarangayIds.length > 0 && selectedBarangayIds[0] !== '') {
                    // Check if the row's barangay is in the selected barangays
                    if (!selectedBarangayIds.includes(trBarangayId.toString())) {
                        showRow = false;
                    }
                }

                if (selectedStatus !== '' && selectedStatus != trStatus) {
                    showRow = false;
                }

                if (searchText !== '' && !trText.includes(searchText)) {
                    showRow = false;
                }

                if (selectedCommodityIds.length > 0 && !selectedCommodityIds.includes('all')) {
                    // Check if the row's commodities match any of the selected commodities
                    var hasSelectedCommodity = trCommodities.some(commodityId => selectedCommodityIds.includes(commodityId.toString()));

                    if (hasSelectedCommodity) {
                        // Update the displayed commodities in the table cell
                        var displayedCommodities = trCommodities.filter(commodityId => selectedCommodityIds.includes(commodityId.toString())).map(commodityId => commodityMap[commodityId]);
                        tr.find('td:eq(3)').html(displayedCommodities.join('<br>'));
                    } else {
                        // If the farmer doesn't have the selected commodities, show "No Data"
                        tr.find('td:eq(3)').html('No Data');
                    }
                } else {
                    // If no specific commodities are selected, show all the commodities for the farmer
                    var allCommodities = trCommodities.map(commodityId => commodityMap[commodityId]);
                    tr.find('td:eq(3)').html(allCommodities.length > 0 ? allCommodities.join('<br>') : 'No Data');
                }

                if (showRow) {
                    tr.show();
                } else {
                    tr.hide();
                }
            });
        }

        // Add the event listener for changes in the filters
        $('#barangayFilter, #statusFilter, #search').on('change keyup', function() {
            filterTable();
        });

        // Initial filter when the page loads
        filterTable();
        updateCommoditiesFilterDisplay(); // Initial update of the displayed commodities in the filter
    });
</script>

@endsection
