@extends('layouts.index')
@section('content')
<div class="pagetitle">
    <!-- End Page Title -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>
                                    <input type="text" class="form-control filter-input" data-column="2" placeholder="Filter Barangay">
                                </th>
                                <th>
                                    <input type="text" class="form-control filter-input" data-column="3" placeholder="Filter Commodity">
                                </th>
                                <th>Farmsize</th>
                                <th>
                                    <select class="form-control filter-select" data-column="4">
                                        <option value="">All</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sample Names</td>
                                <td>Sample Barangay</td>
                                <td>Sample Commodity</td>
                                <td>Farmsize</td>
                                <td>Yes</td>
                                <td>Sample Data</td>
                            </tr>
                            <!-- Add more rows here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var table = $('#myTable').DataTable();

        $('.filter-input').on('keyup', function () {
            var columnIdx = $(this).data('column');
            table.column(columnIdx).search($(this).val()).draw();
        });

        $('.filter-select').on('change', function () {
            var columnIdx = $(this).data('column');
            table.column(columnIdx).search($(this).val()).draw();
        });
    });
</script>
@endsection
