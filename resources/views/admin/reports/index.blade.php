@extends('layouts.index')
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
                            <option value="Talong">Talong</option>
                            <option value="Okra">Okra</option>
                            <option value="Ampalaya">Ampalaya</option>
                            <option value="Sitao">Sitao</option>
                            <option value="Sili">Sili</option>
                            <option value="Kalabasa">Kalabasa</option>
                            <option value="Patola">Patola</option>
                            <option value="Upo">Upo</option>
                            <option value="Pechay">Pechay</option>
                            <option value="Mongo">Mongo</option>
                            <option value="Peanut">Peanut</option>
                            <option value="Camote">Camote</option>
                            <option value="Banana">Banana</option>
                            <option value="Banana">Others</option>
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
                    <button class="btn btn-success">Excel</button>
                    <button class="btn btn-danger">PDF</button>
                </div>
            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Commodity Planted</th>
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
