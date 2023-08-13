@extends('layouts.staffindex')
@section('content')
<div class="pagetitle">
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

            <div class="add-employee mb-3 mt-3">
              <a href="{{ url('admin/form') }}" class="btn btn-primary">
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
        @foreach ($farmers as $farmer)
            <tr>
                <th>{{ $farmer->id }}</th>
                <td>{{ $farmer->fname }}</td>
                <td>{{ $farmer->barangays_id }}</td>
                <td>{{ $farmer->benefits}}</td>
                <td>{{ $farmer->fname }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-sm btn-primary view-btn m-1" data-id="{{ $farmer->id }}">
                            <i class="bx bx-show-alt"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-info update-btn m-1" data-id="{{ $farmer->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-secondary generate-btn m-1" data-id="{{ $farmer->id }}">
                            <i class="bx bx-cog"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
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

@endsection
