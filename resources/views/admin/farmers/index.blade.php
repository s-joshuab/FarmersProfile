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
                                    <tr>
                                        <th scope="col">ID Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmers as $farmer)
                                    <tr>
                                        <th>{{ $farmer->farmersNumbers->first()?->farmersnumber ?? 'No Data' }}</th>
                                        <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                        <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                        <td>
                                            @php
                                                $commoditiesList = $farmer->crops->map(function ($crop) {
                                                    return $crop->commodity->commodities;
                                                })->implode(', ');
                                            @endphp

                                            @if (strlen($commoditiesList) > 30)
                                                {{ Str::limit($commoditiesList, 3) }}, etc.
                                            @else
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
                            $(document).ready(function () {
                                var table = $('#myTable').DataTable({
                                    "ordering": false // Disable ordering (sorting) for all columns
                                });
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
