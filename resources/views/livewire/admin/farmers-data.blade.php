<div>

    <div class="row">
        <div class="container">
            <div class="col-lg-12">

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
                                        <input type="text" class="form-control" id="referenceNo" name="referenceNo" " required>
                                                <div class="invalid-tooltip">
                                                    Please enter a valid reference/control number.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-3">
                                        <label class="form-label">Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required>
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
                                        <input type="text" class="form-control" id="validationTooltip01" name="surname" required
                                            autofocus="autofocus">
                                        <div class="invalid-tooltip">
                                            The Surname field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-0">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="firstname"
                                            required autofocus="autofocus">
                                        <div class="invalid-tooltip">
                                            The First Name field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-5 position-relative mt-0">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="middlename"
                                            required autofocus="autofocus">
                                        <div class="invalid-tooltip">
                                            The Middle Name field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-3 position-relative mt-0">
                                        <label class="form-label">Extension Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="extensionname"
                                            required autofocus="autofocus">
                                        <div class="invalid-tooltip">
                                            The Extension Name field is required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 position-relative" style="margin-top: 35px;">
                                        <div class="form-inline">
                                            <label for="enrollmentType" class="mr-2">Sex:</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="enrollmentType" id="maleOption" value="male" required>
                                                <label class="form-check-label" for="maleOption">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="enrollmentType" id="femaleOption" value="female" required>
                                                <label class="form-check-label" for="femaleOption">Female</label>
                                            </div>
                                        </div>
                                    </div>


                                    <hr class="mt-2">
                                    <p class="mt-0" style="font-weight:bold; font-size: 12px;">ADDRESS</p>

                                    <div class="col-md-4 position-relative mt-0">
                                        <label class="form-label">Region<font color="red">*</font></label>
                                        <select class="form-select" aria-label="Default select example" name="region" wire:model="region" id="region"
                                            required>
                                            <option value="selected disabled">Select Region</option>
                                            <option Value="01">REGION I</option>
                                            <option Value="02">REGION II</option>
                                            <option Value="03">REGION III</option>
                                            <option Value="04">REGION IV-A</option>
                                            <option Value="17">REGION IV-B</option>
                                            <option Value="05">REGION V</option>
                                            <option Value="06">REGION VI</option>
                                            <option Value="07">REGION VII</option>
                                            <option Value="08">REGION VIII</option>
                                            <option Value="09">REGION IX</option>
                                            <option Value="10">REGION X</option>
                                            <option Value="11">REGION XI</option>
                                            <option Value="12">REGION XII</option>
                                            <option Value="13">NATIONAL CAPITAL REGION</option>
                                            <option Value="14">CORDILLERA ADMINISTRATIVE REGION</option>
                                            <option Value="15">AUTONOMOUS REGION IN MUSLIM MINDANAO</option>
                                            <option Value="16">REGION XIII</option>
                                        </select>
                                        <div class="invalid-tooltip">
                                            The Region field is required.
                                        </div>
                                    </div>

                                    <!-- Beekeeper Province Address -->
                                    <div class="col-md-4 position-relative mt-0">
                                        <label class="form-label">Province<font color="red">*</font></label>
                                        <select class="form-select" aria-label="Default select example" name="province" wire:model="selectedProvince" id="province" required>
                                            <option value="" selected>Select Province</option>
                                             @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                                        @endforeach
                                        </select>


                                        <div class="invalid-tooltip">
                                            The Province Address field is required.
                                        </div>
                                    </div>
                                    <!-- Beekeeper City Address -->
                                    <div class="col-md-4 position-relative mt-0">
                                        <label class="form-label">City/Municipality<font color="red">*</font>
                                        </label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="municipality" wire:model="selectedMunicipality" id="city"
                                            required>
                                            <option value="" selected>Select Municipality</option>
                                            < @foreach ($municipalities as $municipality)
                                                <option value="{{ $municipality->id }}">
                                                    {{ $municipality->municipality_name }}</option>
                                                @endforeach
                                        </select>
                                        <div class="invalid-tooltip">
                                            The City/Municipality Address field is required.
                                        </div>
                                    </div>
                                    <!-- Beekeeper Barangay Address -->
                                    <div class="col-md-4  position-relative mt-0">
                                        <label class="form-label">Barangay</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="barangay" wire:model="selectedBarangay" id="barangay" required>
                                            <option value="" selected>Select Barangay</option>
                                            @foreach ($barangays as $barangay)
                                                <option value="{{ $barangay->id }}">{{ $barangay->barangay_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">
                                            The Barangay Address field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-4 position-relative mt-0">
                                        <label class="form-label">Street/Sitio/Purok/Subdv.</label>
                                        <input type="text" class="form-control" id="validationTooltip01"
                                            name="street" required autofocus="autofocus">
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
                                            name="contactnumber" required autofocus="autofocus">
                                        <div class="invalid-tooltip">
                                            The contactnumber field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-0">
                                        <div class="form-group">
                                            <label for="education" class="mr-2">Highest Formal Education:</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="none"
                                                            name="education" value="none"
                                                            onclick="handleEducationRadio('none')">
                                                        <label class="form-check-label" for="none">None</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            id="elementary" name="education" value="elementary"
                                                            onclick="handleEducationRadio('elementary')">
                                                        <label class="form-check-label"
                                                            for="elementary">Elementary</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            id="highSchool" name="education" value="highSchool"
                                                            onclick="handleEducationRadio('highSchool')">
                                                        <label class="form-check-label" for="highSchool">High
                                                            School</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            id="vocational" name="education" value="vocational"
                                                            onclick="handleEducationRadio('vocational')">
                                                        <label class="form-check-label"
                                                            for="vocational">Vocational</label>
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
                                                        <input class="form-check-input" type="radio"
                                                            id="postGraduate" name="education" value="postGraduate"
                                                            onclick="handleEducationRadio('postGraduate')">
                                                        <label class="form-check-label"
                                                            for="postGraduate">Post-Graduate</label>
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
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                required>
                                            <div class="invalid-tooltip">
                                                Please enter your date of birth.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-2">
                                        <div class="form-group">
                                            <label for="pob">Place of Birth:</label>
                                            <input type="text" class="form-control" id="pob" name="pob"
                                                required>
                                            <div class="invalid-tooltip">
                                                Please enter your place of birth.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative mt-2">
                                        <div class="form-group">
                                            <label for="religion">Religion</label>
                                            <input type="text" class="form-control" id="religion"
                                                name="religion" required>
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
                                                        <input class="form-check-input" type="radio" id="pwdYes"
                                                            name="pwd" value="yes" required>
                                                        <label class="form-check-label" for="pwdYes">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="pwdNo"
                                                            name="pwd" value="no" required>
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
                                                        <input class="form-check-input" type="radio"
                                                            id="beneficiaryYes" name="beneficiary" value="yes"
                                                            required>
                                                        <label class="form-check-label"
                                                            for="beneficiaryYes">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            id="beneficiaryNo" name="beneficiary" value="no"
                                                            required>
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
                                                            name="civilStatus" value="single"
                                                            onclick="handleCivilStatusRadio('single')" required>
                                                        <label class="form-check-label" for="single">Single</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="married"
                                                            name="civilStatus" value="married"
                                                            onclick="handleCivilStatusRadio('married')" required>
                                                        <label class="form-check-label" for="married">Married</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="widowed"
                                                            name="civilStatus" value="widowed"
                                                            onclick="handleCivilStatusRadio('widowed')" required>
                                                        <label class="form-check-label" for="widowed">Widowed</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="separated"
                                                            name="civilStatus" value="separated"
                                                            onclick="handleCivilStatusRadio('separated')" required>
                                                        <label class="form-check-label"
                                                            for="separated">Separated</label>
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
                                                <input type="text" class="form-control d-inline" id="spouse"
                                                    name="spouse" required>
                                                <div class="invalid-tooltip">
                                                    Please enter the name of your spouse if you are married.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 position-relative mt-2">
                                            <div class="form-group">
                                                <label for="mother">Mother's Maiden Name:</label>
                                                <input type="text" class="form-control d-inline" id="mother"
                                                    name="mother" required>
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
                                                        <input class="form-check-input" type="checkbox"
                                                            id="farmers" value="farmers" required>
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
                                                        @php $commodityCount = 0; @endphp
                                                        @foreach ($farmers as $Id => $farmer)
                                                            @if ($commodityCount % 3 === 0)
                                                                </div>
                                                                <div class="row">
                                                            @endif
                                                            <div class="col-md-4">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="livestock" >
                                                                    <label class="form-check-label" for="livestock">{{$farmer}}</label>
                                                                </div>
                                                                <label for="farmSizeLivestock" class="form-label">Farm Size (area):</label>
                                                                <input type="text" class="form-control" id="farmSizeLivestock" name="farmSizeLivestock" >

                                                                <div class="form-group" id="livestockInput" style="display: block;">
                                                                    <label for="livestockFarmLocation">Farm Location:</label>
                                                                    <input type="text" class="form-control" id="livestockFarmLocation" name="livestockFarmLocation" >
                                                                </div>
                                                            </div>
                                                            @php $commodityCount++; @endphp
                                                        @endforeach
                                                    </div>
                                                </div>
                                        </div>







                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="container">
                                                        <!-- High Value Crops -->
                                                        <div class="col-md-4 mb-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" wire:model="highValueCrops" value="High Value Crops" onclick="toggleCommodities()">
                                                                <label class="form-check-label" for="highValueCrops">High Value Crops Please specify</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @php $commodityCount = 0; @endphp
                                                            @foreach ($commodities as $Id => $commodity)
                                                                @if ($commodityCount % 3 === 0)
                                                                    </div>
                                                                    <div class="row">
                                                                @endif
                                                                <div class="col-md-4">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="livestock" @if(!$highValueCrops) disabled @endif>
                                                                        <label class="form-check-label" for="livestock">{{$commodity}}</label>
                                                                    </div>
                                                                    <label for="farmSizeLivestock" class="form-label">Farm Size (area):</label>
                                                                    <input type="text" class="form-control" id="farmSizeLivestock" name="farmSizeLivestock" @if(!$highValueCrops) disabled @endif>

                                                                    <div class="form-group" id="livestockInput" style="display: block;">
                                                                        <label for="livestockFarmLocation">Farm Location:</label>
                                                                        <input type="text" class="form-control" id="livestockFarmLocation" name="livestockFarmLocation" @if(!$highValueCrops) disabled @endif>
                                                                    </div>
                                                                </div>
                                                                @php $commodityCount++; @endphp
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <script>
                                                        function toggleCommodities() {
                                                            var highValueCropsCheckbox = document.getElementById("highValueCrops");
                                                            var commoditiesCheckboxes = document.querySelectorAll('input[id="livestock"]');
                                                            var commoditiesInputs = document.querySelectorAll('#livestockInput input');

                                                            var isHighValueCropsChecked = highValueCropsCheckbox.checked;
                                                            for (var i = 0; i < commoditiesCheckboxes.length; i++) {
                                                                commoditiesCheckboxes[i].disabled = !isHighValueCropsChecked;
                                                            }
                                                            for (var j = 0; j < commoditiesInputs.length; j++) {
                                                                commoditiesInputs[j].disabled = !isHighValueCropsChecked;
                                                            }
                                                        }
                                                    </script>


                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="container">
                                                                <div class="col-md-4">
                                                                    <label for="validationCustom04" class="form-label fw-bold mt-2">For Machineries</label>
                                                                </div>
                                                                <div class="row">
                                                                    <!-- Machineries -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="riceCombineHarvester" value="Rice Combine Harvester">
                                                                            <label class="form-check-label" for="riceCombineHarvester">Rice Combine Harvester</label>
                                                                        </div>
                                                                        <div class="form-group" id="riceCombineHarvesterInput">
                                                                            <label for="riceCombineHarvesterUnits">No. of Units:</label>
                                                                            <input type="text" class="form-control" id="riceCombineHarvesterUnits" name="riceCombineHarvesterUnits">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4 mb-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="fourWheelTractor" value="4 Wheel Tractor">
                                                                            <label class="form-check-label" for="fourWheelTractor">4 Wheel Tractor</label>
                                                                        </div>
                                                                        <div class="form-group" id="fourWheelTractorInput">
                                                                            <label for="fourWheelTractorUnits">No. of Units:</label>
                                                                            <input type="text" class="form-control" id="fourWheelTractorUnits" name="fourWheelTractorUnits">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4 mb-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="riceTransplanter" value="Rice Transplanter">
                                                                            <label class="form-check-label" for="riceTransplanter">Rice Transplanter</label>
                                                                        </div>
                                                                        <div class="form-group" id="riceTransplanterInput">
                                                                            <label for="riceTransplanterUnits">No. of Units:</label>
                                                                            <input type="text" class="form-control" id="riceTransplanterUnits" name="riceTransplanterUnits">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4 mb-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="thresher" value="Thresher">
                                                                            <label class="form-check-label" for="thresher">Thresher</label>
                                                                        </div>
                                                                        <div class="form-group" id="thresherInput">
                                                                            <label for="thresherUnits">No. of Units:</label>
                                                                            <input type="text" class="form-control" id="thresherUnits" name="thresherUnits">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4 mb-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="waterpump" value="Waterpump">
                                                                            <label class="form-check-label" for="waterpump">Waterpump</label>
                                                                        </div>
                                                                        <div class="form-group" id="waterpumpInput">
                                                                            <label for="waterpumpUnits">No. of Units:</label>
                                                                            <input type="text" class="form-control" id="waterpumpUnits" name="waterpumpUnits">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4 mb-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="othersMachinery" value="Others Machinery">
                                                                            <label class="form-check-label" for="othersMachinery">Others, specify</label>
                                                                        </div>
                                                                        <div class="form-group" id="othersMachineryInput">
                                                                            <label for="othersMachineryUnits">No. of Units:</label>
                                                                            <input type="text" class="form-control" id="othersMachineryUnits" name="othersMachineryUnits">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 mt-3">
                                                                <div class="form-group">
                                                                    <label for="validationCustom01" class="form-label">Gross Annual Income Last Year:</label>
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="me-2">Farming</label>
                                                                        <input type="text" class="form-control" id="validationCustom01" required>
                                                                        <label class="ms-3 me-2">Non-Farming</label>
                                                                        <input type="text" class="form-control" id="validationCustom02" required>
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Please provide the gross annual income for both farming and non-farming.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8 mt-3">
                                                                <label class="form-label">No. of Farm Parcels</label>
                                                                <input type="text" class="form-control" id="validationTooltip01" name="extensionname" required autofocus="autofocus">
                                                                <div class="invalid-tooltip">

                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 position-relative mt-4">
                                                                <div class="form-group">
                                                                    <label for="pwd" class="mr-2">Agrarian Reform Beneficiaries:</label>
                                                                    <div class="row">
                                                                        <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" id="Yes"
                                                                                    name="pwd" value="yes" required>
                                                                                <label class="form-check-label" for="pwdYes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" id="pwdNo"
                                                                                    name="pwd" value="no" required>
                                                                                <label class="form-check-label" for="No">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-tooltip">
                                                                        Please select if you are a Person with Disability (PWD).
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>




                                                <hr class="mt-5">

                                                <label class="form-check-label" for="termsCheck">
                                                    <input class="form-check-input mr-2 text-center" type="checkbox"
                                                        id="termsCheck" required>
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
                                                                <button class="btn btn-primary"
                                                                    type="submit">Cancel</button>
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
