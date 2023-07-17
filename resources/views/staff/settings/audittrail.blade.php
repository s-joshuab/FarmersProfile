@extends('layouts.staffindex')
@section('content')
<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Date</th>
                <th>User</th>
                <th>Action</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2023-06-17 10:30 AM</td>
                <td>User A</td>
                <td>Login</td>
                <td>User A logged into the system.</td>
            </tr>
            <tr>
                <td>2023-06-17 11:00 AM</td>
                <td>User B</td>
                <td>Create</td>
                <td>User B created a new record.</td>
            </tr>
            <!-- Add more audit trail records dynamically using your backend code -->
        </tbody>
    </table>
    </div>
    </div>
  </div>
@endsection
