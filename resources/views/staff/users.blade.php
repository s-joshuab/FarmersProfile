@extends('layouts.staffindex')
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

                    <form action="{{ url('staff/users') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-md-12 position-relative">
                            <label class="form-label">Name<font color="red">*</font></label>
                            <input type="text" class="form-control" id="validationTooltip01" name="name" required
                                autofocus="autofocus">
                            <div class="invalid-tooltip">
                                The Fullname field is required.
                            </div>
                        </div>

                        <div class="col-md-4 position-relative mt-0">
                            <label for="province">Province:</label>
                            <select id="province" name="provinces_id" class="form-control">
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->provinces }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 position-relative mt-0">
                            <label for="municipality">Municipality:</label>
                            <select id="municipality" name="municipalities_id" class="form-control">
                                <option value="">Select Municipality</option>
                            </select>
                        </div>

                        <div class="col-md-4 position-relative mt-0">
                            <label for="barangay">Barangay:</label>
                            <select id="barangay" name="barangays_id" class="form-control">
                                <option value="">Select Barangay</option>
                            </select>
                        </div>


                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            // Function to fetch municipalities based on the selected province
                            function getMunicipalities(province_id) {
                                $.ajax({
                                    url: '/get-municipalities/' + province_id,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(response) {
                                        // Clear previous options
                                        $('#municipality').empty().append('<option value="">Select Municipality</option>');
                                        $('#barangay').empty().append('<option value="">Select Barangay</option>');

                                        // Append new options
                                        $.each(response, function(index, municipality) {
                                            $('#municipality').append('<option value="' + municipality.id + '">' + municipality.municipalities + '</option>');
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(error);
                                    }
                                });
                            }

                            // Function to fetch barangays based on the selected municipality
                            function getBarangays(municipality_id) {
                                $.ajax({
                                    url: '/get-barangays/' + municipality_id,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(response) {
                                        // Clear previous options
                                        $('#barangay').empty().append('<option value="">Select Barangay</option>');

                                        // Append new options
                                        $.each(response, function(index, barangay) {
                                            $('#barangay').append('<option value="' + barangay.id + '">' + barangay.barangays + '</option>');
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(error);
                                    }
                                });
                            }

                            // Add event listener for the province select dropdown
                            $('#province').change(function() {
                                var province_id = $(this).val();
                                if (province_id !== '') {
                                    getMunicipalities(province_id);
                                }
                            });

                            // Add event listener for the municipality select dropdown
                            $('#municipality').change(function() {
                                var municipality_id = $(this).val();
                                if (municipality_id !== '') {
                                    getBarangays(municipality_id);
                                }
                            });

                            // Add event listener for the form submission
                            $('#dataForm').submit(function(event) {
                                event.preventDefault(); // Prevent the default form submission

                                var formData = $(this).serialize(); // Serialize the form data

                                $.ajax({
                                    url: '/save-data',
                                    type: 'POST',
                                    data: formData,
                                    dataType: 'json',
                                    success: function(response) {
                                        // Handle the success response, e.g., show a success message
                                        alert(response.message);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(error);
                                        // Handle the error response if needed
                                    }
                                });

                                // If you still want to submit the form after the Ajax call, you can do it here
                                // Uncomment the next line if you want to submit the form after the Ajax call
                                // this.submit();
                            });
                        </script>

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
                                        <option value="Admin">Administrator </option>
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
