@extends('layouts.index')
@section('content')
<title>Audit Trail</title>

<style>
    /* Custom styles for the table */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f7f7f7; /* Light gray background for odd rows */
    }

    .table-bordered th, .table-bordered td {
        border-color: #dee2e6; /* Gray border color */
    }

    .table-bordered th {
        background-color: #f8f9fa; /* Light blue-gray background for table headers */
    }
</style>

<div class="container-fluid">
    <h1 class="my-4">Audit Trail</h1>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table datatable table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date and Time</th>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->created_at }}</td>
                            <td>{{ $activity->causer ? $activity->causer->name : 'No Data' }}</td>
                            <td>
                                {{ $activity->causer && $activity->causer->user_type ? $activity->causer->user_type : 'No Data' }}
                            </td>
                            <td>{{ ucwords($activity->description) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
