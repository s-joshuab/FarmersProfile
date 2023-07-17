@extends('layouts.staffindex')
@section('content')
<div class="pagetitle">
    <!-- End Page Title -->


        <div class="col-lg-12">
        <div class="card">
        <div class="card-body">


        <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="barangay">Barangay:</label>
                        <select class="form-control" name="barangay" id="barangay">
                            <option value="">All</option>
                            <option value="Barangay A">Barangay A</option>
                            <option value="Barangay B">Barangay B</option>
                            <!-- Add more barangay options here -->
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="commodity">Commodity:</label>
                        <select class="form-control" name="commodity" id="commodity">
                            <option value="">All</option>
                            <option value="Rice">Rice</option>
                            <option value="Corn">Corn</option>
                            <!-- Add more commodity options here -->
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="is_4ps_member">4Ps Member:</label>
                        <select class="form-control" name="is_4ps_member" id="is_4ps_member">
                            <option value="">All</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button class="btn btn-success">Excel</button>
                    <button class="btn btn-danger">PDF</button>
                    <button class="btn btn-primary">Docx</button>
                    <button class="btn btn-dark" onclick="window.print()">Print</button>
                </div>
            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Commodity Planted</th>
                            <th>4Ps Member</th>
                            <th>Farmsize</th>
                            <th>Farm Location</th>
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
@endsection
