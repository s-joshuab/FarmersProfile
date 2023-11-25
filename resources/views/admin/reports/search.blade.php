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


{{-- <script>
    // Function to hide the alert after a specified number of milliseconds
    function hideAlert(alertId, delay) {
        setTimeout(function() {
            document.getElementById(alertId).style.display = 'none';
        }, delay);
    }

    // Automatically hide success alert after 3 seconds
    if (document.getElementById('success-alert')) {
        hideAlert('success-alert', 10000);
    }

    // Automatically hide error alert after 3 seconds
    if (document.getElementById('error-alert')) {
        hideAlert('error-alert', 10000);
    }
</script> --}}

<div class="pagetitle">

    <nav>
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item active">Farmers Data</li> --}}
        </ol>
    </nav>
</div>
<!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-md-3" style="display: none;">
            <input type="text" id="search" class="form-control" placeholder="Search">
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5>Search</h5>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-2 mb-3">
                        <input type="text" id="blnNumberFilter" class="form-control" placeholder="BLN Number">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" id="nameFilter" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-2 mb-3">
                        <input type="text" id="farmSizeFilter" class="form-control" placeholder="Farm Size">
                    </div>

                    <div class="col-md-2 mb-3">
                        <input type="text" id="farmLocationFilter" class="form-control" placeholder="Farm Location">
                    </div>
                    <div class="col-md-3 mb-3">
                        <select id="benefitsFilter" class="form-select" aria-label="Benefits Filter">
                            <option value="">All Benefits</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                </div>

                <div class="row justify-content-center mt-3">
                <div class="col-md-3 mb-3">
                    <select id="barangayFilter" class="form-select" aria-label="Barangay Filter">
                        <option value="">All Barangays</option>
                        @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <select name="statusFilter" id="statusFilter" class="form-select" aria-label="Status Filter">
                        <option value="">All Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>


                <div class="col-md-3 mb-3">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="commoditiesDropdown"
                                data-bs-toggle="dropdown" style="background-color: white; border: 1px solid #ccc;">
                            Commodities
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="commoditiesDropdown">
                            <li>
                                <input class="form-check-input" type="checkbox" value="all" id="commodityCheckboxAll">
                                <label class="form-check-label" for="commodityCheckboxAll">All Commodities</label>
                            </li>
                            @foreach ($commodities as $commodity)
                                <li>
                                    <input class="form-check-input commodity-checkbox" type="checkbox"
                                           value="{{ $commodity->id }}" id="commodityCheckbox{{ $commodity->id }}">
                                    <label class="form-check-label"
                                           for="commodityCheckbox{{ $commodity->id }}">{{ $commodity->commodities }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">





        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-3">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Barangay</th>
                                    <th scope="col">Commodities</th>
                                    <th scope="col">Farm Size</th>
                                    <th scope="col">Farm Location</th>
                                    <th scope="col">4ps Beneficiary</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($farmers as $farmer)
                                    <tr data-commodities="{{ implode(',', $farmer->crops->pluck('commodities_id')->toArray()) }}" data-barangay="{{ $farmer->barangay->id }}" data-status="{{ $farmer->status }}" >
                                        <td>
                                            @if($farmer->farmersNumbers->isNotEmpty())
                                                <a href="{{ route('farmers.showed', ['id' => $farmer->id]) }}">
                                                    {{ $farmer->farmersNumbers->first()->farmersnumber }}
                                                </a>
                                            @else
                                                No Data
                                            @endif
                                        </td>
                                        <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                        <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                        <td>
                                            @if ($farmer->crops->isNotEmpty())
                                                @foreach ($farmer->crops as $crop)
                                                    {{ $commodities->find($crop->commodities_id)->commodities ?? 'No Data' }}<br>
                                                @endforeach
                                            @else
                                                No Data
                                            @endif
                                        </td>
                                        <td>
                                            @if ($farmer->crops->isNotEmpty())
                                                @foreach ($farmer->crops as $crop)
                                                    {{ $crop->farm_size ?? 'No Data' }}<br>
                                                @endforeach
                                            @else
                                                No Data
                                            @endif
                                        </td>
                                        <td>
                                            @if ($farmer->crops->isNotEmpty())
                                                @foreach ($farmer->crops as $crop)
                                                    {{ $crop->farm_location ?? 'No Data' }}<br>
                                                @endforeach
                                            @else
                                                No Data
                                            @endif
                                        </td>
                                        <td>{{ $farmer->benefits }}</td>
                                        <td>
                                            @if ($farmer->status === 'Active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
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
    .custom-select-width {
    width: 100%; /* Adjust the width as needed */
}


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

    /* Style the table */
    #myTable {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    #myTable th,
    #myTable td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ccc;
    }

    #myTable th {
        background-color: #f2f2f2;
    }

    /* Style the table header */
    #myTable thead {
        font-weight: bold;
    }

    /* Style the "Add Farmer" button */
    .add-employee a.btn {
        background-color: #007bff;
        color: #fff;
    }

    .add-employee a.btn:hover {
        background-color: #0056b3;
    }

    /* Style the action buttons */
    .btn-group .btn {
        padding: 5px 10px;
        margin-right: 5px;
        border: none;
    }

    /* Style the status badges */
    .badge.bg-success {
        background-color: #28a745;
    }

    .badge.bg-danger {
        background-color: #dc3545;
    }
