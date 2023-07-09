@extends('layouts.index')
@section('content')

    <div class="pagetitle">
        <!-- End Page Title -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="add-employee mb-3 mt-3">
                                <a href="{{ url('admin/users') }}"" class="btn btn-primary">
                                    <i class="bi bi-plus"></i> Add users
                                </a>
                            </div>

                            <table id="myTable" class="table datatable">
                                <thead>
                                    <tr>

                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">UserType</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="#" class="btn btn-sm btn-primary view-btn m-1" data-id="">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-info update-btn m-1" data-id="">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>

                                </tbody>
                            </table>

                            <script>
                                $(document).ready(function() {
                                    $('#myTable').DataTable();
                                });
                            </script>

                        </div>
                    </div>

                </div>
            </div>
@endsection
