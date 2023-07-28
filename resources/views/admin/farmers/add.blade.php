@extends('layouts.index')
@section('content')
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
                                        <input type="text" class="form-control" id="referenceNo" name="referenceNo"
                                            " required>
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
                                <select class="form-select" aria-label="Default select example" name="region" id="region"
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
                                <select class="form-select" aria-label="Default select example" name="province"
                                    id="province" required>
                                    <option value="" selected disabled>Select Province</option>
                                </select>
                                <div class="invalid-tooltip">
                                    The Province Address field is required.
                                </div>
                            </div>
                            <!-- Beekeeper City Address -->
                            <div class="col-md-4 position-relative mt-0">
                                <label class="form-label">City/Municipality<font color="red">*</font></label>
                                <select class="form-select" aria-label="Default select example" name="municipality"
                                    id="city" required>
                                    <option value="" selected disabled>Select City</option>
                                </select>
                                <div class="invalid-tooltip">
                                    The City/Municipality Address field is required.
                                </div>
                            </div>
                            <!-- Beekeeper Barangay Address -->
                            <div class="col-md-4  position-relative mt-0">
                                <label class="form-label">Barangay</label>
                                <select class="form-select" aria-label="Default select example" name="barangay"
                                    id="barangay" required>
                                    <option value="" selected disabled>Select Barangay</option>
                                </select>
                                <div class="invalid-tooltip">
                                    The Barangay Address field is required.
                                </div>
                            </div>

                            <div class="col-md-4 position-relative mt-0">
                                <label class="form-label">Street/Sitio/Purok/Subdv.</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="street"
                                    required autofocus="autofocus">
                                <div class="invalid-tooltip">
                                    The Street/Sitio/Purok/Subdv. field is required.
                                </div>
                            </div>

                            <div class="col-md-4 position-relative mt-0">
                                <label class="form-label">House/Lot/Bldg. No.</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="house" required
                                    autofocus="autofocus">
                                <div class="invalid-tooltip">
                                    The House/Lot/Bldg. No. field is required.
                                </div>
                            </div>
                            <hr class="mt-2">

                            <div class="col-md-6 position-relative mt-0">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="contactnumber"
                                    required autofocus="autofocus">
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
                                                <input class="form-check-input" type="checkbox" id="none"
                                                    value="none" onclick="handleEducationCheckbox('none')">
                                                <label class="form-check-label" for="none">None</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="elementary"
                                                    value="elementary" onclick="handleEducationCheckbox('elementary')">
                                                <label class="form-check-label" for="elementary">Elementary</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="highSchool"
                                                    value="highSchool" onclick="handleEducationCheckbox('highSchool')">
                                                <label class="form-check-label" for="highSchool">High School</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vocational"
                                                    value="vocational" onclick="handleEducationCheckbox('vocational')">
                                                <label class="form-check-label" for="vocational">Vocational</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="college"
                                                    value="college" onclick="handleEducationCheckbox('college')">
                                                <label class="form-check-label" for="college">College</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="postGraduate"
                                                    value="postGraduate"
                                                    onclick="handleEducationCheckbox('postGraduate')">
                                                <label class="form-check-label" for="postGraduate">Post-Graduate</label>
                                            </div>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Please select at least one option for Highest Formal Education.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function handleEducationCheckbox(checkboxId) {
                                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                    checkboxes.forEach((checkbox) => {
                                        if (checkbox.id !== checkboxId) {
                                            checkbox.checked = false;
                                        }
                                    });
                                }
                            </script>


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
                    <input class="form-check-input" type="radio" id="pwdYes" name="pwd" value="yes" required>
                    <label class="form-check-label" for="pwdYes">Yes</label>
                </div>
            </div>
            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="pwdNo" name="pwd" value="no" required>
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
                    <input class="form-check-input" type="radio" id="beneficiaryYes" name="beneficiary" value="yes" required>
                    <label class="form-check-label" for="beneficiaryYes">Yes</label>
                </div>
            </div>
            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="beneficiaryNo" name="beneficiary" value="no" required>
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
                                                <input class="form-check-input" type="checkbox" id="single" value="single"
                                                    onclick="handleCivilStatusCheckbox('single')" required>
                                                <label class="form-check-label" for="single">Single</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="married" value="married"
                                                    onclick="handleCivilStatusCheckbox('married')" required>
                                                <label class="form-check-label" for="married">Married</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="widowed" value="widowed"
                                                    onclick="handleCivilStatusCheckbox('widowed')" required>
                                                <label class="form-check-label" for="widowed">Widowed</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="separated" value="separated"
                                                    onclick="handleCivilStatusCheckbox('separated')" required>
                                                <label class="form-check-label" for="separated">Separated</label>
                                            </div>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Please select at least one option for Civil Status.
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    function handleCivilStatusCheckbox(checkboxId) {
                                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                        checkboxes.forEach((checkbox) => {
                                            if (checkbox.id !== checkboxId) {
                                                checkbox.checked = false;
                                            }
                                        });
                                    }
                                </script>