</style>
</div>


<script>
    // Function to hide the alert after a specified number of milliseconds
    function hideAlert(alertId, delay) {
        setTimeout(function() {
            document.getElementById(alertId).style.display = 'none';
        }, delay);
    }

    // Automatically hide success alert after 3 seconds
    if (document.getElementById('success-alert')) {
        hideAlert('success-alert', 10000);
    }

    // Automatically hide error alert after 3 seconds
    if (document.getElementById('error-alert')) {
        hideAlert('error-alert', 10000);
    }

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
            "pagingType": "full_numbers",
            "searching": false
        });

        // Event listener for changing the number of entries per page
        $('#showEntries').on('change', function() {
            var entriesPerPage = parseInt($(this).val());
            $('#myTable').DataTable().page.len(entriesPerPage).draw();
        });

        $('#benefitsFilter').on('change', function() {
    filterTable();
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

        // Event listener for changes in the filters
        $('#barangayFilter, #statusFilter, #search, #blnNumberFilter, #nameFilter, #farmSizeFilter, #farmLocationFilter').on('change keyup', function() {
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
            var blnNumberFilter = $('#blnNumberFilter').val().toLowerCase();
            var nameFilter = $('#nameFilter').val().toLowerCase();
            var farmSizeFilter = $('#farmSizeFilter').val().toLowerCase();
            var farmLocationFilter = $('#farmLocationFilter').val().toLowerCase();
            var selectedBenefits = $('#benefitsFilter').val();

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


        if (selectedBenefits !== '' && selectedBenefits != tr.find('td:eq(3)').text()) {
            showRow = false;
        }

                if (selectedStatus !== '' && selectedStatus != trStatus) {
                    showRow = false;
                }

                if (searchText !== '' && !trText.includes(searchText)) {
                    showRow = false;
                }

                if (blnNumberFilter !== '' && tr.find('td:eq(0)').text().toLowerCase().indexOf(blnNumberFilter) === -1) {
                    showRow = false;
                }

                if (nameFilter !== '' && tr.find('td:eq(1)').text().toLowerCase().indexOf(nameFilter) === -1) {
                    showRow = false;
                }

                if (farmSizeFilter !== '' && tr.find('td:eq(5)').text().toLowerCase().indexOf(farmSizeFilter) === -1) {
                    showRow = false;
                }

                if (farmLocationFilter !== '' && tr.find('td:eq(6)').text().toLowerCase().indexOf(farmLocationFilter) === -1) {
                    showRow = false;
                }

                if (selectedCommodityIds.length > 0 && !selectedCommodityIds.includes('all')) {
                    // Check if the row's commodities match any of the selected commodities
                    var hasSelectedCommodity = trCommodities.some(commodityId => selectedCommodityIds.includes(commodityId.toString()));

                    if (!hasSelectedCommodity) {
                    showRow = false;
                }

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
