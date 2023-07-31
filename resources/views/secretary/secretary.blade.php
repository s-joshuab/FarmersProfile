@extends('layouts.secretary')
@section('content')
<div class="pagetitle">
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

            <div class="add-employee mb-3 mt-3">
              <a href="{{ url('secretary/form') }}" class="btn btn-primary">
              <i class="bi bi-plus"></i>Add Farmer
           </a>
         </div>

    <table id="myTable" class="table datatable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Barangay</th>
          <th scope="col">Commodities</th>
          <th scope="col">4Ps</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>1</th>
          <td>Brandon Jacob</td>
          <td>Designer</td>
          <td>28</td>
          <td>2016-05-25</td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="#" class="btn btn-sm btn-primary view-btn m-1" data-id="1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="#" class="btn btn-sm btn-info update-btn m-1" data-id="1">
                <i class="bi bi-pencil-square"></i>
              <a href="#" class="btn btn-sm btn-secondary generate-btn m-1" data-id="2">
                <i class="bx bx-cog"></i>
              </a>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <th>2</th>
          <td>Bridie Kessler</td>
          <td>Developer</td>
          <td>35</td>
          <td>2014-12-05</td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="#" class="btn btn-sm btn-primary view-btn m-1" data-id="2">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="#" class="btn btn-sm btn-info update-btn m-1" data-id="2">
                <i class="bi bi-pencil-square"></i>
              </a>
              <a href="#" class="btn btn-sm btn-secondary generate-btn m-1" data-id="2">
                <i class="bx bx-cog"></i>
              </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <style>
      #myTable th,
      #myTable td {
        text-align: center;
      }
    </style>
    <script>
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>

              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    <
@endsection