<div class="col-md-3 position-relative mt-2">
    <div class="form-group">
        <label for="spouse">Name of Spouse if Married:</label>
        <input type="text" class="form-control d-inline" id="spouse" name="spouse" required>
        <div class="invalid-tooltip">
            Please enter the name of your spouse if you are married.
        </div>
    </div>
</div>

<div class="col-md-3 position-relative mt-2">
    <div class="form-group">
        <label for="mother">Mother's Maiden Name:</label>
        <input type="text" class="form-control d-inline" id="mother" name="mother" required>
        <div class="invalid-tooltip">
            Please enter your mother's maiden name.
        </div>
    </div>
</div>

                            </div>


                            <hr class="mt-2">
                            <p class="mt-0" style="font-weight: bold; font-size: 12px;">PART II. FARMERS PROFILE</p>

                            <div class="col-md-12 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="livelihood" class="mr-2">Main Livelihood:</label>
                                            <div class="col-md-3 form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="farmers"
                                                    value="farmers" required>
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
                                        <div class="col-md-4 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="uplands" value="Uplands">
                                                <label class="form-check-label" for="uplands">Rice</label>
                                            </div>
                                            <label for="farmSizeUplands" class="form-label">Farm Size (area):</label>
                                            <input type="text" class="form-control" id="farmSizeUplands" name="farmSizeUplands">
                                            <!-- Additional form controls for Rice -->
                                            <label for="riceVariety" class="form-label">Farm Location</label>
                                            <input type="text" class="form-control" id="riceVariety" name="riceVariety">
                                            <!-- Add more form controls related to Rice here -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="lowlands" value="Lowlands">
                                                <label class="form-check-label" for="lowlands">Corn</label>
                                            </div>
                                            <label for="farmSizeLowlands" class="form-label">Farm Size (area):</label>
                                            <input type="text" class="form-control" id="farmSizeLowlands" name="farmSizeLowlands">
                                            <!-- Additional form controls for Corn -->
                                            <label for="cornVariety" class="form-label">Farm Location</label>
                                            <input type="text" class="form-control" id="cornVariety" name="cornVariety">
                                            <!-- Add more form controls related to Corn here -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="hilly" value="Hilly">
                                                <label class="form-check-label" for="hilly">Tobacco</label>
                                            </div>
                                            <label for="farmSizeHilly" class="form-label">Farm Size (area):</label>
                                            <input type="text" class="form-control" id="farmSizeHilly" name="farmSizeHilly">
                                            <!-- Additional form controls for Tobacco -->
                                            <label for="tobaccoVariety" class="form-label">Farm Location</label>
                                            <input type="text" class="form-control" id="tobaccoVariety" name="tobaccoVariety">
                                            <!-- Add more form controls related to Tobacco here -->
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="container">
                                                <div class="row">
                                                    <!-- High Value Crops -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="highValueCrops" value="High Value Crops">
                                                            <label class="form-check-label" for="highValueCrops">High Value Crops Please specify</label>
                                                        </div>
                                                    </div>

                                                    <!-- Talong -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="talong" value="Talong">
                                                            <label class="form-check-label" for="talong">Talong</label>
                                                        </div>
                                                        <div class="form-group" id="talongInput" style="display: none;">
                                                            <label for="talongFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="talongFarmSize" name="talongFarmSize">
                                                            <label for="talongFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="talongFarmLocation" name="talongFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Okra -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="okra" value="Okra">
                                                            <label class="form-check-label" for="okra">Okra</label>
                                                        </div>
                                                        <div class="form-group" id="okraInput" style="display: none;">
                                                            <label for="okraFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="okraFarmSize" name="okraFarmSize">
                                                            <label for="okraFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="okraFarmLocation" name="okraFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Ampalaya -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="ampalaya" value="Ampalaya">
                                                            <label class="form-check-label" for="ampalaya">Ampalaya</label>
                                                        </div>
                                                        <div class="form-group" id="ampalayaInput" style="display: none;">
                                                            <label for="ampalayaFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="ampalayaFarmSize" name="ampalayaFarmSize">
                                                            <label for="ampalayaFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="ampalayaFarmLocation" name="ampalayaFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Sitao -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sitao" value="Sitao">
                                                            <label class="form-check-label" for="sitao">Sitao</label>
                                                        </div>
                                                        <div class="form-group" id="sitaoInput" style="display: none;">
                                                            <label for="sitaoFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="sitaoFarmSize" name="sitaoFarmSize">
                                                            <label for="sitaoFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="sitaoFarmLocation" name="sitaoFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Sili -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sili" value="Sili">
                                                            <label class="form-check-label" for="sili">Sili</label>
                                                        </div>
                                                        <div class="form-group" id="siliInput" style="display: none;">
                                                            <label for="siliFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="siliFarmSize" name="siliFarmSize">
                                                            <label for="siliFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="siliFarmLocation" name="siliFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Kalabasa -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="kalabasa" value="Kalabasa">
                                                            <label class="form-check-label" for="kalabasa">Kalabasa</label>
                                                        </div>
                                                        <div class="form-group" id="kalabasaInput" style="display: none;">
                                                            <label for="kalabasaFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="kalabasaFarmSize" name="kalabasaFarmSize">
                                                            <label for="kalabasaFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="kalabasaFarmLocation" name="kalabasaFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Patola -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="patola" value="Patola">
                                                            <label class="form-check-label" for="patola">Patola</label>
                                                        </div>
                                                        <div class="form-group" id="patolaInput" style="display: none;">
                                                            <label for="patolaFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="patolaFarmSize" name="patolaFarmSize">
                                                            <label for="patolaFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="patolaFarmLocation" name="patolaFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Upo -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="upo" value="Upo">
                                                            <label class="form-check-label" for="upo">Upo</label>
                                                        </div>
                                                        <div class="form-group" id="upoInput" style="display: none;">
                                                            <label for="upoFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="upoFarmSize" name="upoFarmSize">
                                                            <label for="upoFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="upoFarmLocation" name="upoFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Pechay -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="pechay" value="Pechay">
                                                            <label class="form-check-label" for="pechay">Pechay</label>
                                                        </div>
                                                        <div class="form-group" id="pechayInput" style="display: none;">
                                                            <label for="pechayFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="pechayFarmSize" name="pechayFarmSize">
                                                            <label for="pechayFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="pechayFarmLocation" name="pechayFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Mongo -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="mongo" value="Mongo">
                                                            <label class="form-check-label" for="mongo">Mongo</label>
                                                        </div>
                                                        <div class="form-group" id="mongoInput" style="display: none;">
                                                            <label for="mongoFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="mongoFarmSize" name="mongoFarmSize">
                                                            <label for="mongoFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="mongoFarmLocation" name="mongoFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Peanut -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="peanut" value="Peanut">
                                                            <label class="form-check-label" for="peanut">Peanut</label>
                                                        </div>
                                                        <div class="form-group" id="peanutInput" style="display: none;">
                                                            <label for="peanutFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="peanutFarmSize" name="peanutFarmSize">
                                                            <label for="peanutFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="peanutFarmLocation" name="peanutFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Camote -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="camote" value="Camote">
                                                            <label class="form-check-label" for="camote">Camote</label>
                                                        </div>
                                                        <div class="form-group" id="camoteInput" style="display: none;">
                                                            <label for="camoteFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="camoteFarmSize" name="camoteFarmSize">
                                                            <label for="camoteFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="camoteFarmLocation" name="camoteFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Banana -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="banana" value="Banana">
                                                            <label class="form-check-label" for="banana">Banana</label>
                                                        </div>
                                                        <div class="form-group" id="bananaInput" style="display: none;">
                                                            <label for="bananaFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="bananaFarmSize" name="bananaFarmSize">
                                                            <label for="bananaFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="bananaFarmLocation" name="bananaFarmLocation">
                                                        </div>
                                                    </div>

                                                    <!-- Others -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="others" value="Others">
                                                            <label class="form-check-label" for="others">Others Specify</label>
                                                        </div>
                                                        <div class="form-group" id="othersInput" style="display: none;">
                                                            <label for="othersFarmSize">Farm Size:</label>
                                                            <input type="text" class="form-control" id="othersFarmSize" name="othersFarmSize">
                                                            <label for="othersFarmLocation">Farm Location:</label>
                                                            <input type="text" class="form-control" id="othersFarmLocation" name="othersFarmLocation">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                // Function to toggle the display of the input fields based on checkbox status
                                                function toggleInput(checkboxId, inputId) {
                                                    var checkbox = document.getElementById(checkboxId);
                                                    var inputField = document.getElementById(inputId);

                                                    if (checkbox.checked) {
                                                        inputField.style.display = 'block';
                                                    } else {
                                                        inputField.style.display = 'none';
                                                    }
                                                }

                                                // Function to add event listener for each crop checkbox
                                                function addEventListenersForCrops(cropNames) {
                                                    cropNames.forEach(function (cropName) {
                                                        if (cropName.toLowerCase() !== 'high value crops') {
                                                            var checkboxId = cropName.toLowerCase();
                                                            var inputId = cropName.toLowerCase() + "Input";
                                                            document.getElementById(checkboxId).addEventListener("change", function () {
                                                                toggleInput(checkboxId, inputId);
                                                            });
                                                        }
                                                    });
                                                }

                                                // List of crop choices
                                                var crops = ["Talong", "Okra", "Ampalaya", "Sitao", "Sili", "Kalabasa", "Patola", "Upo", "Pechay", "Mongo", "Peanut", "Camote", "Banana", "Others"];

                                                // Add event listeners for the crop checkboxes
                                                addEventListenersForCrops(crops);
                                            </script>





                                            <div class="col-md-4 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="livestock"
                                                        value="Livestock">
                                                    <label class="form-check-label" for="livestock">Livestock, Please
                                                        specify:</label>
                                                </div>
                                                <label for="farmSizeLivestock" class="form-label">FarmSize (area):</label>
                                                <input type="text" class="form-control" id="farmSizeLivestock"
                                                    name="farmSizeLivestock">

                                                <div class="form-group" id="livestockInput" style="display: none;">
                                                    <label for="livestockSpec">Specify Livestock:</label>
                                                    <input type="text" class="form-control" id="livestockSpec"
                                                        name="livestockSpec">
                                                </div>
                                            </div>


                                            <div class="col-md-4 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="poultry"
                                                        value="Poultry">
                                                    <label class="form-check-label" for="poultry">Poultry, Please
                                                        specify:</label>
                                                </div>
                                                <label for="farmSizePoultry" class="form-label">FarmSize (area):</label>
                                                <input type="text" class="form-control" id="farmSizePoultry"
                                                    name="farmSizePoultry">

                                                <div class="form-group" id="poultryInput" style="display: none;">
                                                    <label for="poultrySpec">Specify Poultry:</label>
                                                    <input type="text" class="form-control" id="poultrySpec"
                                                        name="poultrySpec">
                                                </div>
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
                                                    <!-- Machineries -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="riceCombineHarvester" value="Rice Combine Harvester" onclick="toggleInput('riceCombineHarvester', 'riceCombineHarvesterInput')">
                                                            <label class="form-check-label" for="riceCombineHarvester">Rice Combine Harvester</label>
                                                        </div>
                                                        <div class="form-group" id="riceCombineHarvesterInput" style="display: none;">
                                                            <label for="riceCombineHarvesterUnits">No. of Units:</label>
                                                            <input type="text" class="form-control" id="riceCombineHarvesterUnits" name="riceCombineHarvesterUnits">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="fourWheelTractor" value="4 Wheel Tractor" onclick="toggleInput('fourWheelTractor', 'fourWheelTractorInput')">
                                                            <label class="form-check-label" for="fourWheelTractor">4 Wheel Tractor</label>
                                                        </div>
                                                        <div class="form-group" id="fourWheelTractorInput" style="display: none;">
                                                            <label for="fourWheelTractorUnits">No. of Units:</label>
                                                            <input type="text" class="form-control" id="fourWheelTractorUnits" name="fourWheelTractorUnits">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="riceTransplanter" value="Rice Transplanter" onclick="toggleInput('riceTransplanter', 'riceTransplanterInput')">
                                                            <label class="form-check-label" for="riceTransplanter">Rice Transplanter</label>
                                                        </div>
                                                        <div class="form-group" id="riceTransplanterInput" style="display: none;">
                                                            <label for="riceTransplanterUnits">No. of Units:</label>
                                                            <input type="text" class="form-control" id="riceTransplanterUnits" name="riceTransplanterUnits">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="thresher" value="Thresher" onclick="toggleInput('thresher', 'thresherInput')">
                                                            <label class="form-check-label" for="thresher">Thresher</label>
                                                        </div>
                                                        <div class="form-group" id="thresherInput" style="display: none;">
                                                            <label for="thresherUnits">No. of Units:</label>
                                                            <input type="text" class="form-control" id="thresherUnits" name="thresherUnits">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="waterpump" value="Waterpump" onclick="toggleInput('waterpump', 'waterpumpInput')">
                                                            <label class="form-check-label" for="waterpump">Waterpump</label>
                                                        </div>
                                                        <div class="form-group" id="waterpumpInput" style="display: none;">
                                                            <label for="waterpumpUnits">No. of Units:</label>
                                                            <input type="text" class="form-control" id="waterpumpUnits" name="waterpumpUnits">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="othersMachinery" value="Others Machinery" onclick="toggleInput('othersMachinery', 'othersMachineryInput')">
                                                            <label class="form-check-label" for="othersMachinery">Others, specify</label>
                                                        </div>
                                                        <div class="form-group" id="othersMachineryInput" style="display: none;">
                                                            <label for="othersMachineryUnits">No. of Units:</label>
                                                            <input type="text" class="form-control" id="othersMachineryUnits" name="othersMachineryUnits">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                // Function to toggle the display of the input fields based on checkbox status
                                                function toggleInput(checkboxId, inputId) {
                                                    var checkbox = document.getElementById(checkboxId);
                                                    var inputField = document.getElementById(inputId);

                                                    if (checkbox.checked) {
                                                        inputField.style.display = 'block';
                                                    } else {
                                                        inputField.style.display = 'none';
                                                    }
                                                }
                                            </script>



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

