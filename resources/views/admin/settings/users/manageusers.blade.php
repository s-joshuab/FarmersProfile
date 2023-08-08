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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="bi bi-plus"></i> Add users
                        </button>
                    </div>

                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUserModalLabel">Add Users</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/users') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-6 position-relative">
                                            <label class="form-label">Name<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="name" required
                                                autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The Fullname field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label class="form-label">Address<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="address"
                                                autofocus="autofocus">
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 position-relative">
                                                <label class="form-label">Username<font color="red">*</font></label>
                                                <input type="text" class="form-control" id="validationTooltip01" name="username"
                                                    required>
                                                <div class="invalid-tooltip">
                                                    The Username field is required.
                                                </div>
                                            </div>

                                            <div class="col-md-6 position-relative">
                                                <label class="form-label">Password<font color="red">*</font></label>
                                                <input type="password" class="form-control" id="pass" name="password" required>
                                                <input type="checkbox" id="showPassword"> Show Password
                                                <div class="invalid-tooltip">
                                                    The Password field is required.
                                                </div>
                                            </div>

                                            <script>
                                                const showPasswordCheckbox = document.getElementById('showPassword');
                                                const passwordInput = document.getElementById('pass');

                                                showPasswordCheckbox.addEventListener('change', function () {
                                                    if (this.checked) {
                                                        passwordInput.type = 'text';
                                                    } else {
                                                        passwordInput.type = 'password';
                                                    }
                                                });
                                            </script>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 position-relative">
                                                <label class="form-label">Email Address<font color="red">*</font></label>
                                                <input type="email" class="form-control" id="validationTooltip01" name="email" required>
                                                <div class="invalid-tooltip">
                                                    The Email Address field is required.
                                                </div>
                                            </div>

                                            <div class="col-md-6 position-relative">
                                                <label class="form-label">PhoneNumber (Format: 09XXXXXXXXX)<font color="red">*</font>
                                                    </label>
                                                <input type="text" class="form-control" id="validationTooltip01" name="phone_number"
                                                    maxlength="11" required>
                                                <div class="invalid-tooltip">
                                                    The Contact Number field is required.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 position-relative">
                                                <label class="form-label">User Type<font color="red">*</font></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" aria-label="Default select example" name="user_type" id="validationTooltip03" required>
                                                        <option value="" selected disabled>Select User Type</option>
                                                        <option value="Admin">Administrator</option>
                                                        <option value="Staff">Staff</option>
                                                        <option value="Secretary">Secretary</option>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        The User Type field is required.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 position-relative">
                                                <label class="form-label">Status<font color="red">*</font></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required>
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        The Active field is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-warning" name="submit">Save User</button>
                                            <button type="reset" class="btn btn-primary">Cancel</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="table datatable table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">UserType</th>
                                <th scope="col">Action</th>
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
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-sm btn-primary view-btn m-1" data-bs-toggle="modal"
                                                data-bs-target="#viewUserModal{{ $user->id }}">
                                                <i class="bx bx-show-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-info update-btn m-1" data-bs-toggle="modal"
                                            data-bs-target="#updateUserModal{{ $user->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        </div>
                                    </td
                                </tr>
                                {{-- //view --}}
                                <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="viewUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewUserModalLabel{{ $user->id }}">View User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('admin/users') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                    <div class="col-md-6 position-relative">
                                                        <label class="form-label">Name<font color="red">*</font></label>
                                                        <input type="text" class="form-control" id="validationTooltip01" name="name" required
                                                            autofocus="autofocus" value="{{ $user->name }}" disabled>
                                                        <div class="invalid-tooltip">
                                                            The Fullname field is required.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 position-relative">
                                                        <label class="form-label">Address<font color="red">*</font></label>
                                                        <input type="text" class="form-control" id="validationTooltip01" name="address" required
                                                            autofocus="autofocus" value="{{ $user->address }}" disabled>
                                                        <div class="invalid-tooltip">
                                                            The Fullname field is required.
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 position-relative">
                                                            <label class="form-label">Username<font color="red">*</font></label>
                                                            <input type="text" class="form-control" id="validationTooltip01" name="username"
                                                                required autofocus="autofocus" value="{{ $user->username }}" disabled>
                                                            <div class="invalid-tooltip">
                                                                The Username field is required.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 position-relative">
                                                            <label class="form-label">Password<font color="red">*</font></label>
                                                            <input type="password" class="form-control" id="viewPass" name="password" required autofocus="autofocus" value="{{ $user->password }}" disabled>
                                                            <input type="checkbox" id="viewShowPassword"> Show Password
                                                            <div class="invalid-tooltip">
                                                                The Password field is required.
                                                            </div>
                                                        </div>
                                                        <script>
                                                            const showPasswordCheckboxView = document.getElementById('viewShowPassword');
                                                            const passwordInputView = document.getElementById('viewPass');

                                                            showPasswordCheckboxView.addEventListener('change', function () {
                                                                if (this.checked) {
                                                                    passwordInputView.type = 'text';
                                                                } else {
                                                                    passwordInputView.type = 'password';
                                                                }
                                                            });
                                                        </script>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 position-relative">
                                                            <label class="form-label">Email Address<font color="red">*</font></label>
                                                            <input type="email" class="form-control" id="validationTooltip01" name="email" required autofocus="autofocus" value="{{ $user->email }}" disabled>
                                                            <div class="invalid-tooltip">
                                                                The Email Address field is required.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 position-relative">
                                                            <label class="form-label">PhoneNumber (Format: 09XXXXXXXXX)<font color="red">*</font>
                                                                </label>
                                                            <input type="text" class="form-control" id="validationTooltip01" name="phone_number"
                                                                maxlength="11" required autofocus="autofocus" value="{{ $user->phone_number }}" disabled>
                                                            <div class="invalid-tooltip">
                                                                The Contact Number field is required.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 position-relative">
                                                            <label class="form-label">User Type<font color="red">*</font></label>
                                                            <div class="col-sm-12">
                                                                <select class="form-select" aria-label="Default select example" name="user_type" id="validationTooltip03" required autofocus="autofocus" disabled>
                                                                    <option value="" selected disabled>Select User Type</option>
                                                                    <option value="Admin" {{ $user->user_type === 'Admin' ? 'selected' : '' }}>Administrator</option>
                                                                    <option value="Staff" {{ $user->user_type === 'Staff' ? 'selected' : '' }}>Staff</option>
                                                                    <option value="Secretary" {{ $user->user_type === 'Secretary' ? 'selected' : '' }}>Secretary</option>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    The User Type field is required.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 position-relative">
                                                            <label class="form-label">Status<font color="red">*</font></label>
                                                            <div class="col-sm-12">
                                                                <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required autofocus="autofocus" disabled>
                                                                    <option value="" selected disabled>Select Status</option>
                                                                    <option value="Active" {{ $user->status === 'Active' ? 'selected' : '' }}>Active</option>
                                                                    <option value="Inactive" {{ $user->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    The Active field is required.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12 mt-4">
                                                        {{-- <button type="submit" class="btn btn-warning" name="submit">Save User</button> --}}
                                                        <button type="reset" class="btn btn-primary" id="backBtn">Back</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- // update --}}
                                <div class="modal fade" id="updateUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="updateUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $user->id }}">Update User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('user-update/'. $user->id)  }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                    <div class="col-md-6 position-relative">
                                                        <label class="form-label">Name<font color="red">*</font></label>
                                                        <input type="text" class="form-control" id="validationTooltip01" name="name" required
                                                            autofocus="autofocus" value="{{ $user->name }}" >
                                                        <div class="invalid-tooltip">
                                                            The Fullname field is required.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 position-relative">
                                                        <label class="form-label">Address<font color="red">*</font></label>
                                                        <input type="text" class="form-control" id="validationTooltip01" name="address"
                                                            autofocus="autofocus" value="" >
                                                    </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-md-6 position-relative">
                                                                <label class="form-label">Username<font color="red">*</font></label>
                                                                <input type="text" class="form-control" id="validationTooltip01" name="username"
                                                                    required autofocus="autofocus" value="{{ $user->username }}" >
                                                                <div class="invalid-tooltip">
                                                                    The Username field is required.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 position-relative">
                                                                <label class="form-label">Password<font color="red">*</font></label>
                                                                <input type="password" class="form-control" id="updatePass" name="password" required autofocus="autofocus" value="{{ $user->password }}">
                                                                <input type="checkbox" id="updateShowPassword"> Show Password
                                                                <div class="invalid-tooltip">
                                                                    The Password field is required.
                                                                </div>
                                                            </div>

                                                            <script>
                                                                const showPasswordCheckboxUpdate = document.getElementById('updateShowPassword');
                                                                const passwordInputUpdate = document.getElementById('updatePass');

                                                                showPasswordCheckboxUpdate.addEventListener('change', function () {
                                                                    if (this.checked) {
                                                                        passwordInputUpdate.type = 'text';
                                                                    } else {
                                                                        passwordInputUpdate.type = 'password';
                                                                    }
                                                                });
                                                            </script>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 position-relative">
                                                                <label class="form-label">Email Address<font color="red">*</font></label>
                                                                <input type="email" class="form-control" id="validationTooltip01" name="email" required autofocus="autofocus" value="{{ $user->email }}" >
                                                                <div class="invalid-tooltip">
                                                                    The Email Address field is required.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 position-relative">
                                                                <label class="form-label">PhoneNumber (Format: 09XXXXXXXXX)<font color="red">*</font>
                                                                    </label>
                                                                <input type="text" class="form-control" id="validationTooltip01" name="phone_number"
                                                                    maxlength="11" required autofocus="autofocus" value="{{ $user->phone_number }}" >
                                                                <div class="invalid-tooltip">
                                                                    The Contact Number field is required.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 position-relative">
                                                                <label class="form-label">User Type<font color="red">*</font></label>
                                                                <div class="col-sm-12">
                                                                    <select class="form-select" aria-label="Default select example" name="user_type" id="validationTooltip03" required autofocus="autofocus">
                                                                        <option value="" selected disabled>Select User Type</option>
                                                                        <option value="Admin" {{ $user->user_type === 'Admin' ? 'selected' : '' }}>Administrator</option>
                                                                        <option value="Staff" {{ $user->user_type === 'Staff' ? 'selected' : '' }}>Staff</option>
                                                                        <option value="Secretary" {{ $user->user_type === 'Secretary' ? 'selected' : '' }}>Secretary</option>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        The User Type field is required.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 position-relative">
                                                                <label class="form-label">Status<font color="red">*</font></label>
                                                                <div class="col-sm-12">
                                                                    <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required autofocus="autofocus">
                                                                        <option value="" selected disabled>Select Status</option>
                                                                        <option value="Active" {{ $user->status === 'Active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="Inactive" {{ $user->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        The Active field is required.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <div class="col-12 mt-4">
                                                        <button type="submit" class="btn btn-warning" name="submit">Save User</button>
                                                        <button type="reset" class="btn btn-primary" id="cancelBtn">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="7">No Data Available</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    <script>
                        $(document).ready(function() {
                            $('#myTable').DataTable();
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection
