@extends('layouts.index')
@section('content')
<title>View Information</title>

<div class="col-12 mb-2 d-flex justify-content-end">
    <button type="reset" class="btn btn-success" id="backBtn">Back</button>
</div>
<script>
    document.getElementById("backBtn").onclick = function() {
        // Go back to the previous page
        window.history.back();
      };
</script>


<div class="row">
    <div class="container">
        <div class="col-lg-12">
            <form action="{{ url('admin/create') }}" method="post">
                @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center mt-3">
                            <h5
                                style="font-family:'Times New Roman', Times, serif; font-weight: bold; font-size: 30px; color: black;">
                                BALAOAN FARMERS REGISTRY</h5>
                        </div>
                        <div class="col-md-6 position-relative mt-5">
                            <div class="d-flex align-items-center">
                                <label for="referenceNo" class="mr-2">Reference/Control No.: </label>
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control" id="referenceNo"
                                        name="ref_no" value="{{ $farmersprofile->ref_no }}" required disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-3">
                                        <label class="form-label">Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required disabled>
                                                <option value="" selected disabled>Select Status</option>
                                                <option value="Active" {{ $farmersprofile->status === 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Inactive" {{ $farmersprofile->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>


                                    <hr class="mt-2">
                                    <p class="mt-0" style="font-weight: bold; font-size: 12px;">PART I. PERSONAL INFORMATION</p>

                                    <div class="col-md-6 position-relative mt-0">
                                        <label class="form-label">Surname</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="sname"  value="{{ $farmersprofile->sname }}" required
                                            autofocus="autofocus" disabled>
                                        <div class="invalid-tooltip">
                                            The Surname field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-0">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="fname" value="{{ $farmersprofile->fname }}"
                                            required autofocus="autofocus" disabled>
                                        <div class="invalid-tooltip">
                                            The First Name field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-5 position-relative mt-0">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="mname" value="{{ $farmersprofile->mname }}"
                                            required autofocus="autofocus" disabled>
                                        <div class="invalid-tooltip">
                                            The Middle Name field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-3 position-relative mt-0">
                                        <label class="form-label">Extension Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="ename" value="{{ $farmersprofile->ename}}"
                                            required autofocus="autofocus" disabled>
                                        <div class="invalid-tooltip">
                                            The Extension Name field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-4 position-relative" style="margin-top: 35px;">
                                        <div class="form-inline">
                                            <label for="sex" class="mr-2">Sex:</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sex" id="maleOption" value="male" {{ $farmersprofile->sex === 'Male' ? 'checked' : '' }} required disabled>
                                                <label class="form-check-label" for="maleOption">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sex" id="femaleOption" value="female" {{ $farmersprofile->sex === 'Female' ? 'checked' : '' }} required disabled>
                                                <label class="form-check-label" for="femaleOption">Female</label>
                                            </div>
                                        </div>
                                    </div>



                                    <hr class="mt-2">
                                    <p class="mt-0" style="font-weight:bold; font-size: 12px;">ADDRESS</p>
                                    <div class="col-md-4 position-relative mt-0">
                                        <label for="Region">Region</label>
                                        <div class="form-control-custom">
                                          <input type="text" id="regions" name="regions" class="form-control" value="Region I" disabled>
                                        </div>
                                      </div>



                                    <!-- Beekeeper Province Address -->
                                    <div class="col-md-4 position-relative mt-0">
                                        <label for="municipality">Municipality:</label>
                                        <select id="municipality" name="municipalities_id" class="form-control" disabled>
                                            <option value="">Select Municipality</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}" {{ $farmersprofile->provinces_id == $province->id ? 'selected' : '' }}>
                                                    {{ $province->provinces }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Municipality Dropdown -->
                                    <div class="col-md-4 position-relative mt-0">
                                        <label for="municipality">Municipality:</label>
                                        <select id="municipality" name="municipalities_id" class="form-control" disabled>
                                            <option value="">Select Municipality</option>
                                            @foreach ($municipalities as $municipality)
                                                <option value="{{ $municipality->id }}" {{ $farmersprofile->municipalities_id == $municipality->id ? 'selected' : '' }}>
                                                    {{ $municipality->municipalities }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Barangay Dropdown -->
                                    <div class="col-md-4 position-relative mt-0">
                                        <label for="municipality">Municipality:</label>
                                        <select id="municipality" name="municipalities_id" class="form-control" disabled>
                                            <option value="">Select Municipality</option>
                                            @foreach ($barangays as $barangay)
                                                <option value="{{ $barangay->id }}" {{ $farmersprofile->barangays_id == $barangay->id ? 'selected' : '' }}>
                                                    {{ $barangay->barangays }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                    </script> --}}

                                    <div class="col-md-4 position-relative mt-0">
                                        <label class="form-label">Street/Sitio/Purok/Subdv.</label>
                                        <input type="text" class="form-control" id="validationTooltip01"
                                            name="purok" value="{{ $farmersprofile->purok}}" required autofocus="autofocus" disabled>
                                        <div class="invalid-tooltip">
                                            The Street/Sitio/Purok/Subdv. field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-4 position-relative mt-0">
                                        <label class="form-label">House/Lot/Bldg. No.</label>
                                        <input type="text" class="form-control" id="validationTooltip01" value="{{ $farmersprofile->house}}"
                                            name="house" required autofocus="autofocus" disabled>
                                        <div class="invalid-tooltip">
                                            The House/Lot/Bldg. No. field is required.
                                        </div>
                                    </div>

                                    <hr class="mt-2">


                                    <div class="col-md-6 position-relative mt-0">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="validationTooltip01" value="{{ $farmersprofile->number}}"
                                            name="number" required autofocus="autofocus" disabled>
                                        <div class="invalid-tooltip">
                                            The contactnumber field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-0">
                                        <div class="form-group">
                                            <label for="highest_formal_education" class="mr-2">Highest Formal Education:</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="none" name="education" value="none" {{ $farmersprofile->education === 'none' ? 'checked' : '' }} required disabled>
                                                        <label class="form-check-label" for="none">None</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="elementary" name="education" value="elementary" {{ $farmersprofile->education === 'elementary' ? 'checked' : '' }} required disabled >
                                                        <label class="form-check-label" for="elementary">Elementary</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="highSchool" name="education" value="highSchool" {{ $farmersprofile->education === 'highschool' ? 'checked' : '' }} required disabled >
                                                        <label class="form-check-label" for="highSchool">High School</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="vocational" name="education" value="vocational" {{ $farmersprofile->education === 'vocational' ? 'checked' : '' }} required disabled>
                                                        <label class="form-check-label" for="vocational">Vocational</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="college" name="education" value="college" {{ $farmersprofile->education === 'college' ? 'checked' : '' }} required disabled>
                                                        <label class="form-check-label" for="college">College</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="postGraduate" name="education" value="postGraduate" {{ $farmersprofile->education === 'postGraduate' ? 'checked' : '' }} required disabled>
                                                        <label class="form-check-label" for="postGraduate">Post-Graduate</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please select at least one option for Highest Formal Education.
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                <div class="col-md-6 position-relative mt-2">
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ $farmersprofile->dob}}" disabled required>
                        <div class="invalid-tooltip">
                            Please enter your date of birth.
                        </div>
                    </div>
                </div>

                <div class="col-md-6 position-relative mt-2">
                    <div class="form-group">
                        <label for="pob">Place of Birth:</label>
                        <input type="text" class="form-control" id="pob" name="pob" value="{{ $farmersprofile->pob}}" disabled required>
                        <div class="invalid-tooltip">
                            Please enter your place of birth.
                        </div>
                    </div>
                </div>

                <div class="col-md-6 position-relative mt-2">
                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{ $farmersprofile->religion}}" disabled required>
                        <div class="invalid-tooltip">
                            Please enter your religion.
                        </div>
                    </div>
                </div>

                <div class="col-md-3 position-relative mt-2">
                    <div class="form-group">
                        <label for="pwd" class="mr-2">Person with Disability (PWD):</label>
                        <div class="row">
                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pwdYes" name="pwd" value="yes" {{ $farmersprofile->pwd === 'yes' ? 'checked' : '' }} required disabled>
                                    <label class="form-check-label" for="pwdYes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pwdNo" name="pwd" value="no" {{ $farmersprofile->pwd === 'no' ? 'checked' : '' }} required disabled>
                                    <label class="form-check-label" for="pwdNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="invalid-tooltip">
                            Please select if you are a Person with Disability (PWD).
                        </div>
                    </div>
                </div>




                <div class="col-md-3 position-relative mt-2">
                    <div class="form-group">
                        <label for="4ps" class="mr-2">4Ps Beneficiary:</label>
                        <div class="row">
                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="beneficiaryYes"
                                        name="benefits" value="yes" {{ $farmersprofile->benefits === 'yes' ? 'checked' : '' }} required disabled>
                                    <label class="form-check-label" for="beneficiaryYes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="beneficiaryNo" name="benefits"
                                        value="no" {{ $farmersprofile->benefits === 'no' ? 'checked' : '' }} required disabled>
                                    <label class="form-check-label" for="beneficiaryNo">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-tooltip">
                            Please select whether you are a 4Ps Beneficiary or not.
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 position-relative mt-4">
                        <div class="form-group">
                            <label for="status">Civil Status:</label>
                            <div class="col-md-3 d-inline">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="single" name="cstatus" value="single" {{ $farmersprofile->cstatus === 'Single' ? 'checked' : '' }} disabled required>
                                    <label class="form-check-label" for="single">Single</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="married" name="cstatus" value="married" {{ $farmersprofile->cstatus === 'Married' ? 'checked' : '' }} required disabled>
                                    <label class="form-check-label" for="married">Married</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="widowed" name="cstatus" value="widowed" {{ $farmersprofile->cstatus === 'Widowed' ? 'checked' : '' }} required disabled>
                                    <label class="form-check-label" for="widowed">Widowed</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="separated" name="cstatus" value="separated" {{ $farmersprofile->cstatus === 'Separated' ? 'checked' : '' }} required disabled>
                                    <label class="form-check-label" for="separated">Separated</label>
                                </div>
                            </div>
                            <div class="invalid-tooltip">
                                Please select one option for Civil Status.
                            </div>
                        </div>
                    </div>




                    <div class="col-md-3 position-relative mt-2">
                        <div class="form-group">
                            <label for="spouse">Name of Spouse if Married:</label>
                            <input type="text" class="form-control d-inline" id="spouse" name="spouse" value="{{ $farmersprofile->spouse}}" disabled
                                >
                            <div class="invalid-tooltip">
                                Please enter the name of your spouse if you are married.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 position-relative mt-2">
                        <div class="form-group">
                            <label for="mother">Mother's Maiden Name:</label>
                            <input type="text" class="form-control d-inline" id="mother" name="mother" value="{{ $farmersprofile-> mother }}"
                                required disabled>
                            <div class="invalid-tooltip">
                                Please enter your mother's maiden name.
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="mt-2">
                <p class="mt-0" style="font-weight: bold; font-size: 12px;">PART II. FARMERS
                    PROFILE</p>

                <div class="col-md-12 mt-0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="livelihood" class="mr-2">Main Livelihood:</label>
                                <div class="col-md-3 form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="livelihood" value="Farmers" id="farmers" disabled required
                                    @if($farmersprofile->livelihood === 'on')
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="farmers">Farmers</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label fw-bold mt-2">For
                                Farmers</label>
                        </div>
                        <p class="mt-0" style="font-size: 12px;">Types of Farming Activity</p>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                @foreach($farmers as $id => $farmer)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input crop-checkbox" type="checkbox" value="{{ $id }}" name="crops[{{ $id }}]"
                                            data-target="cropInputs{{ $id }}"
                                            @if($crops->contains('commodities_id', $id))
                                                checked
                                            @endif
                                        >
                                        <label class="form-check-label" for="farmer{{ $id }}">
                                            {{ $farmer }}
                                        </label>
                                    </div>
                                    <div class="commodity-inputs" id="cropInputs{{ $id }}">
                                        @foreach($crops->where('commodities_id', $id) as $crop)
                                            <div class="form-group">
                                                <label for="farmSize{{ $crop->commodities_id }}">Farm Size</label>
                                                <input type="text" class="form-control" id="farmSize{{ $crop->commodities_id }}" name="farm_size[{{ $crop->commodities_id }}]"
                                                    value="{{ $crop->farm_size }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="location{{ $crop->commodities_id }}">Location</label>
                                                <input type="text" class="form-control" id="location{{ $crop->commodities_id }}" name="farm_location[{{ $crop->commodities_id }}]"
                                                    value="{{ $crop->farm_location }}" disabled>
                                            </div>
                                        @endforeach
                                        @if($crops->where('commodities_id', $id)->isEmpty())
                                            <div class="form-group">
                                                <label for="farmSize{{ $id }}">Farm Size</label>
                                                <input type="text" class="form-control" id="farmSize{{ $id }}" name="farm_size[{{ $id }}]"
                                                    value="" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="location{{ $id }}">Location</label>
                                                <input type="text" class="form-control" id="location{{ $id }}" name="farm_location[{{ $id }}]"
                                                    value="" disabled>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="row">
                        <div class="container">
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <label class="form-check-label mt-2" style="margin-left: -12px; font-weight: bold;" for="highValueCrops">High Value Crops</label>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($commodities as $id => $commodity)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input crop-checkbox" type="checkbox" value="{{ $id }}" name="crops[{{ $id }}]"
                                            data-target="cropInputs{{ $id }}" disabled
                                            @if($crops->contains('commodities_id', $id))
                                                checked
                                            @endif
                                        >
                                        <label class="form-check-label" for="commodity{{ $id }}">
                                            {{ $commodity }}
                                        </label>
                                    </div>
                                    <div class="commodity-inputs" id="cropInputs{{ $id }}">
                                        @foreach($crops->where('commodities_id', $id) as $crop)
                                            <div class="form-group">
                                                <label for="farmSize{{ $crop->commodities_id }}">Farm Size</label>
                                                <input type="text" class="form-control" id="farmSize{{ $crop->commodities_id }}" name="farm_size[{{ $crop->commodities_id }}]"
                                                    value="{{ $crop->farm_size }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="location{{ $crop->commodities_id }}">Location</label>
                                                <input type="text" class="form-control" id="location{{ $crop->commodities_id }}" name="farm_location[{{ $crop->commodities_id }}]"
                                                    value="{{ $crop->farm_location }}" disabled>
                                            </div>
                                        @endforeach
                                        @if($crops->where('commodities_id', $id)->isEmpty())
                                            <div class="form-group">
                                                <label for="farmSize{{ $id }}">Farm Size</label>
                                                <input type="text" class="form-control" id="farmSize{{ $id }}" name="farm_size[{{ $id }}]"
                                                    value="" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="location{{ $id }}">Location</label>
                                                <input type="text" class="form-control" id="location{{ $id }}" name="farm_location[{{ $id }}]"
                                                    value="" disabled>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#highValueCrops').on('change', function() {
                            var isChecked = $(this).prop('checked');
                            $('.crop-checkbox').prop('disabled', !isChecked);
                            if (!isChecked) {
                                $('.commodity-inputs input').prop('disabled', true);
                            }
                        });

                        $('.crop-checkbox').on('change', function() {
                            var isChecked = $(this).prop('checked');
                            var inputsContainer = $('#' + $(this).data('target'));
                            inputsContainer.find('input').prop('disabled', !isChecked);
                        });
                    });
                </script>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label fw-bold mt-2">For Machineries</label>
                                        </div>
                                        <div class="row">
                                            @php $machineCount = 0; @endphp
                                            @foreach ($machine as $id => $machineName)
                                                @if ($machineCount % 3 === 0)
                                                    </div>
                                                    <div class="row">
                                                @endif
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="machine_{{ $id }}" name="machineries[{{ $id }}]"
                                                            value="{{ $id }}" data-target="noofunits_{{ $id }}"
                                                            @if($machineries->contains('machine_id', $id))
                                                                checked
                                                            @endif
                                                            disabled>
                                                        <label class="form-check-label" for="machine_{{ $id }}">{{ $machineName }}</label>
                                                    </div>
                                                    @foreach($machineries->where('machine_id', $id) as $machineName)
                                                    <div class="form-group">
                                                        <label for="units{{ $machineName->machine_id }}">No. of Units</label>
                                                        <input type="text" class="form-control" id="units{{ $machineName->machine_id }}" name="units[{{ $machineName->machine_id }}]"
                                                            value="{{ $machineName->units }}" disabled>
                                                    </div>
                                                @endforeach
                                                @if($machineries->where('machine_id', $id)->isEmpty())
                                                    <div class="form-group">
                                                         <label for="units{{ $id }}">No. of Units</label>
                                                        <input type="text" class="form-control" id="units{{ $id }}" name="units[{{ $id }}]"
                                                        value="" disabled>
                                                    </div>
                                                @endif
                                                </div>
                                                @php $machineCount++; @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                    {{-- <script>
                        $(document).ready(function() {
                            $('.form-check-input').on('change', function() {
                                var targetInputId = $(this).data('target');
                                var unitsInput = $('#' + targetInputId);

                                if ($(this).prop('checked')) {
                                    unitsInput.prop('disabled', false);
                                } else {
                                    unitsInput.prop('disabled', true);
                                }
                            });
                        });
                    </script> --}}



                            <!-- resources/views/livewire/income-form.blade.php -->
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Gross Annual Income Last
                                        Year:</label>
                                    <div class="d-flex align-items-center">
                                        <label class="me-2">Farming</label>
                                        <input type="number" class="form-control" id="validationCustom01" name="gross" value="{{ $farmersprofile->gross}}" disabled required>
                                        <label class="ms-3 me-2">Non-Farming</label>
                                        <input type="number" class="form-control" id="validationCustom02" name="grosses" value="{{ $farmersprofile->grosses}}" disabled required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide the gross annual income for both farming and non-farming.
                                    </div>
                                </div>
                            </div>

                            <!-- resources/views/livewire/farm-parcels-form.blade.php -->
                            <div class="col-md-8 mt-3">
                                <label class="form-label">No. of Farm Parcels</label>
                                <input type="number" class="form-control" id="validationTooltip01" required
                                name="parcels" value="{{ $farmersprofile->parcels}}" disabled autofocus>
                                <div class="invalid-tooltip">
                                    Please provide the number of farm parcels.
                                </div>
                            </div>


                            <!-- resources/views/livewire/agrarian-reform-form.blade.php -->
                            <div class="col-md-4 position-relative mt-4">
                                <div class="form-group">
                                    <label for="pwd" class="mr-2">Agrarian Reform Beneficiaries:</label>
                                    <div class="row">
                                        <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="pwdYes"
                                                    name="arb" value="yes" {{ $farmersprofile->arb === 'yes' ? 'checked' : '' }} disabled required>
                                                <label class="form-check-label" for="pwdYes">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="pwdNo"
                                                    name="arb" value="no" {{ $farmersprofile->arb === 'no' ? 'checked' : '' }} disabled required>
                                                <label class="form-check-label" for="pwdNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invalid-tooltip">
                                        Please select if you are an Agrarian Reform Beneficiary.
                                    </div>
                                </div>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
@endsection
