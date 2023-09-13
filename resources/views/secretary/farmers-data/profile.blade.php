@extends('layouts.index')
@section('content')
<title>Profile</title>

<div class="pagetitle">
    <h1>Profile</h1>
  </div><!-- End Page Title -->


@if (session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">




    @foreach ($someData as $data)
    <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="data:image/jpeg;base64,{{ $data->image }}" alt="Avatar" class="rounded-circle" style="width: 100px; height: 100px;">
            <h2>{{ $data->name }}</h2>
            <h3>{{ $data->user_type }}</h3>
        </div>
    </div>
    @endforeach


      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>


              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">{{ $user->barangay->barangays }} , {{ $user->municipality->municipalities }} , {{ $user->province->provinces }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Contact Number</div>
                  <div class="col-lg-9 col-md-8">{{ $user->phone_number }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img src="data:image/jpeg;base64,{{ $data->image }}" alt="Avatar" class="rounded-circle" style="width: 100px; height: 100px;">
                            <div class="pt-2">
                                <input type="file" name="image" id="image" accept="image/*">

                            </div>
                        </div>
                    </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="validationTooltip01" name="name" required
                                autofocus="autofocus" value="{{ $user->name }}">
                    </div>
                </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="company" value="{{ $user->barangay->barangays }} , {{ $user->municipality->municipalities }} , {{ $user->province->provinces }}" disabled>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="validationTooltip01" name="phone_number"
                        maxlength="11" required autofocus="autofocus" value="{{ $user->phone_number }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="email" class="form-control" id="validationTooltip01" name="email" required
                        autofocus="autofocus" value="{{ $user->email }}">
                    </div>
                  </div>

                  <div class="col-12 mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;"
                        name="submit">Save User</button>
                </div>
                </form><!-- End Profile Edit Form -->
              </div>






              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="{{ route('password.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9 input-group">
                            <input name="current_password" type="password" class="form-control" id="currentPassword" value="">
                            <span class="input-group-text">
                                <i class="fa fa-eye" id="togglePasswordIcon" onclick="togglePassword('currentPassword')"></i>
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9 input-group">
                            <input name="new_password" type="password" class="form-control" id="newPassword">
                            <span class="input-group-text">
                                <i class="fa fa-eye" id="togglePasswordIcon" onclick="togglePassword('newPassword')"></i>
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9 input-group">
                            <input name="new_password_confirmation" type="password" class="form-control" id="renewPassword">
                            <span class="input-group-text">
                                <i class="fa fa-eye" id="togglePasswordIcon" onclick="togglePassword('renewPassword')"></i>
                            </span>
                        </div>
                    </div>

                    <div id="passwordMismatchError" class="text-danger" style="display: none;">
                        Passwords do not match.
                    </div>
                    <div id="passwordMatchSuccess" class="text-success" style="display: none;">
                        Passwords match!
                    </div>


                    <div class="col-12 mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="margin-right: 5px;" name="submit">Save User</button>
                    </div>
                </form>
                <script>
                    function togglePassword(inputId, iconId) {
                        const passwordInput = document.getElementById(inputId);
                        const togglePasswordIcon = document.getElementById(iconId);
                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            togglePasswordIcon.classList.remove("fa-eye");
                            togglePasswordIcon.classList.add("fa-eye-slash");
                        } else {
                            passwordInput.type = "password";
                            togglePasswordIcon.classList.remove("fa-eye-slash");
                            togglePasswordIcon.classList.add("fa-eye");
                        }
                    }

                    // Password confirmation validation
                    const newPasswordInput = document.getElementById("newPassword");
                    const renewPasswordInput = document.getElementById("renewPassword");
                    const passwordMatchSuccess = document.getElementById("passwordMatchSuccess");
                    const passwordMismatchError = document.getElementById("passwordMismatchError");

                    newPasswordInput.addEventListener("input", validatePasswordMatch);
                    renewPasswordInput.addEventListener("input", validatePasswordMatch);

                    function validatePasswordMatch() {
                        const newPassword = newPasswordInput.value;
                        const renewPassword = renewPasswordInput.value;

                        if (newPassword === renewPassword) {
                            passwordMismatchError.style.display = "none";
                            passwordMatchSuccess.style.display = "block";
                        } else {
                            passwordMismatchError.style.display = "block";
                            passwordMatchSuccess.style.display = "none";
                        }
                    }
                </script>



              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
@endsection
