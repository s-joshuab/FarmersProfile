@extends('layouts.index')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="add-employee mb-3 mt-3">
                        <a href="{{ url('admin/create-add') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add Farmer
                        </a>
                    </div>

                    <table id="myTable" class="table datatable">
                <center><thead>
                            <tr>
                                <th scope="col">ID-Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Barangay</th>
                                <th scope="col">Commodities</th>
                                <th scope="col">4Ps</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </center>
                        <tbody>
                            <tr>
                                <td>BLN 01 - 1</td>
                                <td>Brandon Jacob</td>
                                <td>Designer</td>
                                <td>28</td>
                                <td>2016-05-25</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-sm btn-primary view-btn m-1" data-id="1">
                                             View
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info update-btn m-1" data-id="1">
                                             Update
                                        </a>
                                        <a href="#" class="btn btn-sm btn-secondary generate-btn m-1" data-id="2">
                                             Generate
                                        </a>
                                    </div>
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection
