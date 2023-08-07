@extends('layouts.index')
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
                    @foreach ($auditTrails as $auditTrail)
                    <tr>
                        <td>{{ $auditTrail->datetime }}</td>
                        <td>{{ $auditTrail->user }}</td>
                        <td>{{ $auditTrail->action }}</td>
                        <td>{{ $auditTrail->details }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
