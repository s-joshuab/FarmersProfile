@extends('layouts.index')
@section('content')

          <div class="row">
          <div class="col-lg-12">

               <div class="card">
                 <div class="card-body">

                   <!-- <h5 class="card-title">Association Information</h5> -->
                   <h5 class="card-title"></h5>

                   <!-- Custom Styled Validation with Tooltips -->
                   <form action=""{{ url('users/add') }} method="POST">
                    @csrf
      <div class="col-md-12 position-relative">
        <label class="form-label">Name<font color = "red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="name" required autofocus="autofocus">
        <div class="invalid-tooltip">
          The Fullname field is required.
        </div>
      </div>

      <div class="row">
      <div class="col-md-6 position-relative">
        <label class="form-label">Username<font color = "red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="username" required>
        <div class="invalid-tooltip">
          The Username field is required.
        </div>
      </div>

      <div class="col-md-6 position-relative">
        <label class="form-label">Password<font color = "red">*</font></label>
        <input type="password" class="form-control" id="pass" name="password" required>
        <input type="checkbox" onclick="myFunction()">Show Password
        <div class="invalid-tooltip">
          The Password field is required.
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 position-relative">
        <label class="form-label">Email Address<font color = "red">*</font></label>
        <input type="email" class="form-control" id="validationTooltip01" name="email" required>
        <div class="invalid-tooltip">
          The Email Address field is required.
        </div>
      </div>

      <div class="col-md-6 position-relative">
        <label class="form-label">PhoneNumber (Format: 09XXXXXXXXX)<font color = "red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="phone_number" maxlength="11" required>
        <div class="invalid-tooltip">
          The Contact Number field is required.
        </div>
      </div>
    </div>

      <div class="col-md-6 position-relative">
        <label class="form-label">User Type<font color = "red">*</font></label>
        <div class="col-sm-12">
          <select class="form-select" aria-label="Default select example" name="user_type" id="validationTooltip03" required>
            <option value="" selected disabled>Select User Type</option>
            <option value="Admin">Administrator</option>
            <option value="Staff">Staff</option>
            <option value="Brgy. Secretary">Brgy. Secretary</option>
          </select>
          <div class="invalid-tooltip">
            The User Type field is required.
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
@endsection
