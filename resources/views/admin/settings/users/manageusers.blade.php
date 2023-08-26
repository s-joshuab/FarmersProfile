@extends('layouts.index')
@section('content')

@if (session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="pagetitle">
    <!-- End Page Title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="add-employee mb-3 mt-3">
                        <a href="{{ url('admin/users-add') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i>Add Farmer
                        </a>
                    </div>

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead class="table-bordered" >
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Barangay</th>
                                <th scope="col" class="text-center">Contact Number</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">UserType</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user )
                                <tr>
                                    <td>
                                    @if ($user->profileImage)
                                    <img src="{{ asset($user->profileImage->image_url) }}" class="avatar rounded-circle"
                                        alt="Avatar" style="width: 50px; height: 50px;">
                                @endif
                                     {{ $user->name }} </td>
                                    <td class="text-center">{{ $user->barangay?->barangays ?? 'No Data' }}</</td>
                                    <td class="text-center">{{ $user->phone_number }}</td>
                                    <td class="text-center">{{ $user->status }}</td>
                                    <td class="text-center">{{ $user->user_type }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ url('user-view/' . $user->id) }}" class="btn btn-sm btn-info view-btn m-1">
                                                    View
                                            </a>

                                            <a href="{{ url('user-edit/' . $user->id) }}" class="btn btn-sm btn-primary view-btn m-1">
                                                Update
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Data Available</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    <script>
                            $(document).ready(function() {
    $('#myTable').DataTable({
        "ordering": false,
    });
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection
