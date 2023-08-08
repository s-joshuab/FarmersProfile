@extends('layouts.index')
@section('content')
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
                                            name="ref_no" " required>
                                                    <div class="invalid-tooltip">
                                                        Please enter a valid reference/control number.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 position-relative mt-3">
                                            <label class="form-label">Status</label>
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status"  required>
                                                    <option value="" selected disabled>Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Please select a status.
                                                </div>
                                            </div>
                                        </div>




                                        <hr class="mt-2">
                                        <p class="mt-0" style="font-weight: bold; font-size: 12px;">PART I. PERSONAL INFORMATION</p>

                                        <div class="col-md-6 position-relative mt-0">
                                            <label class="form-label">Surname</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="sname"  required
                                                autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The Surname field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-6 position-relative mt-0">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="fname"
                                                required autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The First Name field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-5 position-relative mt-0">
                                            <label class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="mname"
                                                required autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The Middle Name field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-3 position-relative mt-0">
                                            <label class="form-label">Extension Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="ename"
                                                required autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The Extension Name field is required.
                                            </div>
                                        </div>
                                        <div class="col-md-4 position-relative" style="margin-top: 35px;">
                                            <div class="form-inline">
                                                <label for="sex" class="mr-2">Sex:</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sex" id="maleOption" value="male" required>
                                                    <label class="form-check-label" for="maleOption">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sex" id="femaleOption" value="female" required>
                                                    <label class="form-check-label" for="femaleOption">Female</label>
                                                </div>
                                            </div>
                                        </div>


                                        <hr class="mt-2">
                                        <p class="mt-0" style="font-weight:bold; font-size: 12px;">ADDRESS</p>
                                        <div class="col-md-4 position-relative mt-0">
                                            <label for="Region">Region</label>
                                            <div class="form-control-custom">
                                              <input type="text" id="regions" name="regions" class="form-control" value="Region I" readonly>
                                            </div>
                                          </div>

                                        <!-- Beekeeper Province Address -->
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

                                        <div class="col-md-4 position-relative mt-2">
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




                                        <div class="col-md-4 position-relative mt-0">
                                            <label class="form-label">Street/Sitio/Purok/Subdv.</label>
                                            <input type="text" class="form-control" id="validationTooltip01"
                                                name="purok" required autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The Street/Sitio/Purok/Subdv. field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-4 position-relative mt-0">
                                            <label class="form-label">House/Lot/Bldg. No.</label>
                                            <input type="text" class="form-control" id="validationTooltip01"
                                                name="house" required autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The House/Lot/Bldg. No. field is required.
                                            </div>
                                        </div>

                                        <hr class="mt-2">


                                        <div class="col-md-6 position-relative mt-0">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" id="validationTooltip01"
                                                name="number" required autofocus="autofocus">
                                            <div class="invalid-tooltip">
                                                The contactnumber field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-6 position-relative mt-0">
                                            <div class="form-group">
                                                <label for="highest_formal_education" class="mr-2">Highest Formal
                                                    Education:</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="none"
                                                                name="education" " value="none"
                                            onclick="handleEducationRadio('none')">
                                        <label class="form-check-label" for="none">None</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="elementary"
                                            name="education" value="elementary"
                                            onclick="handleEducationRadio('elementary')">
                                        <label class="form-check-label" for="elementary">Elementary</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="highSchool"
                                            name="education" value="highSchool"
                                            onclick="handleEducationRadio('highSchool')">
                                        <label class="form-check-label" for="highSchool">High
                                            School</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="vocational"
                                            name="education" value="vocational"
                                            onclick="handleEducationRadio('vocational')">
                                        <label class="form-check-label" for="vocational">Vocational</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="college"
                                            name="education" value="college"
                                            onclick="handleEducationRadio('college')">
                                        <label class="form-check-label" for="college">College</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="postGraduate"
                                            name="education" value="postGraduate"
                                            onclick="handleEducationRadio('postGraduate')">
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
                            <input type="date" class="form-control" id="dob" name="dob" required>
                            <div class="invalid-tooltip">
                                Please enter your date of birth.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 position-relative mt-2">
                        <div class="form-group">
                            <label for="pob">Place of Birth:</label>
                            <input type="text" class="form-control" id="pob" name="pob" required>
                            <div class="invalid-tooltip">
                                Please enter your place of birth.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 position-relative mt-2">
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion" required>
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
                                        <input class="form-check-input" type="radio" id="pwdYes" name="pwd"
                                            value="yes" required>
                                        <label class="form-check-label" for="pwdYes">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="pwdNo" name="pwd"
                                            value="no" required>
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
                                            name="benefits" value="yes" required>
                                        <label class="form-check-label" for="beneficiaryYes">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="beneficiaryNo" name="benefits"
                                            value="no" required>
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
                                        <input class="form-check-input" type="radio" id="single"
                                            name="cstatus" value="single" onclick="handleCivilStatusRadio('single')"
                                            required>
                                        <label class="form-check-label" for="single">Single</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="married"
                                            name="cstatus" value="married"
                                            onclick="handleCivilStatusRadio('married')" required>
                                        <label class="form-check-label" for="married">Married</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="widowed"
                                            name="cstatus" value="widowed"
                                            onclick="handleCivilStatusRadio('widowed')" required>
                                        <label class="form-check-label" for="widowed">Widowed</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="separated"
                                            name="cstatus" value="separated"
                                            onclick="handleCivilStatusRadio('separated')" required>
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
                                <input type="text" class="form-control d-inline" id="spouse" name="spouse"
                                    required>
                                <div class="invalid-tooltip">
                                    Please enter the name of your spouse if you are married.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 position-relative mt-2">
                            <div class="form-group">
                                <label for="mother">Mother's Maiden Name:</label>
                                <input type="text" class="form-control d-inline" id="mother" name="mother"
                                    required>
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
                                        <input class="form-check-input" type="checkbox" name="livelihood"
                                            id="farmers"  required>
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

                        <div class="col-md-12">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        @foreach($farmers as $id => $farmer)
                                        <div class="col-md-4"> <!-- Create columns with a width of 4 to achieve 3 per row -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $id }}" name="selected_commodities[]">
                                                <label class="form-check-label" for="commodity{{ $id }}">
                                                    {{ $farmer }}
                                                </label>
                                            </div>
                                            <div class="commodity-inputs">
                                                <div class="form-group">
                                                    <label for="farmSize{{ $id }}">Farm Size</label>
                                                    <input type="text" class="form-control" id="farmSize{{ $id }}" name="farm_size[{{ $id }}]">
                                                </div>
                                                <div class="form-group">
                                                    <label for="location{{ $id }}">Location</label>
                                                    <input type="text" class="form-control" id="location{{ $id }}" name="farm_location[{{ $id }}]">
                                                </div>
                                            </div>
                                        </div>
                                        @if (($loop->iteration % 3) == 0)
                                            </div><div class="row"> <!-- Start a new row after every 3 iterations -->
                                        @endif
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
                                            <input class="form-check-input" type="checkbox" id="highValueCrops" name="highValueCrops"
                                                value="High Value Crops">
                                            <label class="form-check-label" for="highValueCrops">High Value Crops Please specify</label>
                                        </div>
                                    </div>
                                    @foreach($commodities as $id => $commodity)
                                    @if (($loop->iteration - 1) % 3 === 0)
                                        <div class="row"> <!-- Start a new row every 3 iterations -->
                                    @endif
                                    <div class="col-md-4"> <!-- Create columns with a width of 4 to achieve 3 per row -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $id }}" name="selected_commodities[]">
                                            <label class="form-check-label" for="commodity{{ $id }}">
                                                {{ $commodity }}
                                            </label>
                                        </div>
                                        <div class="commodity-inputs">
                                            <div class="form-group">
                                                <label for="farmSize{{ $id }}">Farm Size</label>
                                                <input type="text" class="form-control" id="farmSize{{ $id }}" name="farm_size[{{ $id }}]">
                                            </div>
                                            <div class="form-group">
                                                <label for="location{{ $id }}">Location</label>
                                                <input type="text" class="form-control" id="location{{ $id }}" name="farm_location[{{ $id }}]">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($loop->iteration % 3 === 0 || $loop->last)
                                        </div> <!-- Close the row after every 3 iterations or on the last iteration -->
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>


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
                                                        value="{{ $id }}">
                                                    <label class="form-check-label" for="machine_{{ $id }}">{{ $machineName }}</label>
                                                </div>
                                                <label for="noofunits_{{ $id }}" class="form-label">No. Of Units:</label>
                                                <input type="text" class="form-control" id="noofunits_{{ $id }}" name="units[{{ $id }}]">
                                            </div>
                                            @php $machineCount++; @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>



                                <!-- resources/views/livewire/income-form.blade.php -->
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="form-label">Gross Annual Income Last
                                            Year:</label>
                                        <div class="d-flex align-items-center">
                                            <label class="me-2">Farming</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="gross" required>
                                            <label class="ms-3 me-2">Non-Farming</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="gross" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide the gross annual income for both farming and non-farming.
                                        </div>
                                    </div>
                                </div>

                                <!-- resources/views/livewire/farm-parcels-form.blade.php -->
                                <div class="col-md-8 mt-3">
                                    <label class="form-label">No. of Farm Parcels</label>
                                    <input type="text" class="form-control" id="validationTooltip01" required
                                    name="parcels"
                                        autofocus>
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
                                                        name="arb" value="yes" required>
                                                    <label class="form-check-label" for="pwdYes">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pwdNo"
                                                        name="arb" value="no" required>
                                                    <label class="form-check-label" for="pwdNo">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Please select if you are an Agrarian Reform Beneficiary.
                                        </div>
                                    </div>
                                </div>





                                <hr class="mt-5">

                                <label class="form-check-label" for="termsCheck">
                                    <input class="form-check-input mr-2 text-center" type="checkbox" id="termsCheck"
                                        required>
                                    I hereby declare that all information indicated above is true and
                                    correct,
                                    and that they may be used by Municipal Agriculurist Office of
                                    Balaoan, La
                                    Union for the purposes of registration to the Registry System for
                                    Basic
                                    Sectors in Agriculture (RSBSA) and other legitimate interests of the
                                    Department pursuant to its mandates.
                                </label>
                                <div class="invalid-tooltip">
                                    Please accept the declaration to proceed.
                                </div>



                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <textarea class="form-control" style="height: 120px;"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control" style="height: 120px;"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control" style="height: 120px;"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control" style="height: 120px;"></textarea>
                                            </td>
                                        </tr>

                                    <tfoot style="text-align: center;">
                                        <tr>
                                            <th>Date</th>
                                            <th>PRINTED NAME OF APPLICANT</th>
                                            <th>SIGNATURE OF APPLICANT</th>
                                            <th>THUMBMARK</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>


                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end p-3">
                                            <div class="button-container">
                                                <button class="btn btn-primary submit-button"
                                                    name="submit">Submit</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

<!-- Add this to your admin.farmers.create view -->

@endsection
