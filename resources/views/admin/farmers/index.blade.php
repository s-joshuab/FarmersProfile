@extends('layouts.index')
@section('content')

@if (session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="pagetitle">
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="add-employee mb-3 mt-3">
                            <a href="{{ url('admin/create-add') }}" class="btn btn-primary">
                                <i class="bi bi-plus"></i>Add Farmer
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr >
                                        <th scope="col">ID Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">
                                            <select id="barangayFilter" class="form-select" aria-label="Barangay Filter">
                                                <option value="">All Barangays</option>
                                                @foreach ($barangays as $barangay)
                                                    <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th scope="col">
                                            <select id="commoditiesFilter" class="form-select" aria-label="Commodities Filter">
                                                <option value="">All Commodities</option>
                                                @foreach ($commodities as $commodity)
                                                    <option value="{{ $commodity->id }}">{{ $commodity->commodities }}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmers as $farmer)
                                    <tr data-barangay="{{ $farmer->barangay->id }}">
                                        <th>{{ $farmer->farmersNumbers->first()?->farmersnumber ?? 'No Data' }}</th>
                                        <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                        <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                        <td data-barangay="{{ $farmer->barangay->id }}" data-commodity="{{ $farmer->crops->pluck('commodity_id')->implode(',') }}">
                                            @php
                                                $commoditiesList = $farmer->crops->map(function ($crop) {
                                                    return $crop->commodity->commodities;
                                                })->first(); // Get the first commodity
                                            @endphp

                                            @if ($commoditiesList)
                                                {{ $commoditiesList }}
                                            @endif
                                        </td>





                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('farmers.show', ['id' => $farmer->id]) }}" class="btn btn-sm btn-primary view-btn m-1">
                                                    <i class="bx bx-show-alt"></i>
                                                </a>

                                                <a href="{{ route('farmers.edit', ['id' => $farmer->id]) }}" class="btn btn-sm btn-primary view-btn m-1">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="{{ route('farmers.generate', ['id' => $farmer->id]) }}" class="btn btn-sm btn-secondary generate-btn m-1">
                                                    <i class="bx bx-cog"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <style>
                            #myTable th,
                            #myTable td {
                                text-align: left;
                            }

                        </style>
                <script>
                 $(document).ready(function() {
    $('#myTable').DataTable({
        "ordering": false,
    });

    // Filter datatable when Barangay dropdown changes
    $('#barangayFilter').change(function() {
        var selectedBarangayId = $(this).val();
        var selectedCommodityId = $('#commoditiesFilter').val();
        filterTable(selectedBarangayId, selectedCommodityId);
    });

    // Filter datatable when Commodities dropdown changes
    $('#commoditiesFilter').change(function() {
        var selectedCommodityId = $(this).val();
        var selectedBarangayId = $('#barangayFilter').val();
        filterTable(selectedBarangayId, selectedCommodityId);
    });

    // Function to filter the table based on selected filters
    function filterTable(selectedBarangayId, selectedCommodityId) {
        $('#myTable tbody tr').hide();

        if (selectedBarangayId === '' && selectedCommodityId === '') {
            $('#myTable tbody tr').show();
        } else if (selectedBarangayId !== '' && selectedCommodityId === '') {
            $('#myTable tbody tr[data-barangay="' + selectedBarangayId + '"]').show();
        } else if (selectedBarangayId === '' && selectedCommodityId !== '') {
            $('#myTable tbody tr[data-commodity*="' + selectedCommodityId + '"]').show();
        } else {
            $('#myTable tbody tr[data-barangay="' + selectedBarangayId + '"][data-commodity*="' + selectedCommodityId + '"]').show();
        }
    }
});

                    </script>





                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

    </section>
</div>

@endsection
