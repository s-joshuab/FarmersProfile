@extends('layouts.index')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered mt-3 datatable table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Action</th>
                        {{-- <th>Details</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->created_at }}</td>
                        <td>{{ $activity->user?->name ?? 'No Data' }}</td>

                        {{-- <td>{{ $activity->log_name }}</td> --}}
                        <td>{{ ucwords($activity->description) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
