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
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmers as $farmer)
                                    <tr>
                                        <th>{{ $farmer->id }}</th>
                                        <td>{{ $farmer->fname }}</td>
                                        <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                        <td>
                                            @foreach ($farmer->crops as $crop)
                                                {{ $crop->commodities_id }},
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('farmers.show', ['id' => $farmer->id]) }}" class="btn btn-sm btn-primary view-btn m-1">
                                                    <i class="bx bx-show-alt"></i>
                                                </a>

                                                <a href="#" class="btn btn-sm btn-info update-btn m-1"
                                                    data-id="{{ $farmer->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-secondary generate-btn m-1"
                                                    data-id="{{ $farmer->id }}">
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
                                var table = $('#myTable').DataTable();

                                $('#myTable thead th').each(function () {
                                    var title = $(this).text();
                                    if (title !== "Action") {
                                        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
                                    }
                                });

                                table.columns().every(function () {
                                    var that = this;

                                    $('input', this.header()).on('keyup change clear', function () {
                                        if (that.search() !== this.value) {
                                            that.search(this.value).draw();
                                        }
                                    });
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
