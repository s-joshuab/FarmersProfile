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
            hideAlert('success-alert', 10000);
        }

        // Automatically hide error alert after 3 seconds
        if (document.getElementById('error-alert')) {
            hideAlert('error-alert', 10000);
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

                        {{-- <div class="row">
                            <div class="col-md-3" style="display: none;">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                        </div> --}}

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
                                        <th scope="col">4ps Beneficiary</th>
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
                                                    $selectedCommodities = $selectedCommodities ?? [];

                                                    if (!empty($selectedCommodities)) {
                                                        $selectedFarmerCommodities = array_intersect($farmerCommodities, $selectedCommodities);
                                                        $displayedCommodities = $commodities->whereIn('id', $selectedFarmerCommodities)->pluck('commodities')->toArray();
                                                        echo implode('<br>', $displayedCommodities);
                                                    } elseif (!empty($farmerCommodities)) {
                                                        $allCommodities = $commodities->whereIn('id', $farmerCommodities)->pluck('commodities')->toArray();
                                                        echo implode('<br>', $allCommodities);
                                                    } else {
                                                        echo 'No Data';
                                                    }
                                                @endphp
                                            </td>

                                            <td>{{ $farmer->benefits }}</td>
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
                                                        <i class="ri-file-pdf-fill"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>

                                                    <a href="{{ route('farmers.showed', ['id' => $farmer->id]) }}" class="btn btn-sm btn-info" style="margin-right: 10px;">
                                                        <i class="ri-eye-fill"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>

                                                    <a href="{{ route('farmers.edit', ['id' => $farmer->id]) }}" class="btn btn-sm btn-primary" style="margin-right: 10px;">
                                                        <i class="ri-edit-2-fill"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>

                                                    <a href="{{ route('farmers.generate', ['id' => $farmer->id]) }}" class="btn btn-sm btn-secondary">
                                                        <i class="ri-settings-3-fill"></i> <!-- Replace with the appropriate Font Awesome icon class -->
                                                    </a>
                                                    <a href="{{ route('farmers.benefits', ['id' => $farmer->id]) }}" class="btn btn-sm btn-secondary">
                                                        <i class="ri-hand-heart-fill"></i> <!-- Replace with the appropriate Font Awesome icon class -->
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

    <script>
        $(document).ready(function () {
            // DataTable initialization
            var table = $('#myTable').DataTable();

            // Function to update the table based on filter values
            function updateTable() {
                var barangayFilter = $('#barangayFilter').val();
                var commodityFilter = $('.commodity-checkbox:checked').map(function () {
                    return this.value;
                }).get().join(',');
                var statusFilter = $('#statusFilter').val();

                // Make an Ajax request to the server to get filtered data
                $.ajax({
                    url: '/path-to-farmdata-endpoint', // Replace with the actual URL of your farmdata endpoint
                    method: 'GET',
                    data: {
                        barangayFilter: barangayFilter,
                        commoditiesFilter: commodityFilter,
                        statusFilter: statusFilter
                    },
                    success: function (data) {
                        // Clear and redraw the DataTable with the updated data
                        table.clear().rows.add(data).draw();
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Event listener to handle changes in filters
            $('#barangayFilter, #commodityFilter, #statusFilter').on('change', function () {
                updateTable();
            });

            // Event listener for checkbox "All Commodities"
            $('#commodityCheckboxAll').on('change', function () {
                $('.commodity-checkbox').prop('checked', $(this).prop('checked')).change();
                updateTable();
            });

            // Event listener for individual commodity checkboxes
            $('.commodity-checkbox').on('change', function () {
                var allChecked = $('.commodity-checkbox:checked').length === $('.commodity-checkbox').length;
                $('#commodityCheckboxAll').prop('checked', allChecked).change();
                updateTable();
            });
        });
    </script>



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



@endsection

