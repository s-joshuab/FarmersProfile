@extends('layouts.staffindex')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success text-center" id="success-alert">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif

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
                                <a href="{{ url('staff/create-add') }}" class="btn btn-primary">
                                    <i class="bi bi-plus"></i>Add Farmer
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <select id="showEntries" class="form-select" aria-label="Show Entries">
                                        <option value="10">Show 10 Entries</option>
                                        <option value="25">Show 25 Entries</option>
                                        <option value="50">Show 50 Entries</option>
                                        <option value="100">Show 100 Entries</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="search" class="form-control" placeholder="Search">
                                </div>
                            </div>

                            <div class="row d-flex justify-content-end mt-3">
                                <div class="col-md-2">
                                    <select id="barangayFilter" class="form-select" aria-label="Barangay Filter">
                                        <option value="">All Barangays</option>
                                        @foreach ($barangays as $barangay)
                                            <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select id="commoditiesFilter" class="form-select" aria-label="Commodities Filter">
                                        <option value="">All Commodities</option>
                                        @foreach ($commodities as $commodity)
                                            <option value="{{ $commodity->id }}">{{ $commodity->commodities }}</option>
                                        @endforeach
                                    </select>
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
                                            <tr
                                                data-barangay="{{ $farmer->barangay->id }}"
                                                data-commodities="{{ implode(',', $farmer->crops->pluck('commodities_id')->toArray()) }}"
                                                data-status="{{ $farmer->status }}">
                                                <td>{{ $farmer->farmersNumbers->first()?->farmersnumber ?? 'No Data' }}</td>
                                                <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                                <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                                <td>
                                                    @php
                                                        $commoditiesList = $farmer->crops
                                                            ->filter(function ($crop) use ($selectedCommodity) {
                                                                return $crop->commodity_id == $selectedCommodity;
                                                            })
                                                            ->map(function ($crop) {
                                                                return $crop->commodity->commodities;
                                                            })
                                                            ->implode('<br>');

                                                        if ($commoditiesList) {
                                                            echo $commoditiesList;
                                                        } else {
                                                            echo 'No Data';
                                                        }
                                                    @endphp
                                                </td>
                                                <td>{{ $farmer->status }}</td>

                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('farmers.view', ['id' => $farmer->id]) }}"
                                                            class="btn btn-sm btn-info" style="margin-right: 10px;">
                                                            View
                                                        </a>

                                                        <a href="{{ route('farmers.update', ['id' => $farmer->id]) }}"
                                                            class="btn btn-sm btn-primary" style="margin-right: 10px;">
                                                            Update
                                                        </a>

                                                        <a href="{{ route('farmers.gen', ['id' => $farmer->id]) }}"
                                                            class="btn btn-sm btn-secondary" >
                                                            </i> Generate
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
    </div>
    <script>
        // Function to filter the table based on selected filters
        function filterTable() {
            var selectedBarangayId = $('#barangayFilter').val();
            var selectedCommodityId = $('#commoditiesFilter').val();
            var selectedStatus = $('#statusFilter').val();
            var searchText = $('#search').val().toLowerCase();

            $('#myTable tbody tr').each(function() {
                var tr = $(this);
                var trBarangayId = tr.data('barangay');
                var trCommodities = tr.data('commodities');
                var trStatus = tr.data('status');
                var trText = tr.text().toLowerCase();

                var showRow = true;

                // Check if selectedBarangayId is not empty and doesn't match the row's barangay
                if (selectedBarangayId !== '' && selectedBarangayId != trBarangayId) {
                    showRow = false;
                }

                // Check if selectedCommodityId is not empty
                if (selectedCommodityId !== '') {
                    var rowCommodities = trCommodities.split(',');
                    if (!rowCommodities.includes(selectedCommodityId)) {
                        showRow = false;
                    }
                }

                // Check if selectedStatus is not empty and doesn't match the row's status
                if (selectedStatus !== '' && selectedStatus != trStatus) {
                    showRow = false;
                }

                // Check if the search text is not empty and doesn't match the row's text
                if (searchText !== '' && !trText.includes(searchText)) {
                    showRow = false;
                }

                // Show or hide the row based on the filtering result
                if (showRow) {
                    tr.show();
                } else {
                    tr.hide();
                }
            });
        }

        // Filter the table when either Barangay, Commodities, Status, or Search changes
        $('#barangayFilter, #commoditiesFilter, #statusFilter, #search').on('change keyup', function() {
            filterTable();
        });

        // Initial filter when the page loads
        filterTable();
    </script>
@endsection
