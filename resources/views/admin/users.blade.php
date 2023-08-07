@extends('layouts.index')
@section('content')

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title"></h5>

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
                                <input type="checkbox" onclick="myFunction()">Show Password
                                <div class="invalid-tooltip">
                                    The Password field is required.
                                </div>
                            </div>
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
                    </form><!-- End Custom Styled Validation with Tooltips -->

                </div>
            </div>

        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('pass');
            const showPasswordCheckbox = document.getElementById('showPassword');

            if (showPasswordCheckbox.checked) {
                // Store the original password value
                passwordInput.setAttribute('data-original-value', passwordInput.value);
                // Replace the password value with its hashed version
                passwordInput.value = '********'; // Replace with hashed value
            } else {
                // Restore the original password value
                const originalValue = passwordInput.getAttribute('data-original-value');
                passwordInput.value = originalValue;
            }
        }
    </script>

@endsection