<div class="col-md-4">
    <label for="enrollmentType" class="mr-2" style="margin-top: 35px; ">Agrarian Reform Beneficiary:</label>
    <div class="row">
        <div class="form-check form-check-inline" style="display: inline-block; margin-right: 10px">
            <input class="form-check-input" type="radio" name="enrollmentType" value="male" >
            <label class="form-check-label">Yes</label>
        </div>
        <div class="form-check form-check-inline" style="display: inline-block; margin-right: 10px">
            <input class="form-check-input" type="radio" name="enrollmentType" value="female" >
            <label class="form-check-label">No</label>
        </div>
    </div>
    <div class="invalid-tooltip">

    </div>
</div>

                                        </div>
                                    </div>
                                </div>




                                <script>
                                    const highValueCropsCheckbox = document.getElementById('highValueCrops');
                                    const highValueCropsInput = document.getElementById('highValueCropsInput');
                                    const livestockCheckbox = document.getElementById('livestock');
                                    const livestockInput = document.getElementById('livestockInput');
                                    const poultryCheckbox = document.getElementById('poultry');
                                    const poultryInput = document.getElementById('poultryInput');

                                    highValueCropsCheckbox.addEventListener('change', function() {
                                        if (this.checked) {
                                            highValueCropsInput.style.display = 'block';
                                        } else {
                                            highValueCropsInput.style.display = 'none';
                                        }
                                    });

                                    livestockCheckbox.addEventListener('change', function() {
                                        if (this.checked) {
                                            livestockInput.style.display = 'block';
                                        } else {
                                            livestockInput.style.display = 'none';
                                        }
                                    });

                                    poultryCheckbox.addEventListener('change', function() {
                                        if (this.checked) {
                                            poultryInput.style.display = 'block';
                                        } else {
                                            poultryInput.style.display = 'none';
                                        }
                                    });
                                </script>




                                <hr class="mt-5">

                                <label class="form-check-label" for="termsCheck">
                                    <input class="form-check-input mr-2 text-center" type="checkbox" id="termsCheck" required>
                                    I hereby declare that all information indicated above is true and correct, and that they may be used by Municipal Agriculurist Office of Balaoan, La Union for the purposes of registration to the Registry System for Basic Sectors in Agriculture (RSBSA) and other legitimate interests of the Department pursuant to its mandates.
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
                                                <button class="btn btn-primary submit-button" name="submit" onclick="validateForm()">Submit</button>
                                                <button class="btn btn-primary" type="submit">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function validateForm() {
                                        // Get all the input fields in the form
                                        const formInputs = document.querySelectorAll('input');

                                        // Loop through each input field and check if it's empty
                                        let hasBlankField = false;
                                        for (const input of formInputs) {
                                            if (input.required && input.value.trim() === '') {
                                                hasBlankField = true;
                                                input.classList.add('is-invalid');
                                            } else {
                                                input.classList.remove('is-invalid');
                                            }
                                        }

                                        // If there's any blank field, prevent form submission
                                        if (hasBlankField) {
                                            event.preventDefault();
                                            return;
                                        }

                                        // Form validation passed, allow form submission
                                        // Do any other necessary form processing here
                                    }
                                </script>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
