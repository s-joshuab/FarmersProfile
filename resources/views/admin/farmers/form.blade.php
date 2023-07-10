@extends('layouts.index')
@section('content')
      <div class="row">
        <div class="container">
         <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                  <h5 style="font-weight: bold; font-size: 30px; color: black; margin-top: 12px;">ANI AT KITA</h5>
                  <h5 style="font-weight: bold; font-size: 30px; color: black;">RSBSA ENROLLMENT FORM</h5>
                  <p style="font-weight: bold;">REGISTRY SYSTEM FOR BASIC SECTORS IN AGRICULTURE (RSBSA)</p>

                  <div class="form-inline mt-5">
                    <label for="enrollmentType" class="mr-2">Enrollment:</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="enrollmentType" id="newEnrollment" value="new">
                      <label class="form-check-label" for="newEnrollment">New</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="enrollmentType" id="existingEnrollment" value="existing">
                      <label class="form-check-label" for="existingEnrollment">Existing</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                    <!-- Box for Hard Copy 2x2 Image -->
                    <div style="position: relative; width: 200px; height: 200px; border: 1px solid #dee2e6; margin-top: 10px; margin-left: 150px; text-align: center;">
                      <p style="padding-top: 90px; margin-top: -20px;">2x2 Picture</p>
                      <p style="padding-top: 90px; margin-top: -50px;">PHOTO TAKEN<br>WITHIN 6 MONTHS</p>
                    </div>
                  </div>
                  <div id="outer-div" style="position: relative;">
                    <img src="{{ asset('assets/img/CERTIFIED BY.png') }}" style="position: absolute; top: -210px; left: 720px; width: 200px; height: 120px;">
                    <img src="{{ asset('assets/img/download.png') }}" style="position: absolute; top: -90px; bottom: 0px; left: 720px; width: 200px; height: 120px;">
                  </div>




              <div class="col-md-6 position-relative mt-5"">
                <div class="d-flex align-items-center">
                <label for="referenceNo" class="mr-2">Reference/Control No.: </label>
              <div class="flex-grow-1">
                <input type="text" class=" form-control" id="referenceNo" name="referenceNo" style="margin-left: 5px;">
              </div>
             </div>
           </div>

           <div class="col-md-6 position-relative mt-3">
            <label class="form-label">Status</label>
            <div class="col-sm-12">
              <select class="form-select" aria-label="Default select example" id="validationTooltip03" name = "status" required>
                <option value="" selected disabled>Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
              <div class="invalid-tooltip">
                The Active field is required.
              </div>
            </div>
           </div>



<hr class="mt-2">
<p class="mt-0" style="font-weight: bold; font-size: 12px;">PART I. PERSONAL INFORMATION</p>

                <div class="col-md-6 position-relative mt-0">
                  <label class="form-label">Surname</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "surname" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Surname field is required.
                  </div>
                </div>

                <div class="col-md-6 position-relative mt-0">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "firstname" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The First Name field is required.
                  </div>
                </div>

                <div class="col-md-6 position-relative mt-0">
                  <label class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "middlename" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Middle Name field is required.
                  </div>
                </div>

                <div class="col-md-3 position-relative mt-0">
                  <label class="form-label">Extension Name</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "extensionname" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Extension Name field is required.
                  </div>
                </div>
                <div class="col-md-3 position-relative" style="margin-top: 35px;">
                  <div class="form-inline">
                  <label for="enrollmentType" class="mr-2">Sex:</label>
             <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="enrollmentType"  value="male">
              <label class="form-check-label">Male</label>
             </div>
             <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="enrollmentType" value="female>
              <label class="form-check-label">Female</label>
            </div>
          </div>
        </div>


                <!-- <div class="col-md-12 position-relative">
                  <label class="form-label">Topography<font color = "red">*</font></label>
                  <select class="form-select" aria-label="Default select example" name = "topography_id" id="validationTooltip03" required>
                      <option value="" selected disabled>Select Topography</option>
                      <option value="3">Hill</option><option value="5">Lake</option><option value="1">Mountain</option><option value="7">Plain</option><option value="4">River</option><option value="2">Terrain</option><option value="6">Valley</option>                    </select>
                  <div class="invalid-tooltip">
                    The Beekeeper Name field is required.
                  </div>
                </div> -->

                <hr class="mt-2">
<p class="mt-0" style="font-weight:bold; font-size: 12px;">ADDRESS</p>

                  <div class="col-md-4 position-relative mt-0">
                    <label class="form-label">Region<font color = "red">*</font></label>
                    <select class="form-select" aria-label="Default select example" name = "region" id="region" required>
                        <option value="selected disabled">Select Region</option>
                        <option Value="01">REGION I</option><option Value="02">REGION II</option><option Value="03">REGION III</option><option Value="04">REGION IV-A</option><option Value="17">REGION IV-B</option><option Value="05">REGION V</option><option Value="06">REGION VI</option><option Value="07">REGION VII</option><option Value="08">REGION VIII</option><option Value="09">REGION IX</option><option Value="10">REGION X</option><option Value="11">REGION XI</option><option Value="12">REGION XII</option><option Value="13">NATIONAL CAPITAL REGION</option><option Value="14">CORDILLERA ADMINISTRATIVE REGION</option><option Value="15">AUTONOMOUS REGION IN MUSLIM MINDANAO</option><option Value="16">REGION XIII</option>                  </select>
                    <div class="invalid-tooltip">
                      The Region field is required.
                    </div>
                  </div>

                   <!-- Beekeeper Province Address -->
                <div class="col-md-4 position-relative mt-0">
                  <label class="form-label">Province<font color = "red">*</font></label>
                  <select class="form-select" aria-label="Default select example" name = "province" id="province" required>
                      <option value="" selected disabled>Select Province</option>
                  </select>
                  <div class="invalid-tooltip">
                    The Province Address field is required.
                  </div>
                </div>
                <!-- Beekeeper City Address -->
                <div class="col-md-4 position-relative mt-0">
                  <label class="form-label">City/Municipality<font color = "red">*</font></label>
                  <select class="form-select" aria-label="Default select example" name = "municipality" id="city" required>
                      <option value="" selected disabled>Select City</option>
                    </select>
                  <div class="invalid-tooltip">
                    The City/Municipality Address field is required.
                  </div>
                </div>
                <!-- Beekeeper Barangay Address -->
                <div class="col-md-4  position-relative mt-0">
                  <label class="form-label">Barangay</label>
                  <select class="form-select" aria-label="Default select example" name = "barangay" id="barangay" required>
                      <option value="" selected disabled>Select Barangay</option>
                    </select>
                  <div class="invalid-tooltip">
                    The Barangay Address field is required.
                  </div>
                </div>

                <div class="col-md-4 position-relative mt-0">
                  <label class="form-label">Street/Sitio/Purok/Subdv.</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "street" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Street/Sitio/Purok/Subdv. field is required.
                  </div>
                </div>

                <div class="col-md-4 position-relative mt-0">
                  <label class="form-label">House/Lot/Bldg. No.</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "house" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The House/Lot/Bldg. No. field is required.
                  </div>
                </div>
<hr class="mt-2">

                <div class="col-md-6 position-relative mt-0">
                  <label class="form-label">Contact Number</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "contactnumber" required autofocus="autofocus">
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
                  <input class="form-check-input" type="checkbox" id="none" value="none">
                  <label class="form-check-label" for="none">None</label>
                </div>
              </div>
                <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="elementary" value="elementary">
                  <label class="form-check-label" for="elementary">Elementary</label>
               </div>
              </div>
                <div class="col-md-4">
                <div class="form-check">
                 <input class="form-check-input" type="checkbox" id="highSchool" value="highSchool">
                <label class="form-check-label" for="highSchool">High School</label>
              </div>
             </div>
                <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="vocational" value="vocational">
                  <label class="form-check-label" for="vocational">Vocational</label>
              </div>
             </div>
                <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="college" value="college">
                  <label class="form-check-label" for="college">College</label>
              </div>
            </div>
              <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="postGraduate" value="postGraduate">
                <label class="form-check-label" for="postGraduate">Post-Graduate</label>
            </div>
          </div>
        </div>
      </div>
    </div>

                <div class="col-md-6 position-relative mt-2">
                  <div class="form-group">
                  <label for="dob">Date of Birth:</label>
                  <input type="date" class="form-control" id="dob" name="dob">
                </div>
              </div>

              <div class="col-md-6 position-relative mt-2">
                  <div class="form-group">
                  <label for="pob">Place of Birth:</label>
                  <input type="text" class="form-control" id="pob" name="pob">
                </div>
              </div>

              <div class="col-md-6 position-relative mt-2">
                  <div class="form-group">
                  <label for="religion">Religion</label>
                  <input type="text" class="form-control" id="religion" name="religion">
                </div>
              </div>

              <div class="col-md-3 position-relative mt-2">
                <div class="form-group">
                  <label for="pwd" class="mr-2">Person with Disability (PWD):</label>
                <div class="row">
                <div class="col-md-4 mt-1" style="margin-left: 20px;">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="pwdYes" name="pwd" value="yes">
                  <label class="form-check-label" for="pwdYes">Yes</label>
                </div>
              </div>
                <div class="col-md-4 mt-1" style="margin-left: 10px;">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="pwdNo" name="pwd" value="no">
                  <label class="form-check-label" for="pwdNo">No</label>
                </div>
              </div>
           </div>
        </div>
      </div>

              <div class="col-md-3 position-relative mt-2">
                <div class="form-group">
                  <label for="4ps" class="mr-2">4Ps Beneficiary:</label>
                <div class="row">
                <div class="col-md-4 mt-1" style="margin-left: 20px;">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="beneficiaryYes" name="beneficiary" value="yes">
                  <label class="form-check-label" for="beneficiaryYes">Yes</label>
                </div>
              </div>
              <div class="col-md-4 mt-1" style="margin-left: 10px;">
                <div class="form-check">
                 <input class="form-check-input" type="radio" id="beneficiaryNo" name="beneficiary" value="no">
                 <label class="form-check-label" for="beneficiaryNo">No</label>
              </div>
            </div>
         </div>
      </div>
    </div>


              <div class="col-md-4 position-relative mt-2">
                <div class="form-group">
                  <label for="status" class="mr-2">Civil Status:</label>
                <div class="row">
                <div class="col-md-6">
                <div class="form-check-inline">
                  <input class="form-check-input" type="checkbox" id="single" value="single">
                  <label class="form-check-label" for="single">Single</label>
              </div>
              <div class="form-check-inline">
                  <input class="form-check-input" type="checkbox" id="married" value="married">
                  <label class="form-check-label" for="married">Married</label>
               </div>
              </div>
              <div class="col-md-6">
              <div class="form-check-inline">
                  <input class="form-check-input" type="checkbox" id="widowed" value="widowed">
                  <label class="form-check-label" for="widowed">Widowed</label>
             </div>
              <div class="form-check-inline">
                  <input class="form-check-input" type="checkbox" id="separated" value="separated">
                  <label class="form-check-label" for="separated">Separated</label>
              </div>
            </div>
          </div>
        </div>
      </div>

                <div class="col-md-4 position-relative mt-2">
                  <div class="form-group">
                  <label for="spouse">Name of Spouse if Married:</label>
                  <input type="text" class="form-control" id="spouse" name="spouse">
                </div>
              </div>

              <div class="col-md-4 position-relative mt-2">
                  <div class="form-group">
                  <label for="spouse">Mother's Maiden Name</label>
                  <input type="text" class="form-control" id="spouse" name="spouse">
                </div>
              </div>

              <hr class="mt-2">
<p class="mt-0" style="font-weight: bold; font-size: 12px;">PART II. FARMERS PROFILE</p>

                <div class="col-md-12 mt-0">
                 <div class="form-group">
                  <label for="livelihood" class="mr-2">Main Livelihood:</label>
                 <div class="col-md-3 form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="farmers" value="farmers" style="margin-left: 5px;">
                  <label class="form-check-label" for="farmers">Farmers</label>
              </div>
                 <div class="col-md-3 form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="farmworkers" value="farmworkers">
                  <label class="form-check-label" for="farmworkers">Farmworkers</label>
             </div>
                <div class="col-md-3 form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="fisherfolks" value="fisherfolks">
                  <label class="form-check-label" for="fisherfolks">Fisherfolks</label>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <label for="validationCustom04" class="form-label fw-bold mt-2">For Farmers</label>
      </div>
      <p class="mt-0" style="font-size: 12px;">Types of Farming Activity</p>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="uplands" value="Uplands">
        <label class="form-check-label" for="uplands">Rice</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="lowlands" value="Lowlands">
        <label class="form-check-label" for="lowlands">Corn</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="hilly" value="Hilly">
        <label class="form-check-label" for="hilly">Tobacco</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="highValueCrops" value="High Value Crops">
        <label class="form-check-label" for="highValueCrops">High Value Crops Please specify</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group" id="highValueCropsInput" style="display: none;">
        <label for="highValueCropsSpec">Specify High Value Crops:</label>
        <input type="text" class="form-control" id="highValueCropsSpec" name="highValueCropsSpec">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="livestock" value="Livestock">
        <label class="form-check-label" for="livestock">Livestock, Please specify:</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group" id="livestockInput" style="display: none;">
        <label for="livestockSpec">Specify Livestock:</label>
        <input type="text" class="form-control" id="livestockSpec" name="livestockSpec">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="poultry" value="Poultry">
        <label class="form-check-label" for="poultry">Poultry, Please specify:</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group" id="poultryInput" style="display: none;">
        <label for="poultrySpec">Specify Poultry:</label>
        <input type="text" class="form-control" id="poultrySpec" name="poultrySpec">
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


<div class="col-md-4 mb-3">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <label for="validationCustom04" class="form-label fw-bold mt-2">For Farmworkers</label>
      </div>
      <p class="mt-0" style="font-size: 12px;">Land Preparation</p>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="owned" value="Owned">
        <label class="form-check-label" for="owned">Planting/Transplanting</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="leased" value="Leased">
        <label class="form-check-label" for="leased">Cultivation</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="tenancy" value="Tenancy">
        <label class="form-check-label" for="tenancy">Harvesting</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="other" value="Other">
        <label class="form-check-label" for="other">Others, Please specify:</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group" id="otherInput" style="display: none;">
        <label for="otherSpec">Specify Others:</label>
        <input type="text" class="form-control" id="otherSpec" name="otherSpec">
      </div>
    </div>
  </div>
</div>

<script>
  const otherCheckbox = document.getElementById('other');
  const otherInput = document.getElementById('otherInput');

  otherCheckbox.addEventListener('change', function() {
    if (this.checked) {
      otherInput.style.display = 'block';
    } else {
      otherInput.style.display = 'none';
    }
  });
</script>


<div class="col-md-4 mb-3">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <label for="validationCustom04" class="form-label fw-bold  mt-2">For Fisherfolks</label>
      </div>
      <p class="mt-0" style="font-size: 12px; text-align: justify;">The Landing Conduct shall coordinate with the Bureau Of Fisheries and Aquatic Resources (BFAR). In the issuance of a certification that the fisherfolk-borrower under PUNLA/PLEA is registered under the Municipal Fisherfolk Registration (FishR)</p>
      <p class="mt-0" style="font-size: 12px;">Type of Fishing Activity</p>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="fishCapture" value="Fish Capture">
        <label class="form-check-label" for="fishCapture">Fish Capture</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="aquaculture" value="Aquaculture">
        <label class="form-check-label" for="aquaculture">Aquaculture</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gleaning" value="Gleaning">
        <label class="form-check-label" for="gleaning">Gleaning</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="fishProcessing" value="Fish Processing">
        <label class="form-check-label" for="fishProcessing">Fish Processing</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="fishVending" value="Fish Vending">
        <label class="form-check-label" for="fishVending">Fish Vending</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="othersFisherfolk" value="Others">
        <label class="form-check-label" for="othersFisherfolk">Others, Please specify:</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group" id="othersInputFisherfolk" style="display: none;">
        <label for="othersSpecFisherfolk">Specify Others:</label>
        <input type="text" class="form-control" id="othersSpecFisherfolk" name="othersSpecFisherfolk">
      </div>
    </div>
  </div>
</div>

<script>
  const othersCheckboxFisherfolk = document.getElementById('othersFisherfolk');
  const othersInputFisherfolk = document.getElementById('othersInputFisherfolk');

  othersCheckboxFisherfolk.addEventListener('change', function() {
    othersInputFisherfolk.style.display = this.checked ? 'block' : 'none';
  });
</script>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <label for="validationCustom04" class="form-label fw-bold">For Machineries</label>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="machineries">Type of Machineries:</label>
          <input type="text" class="form-control" id="machineries" name="machineries">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="noofunits">Number of Units:</label>
          <input type="text" class="form-control" id="noofunits" name="noofunits">
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="machineries">Farm Location</label>
          <input type="text" class="form-control" id="machineries" name="machineries">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="noofunits">Farm Size (ha)</label>
          <input type="text" class="form-control" id="noofunits" name="noofunits">
        </div>
      </div>
    </div>
  </div>



<div class="col-md-12 mt-2">
  <div class="form-group">
    <label for="validationCustom01" class="form-label">Gross Annual Income Last Year:</label>
    <div class="d-flex align-items-center">
      <label class="me-2">Farming</label>
      <input type="text" class="form-control" id="validationCustom01" required>
      <label class="ms-3 me-2">Non-Farming</label>
      <input type="text" class="form-control" id="validationCustom02" required>
    </div>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
</div>










<hr class="mt-2">

<div class="col-md-6 position-relative mt-0">
                  <label class="form-label">No. of Farm Parcels</label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "extensionname" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Extension Name field is required.
                  </div>
                </div>
                <div class="col-md-6 position-relative" style="margin-top: 35px;">
                  <div class="form-inline">
                  <label for="enrollmentType" class="mr-2">Agrarian Reform Beneficiary:</label>
             <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="enrollmentType"  value="male">
              <label class="form-check-label">Yes</label>
             </div>
             <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="enrollmentType" value="female>
              <label class="form-check-label">No</label>
            </div>
          </div>
        </div>

        <hr class="mt-2">

    <p style="font-size: 12px; text-align: center;">I hereby declare that all information indicated above are true and correct, and that they may be used by Department of Agriculture for the purposes of registration to the Registry System for Basic Sectors in Agriculture (RSBSA) and other legitimate interests of the Department pursuant to its mandates.</p>


<table class="table">
      <tbody>
      <tr>
  <td><textarea class="form-control" style="height: 120px;"></textarea></td>
  <td><textarea class="form-control" style="height: 120px;" ></textarea></td>
  <td><textarea class="form-control" style="height: 120px;" ></textarea></td>
  <td><textarea class="form-control" style="height: 120px;" ></textarea></td>
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

      <div class="cutting-line">
        <span class="scissors-icon">✂️</span>
      </div>


      <div class="col-md-12 text-center">
        <h5 style="font-weight: bold; font-size: 30px; color: black; margin-top: 12px;">Registry System for Basic Sectors in Agriculture (RSBSA)</h5>
        <h5 style="font-weight: bold; font-size: 30px; color: black;">ENROLLMENT CLIENT’S COPY</h5>
    </div>

    <div class="col-md-6 position-relative mt-5"">
        <div class="d-flex align-items-center">
        <label for="referenceNo" class="mr-2">Reference/Control No.: </label>
      <div class="flex-grow-1">
        <input type="text" class=" form-control" id="referenceNo" name="referenceNo" style="margin-left: 5px;">
      </div>
     </div>
   </div>

   <div class="row mt-5">
   <div class="col-md-6 position-relative mt-0">
    <label class="form-label">Surname</label>
    <input type="text" class="form-control" id="validationTooltip01" name = "surname" required autofocus="autofocus">
    <div class="invalid-tooltip">
      The Surname field is required.
    </div>
  </div>

  <div class="col-md-6 position-relative mt-0">
    <label class="form-label">First Name</label>
    <input type="text" class="form-control" id="validationTooltip01" name = "firstname" required autofocus="autofocus">
    <div class="invalid-tooltip">
      The First Name field is required.
    </div>
  </div>

  <div class="col-md-6 position-relative mt-0">
    <label class="form-label">Middle Name</label>
    <input type="text" class="form-control" id="validationTooltip01" name = "middlename" required autofocus="autofocus">
    <div class="invalid-tooltip">
      The Middle Name field is required.
    </div>
  </div>

  <div class="col-md-3 position-relative mt-0">
    <label class="form-label">Extension Name</label>
    <input type="text" class="form-control" id="validationTooltip01" name = "extensionname" required autofocus="autofocus">
    <div class="invalid-tooltip">
      The Extension Name field is required.
    </div>
  </div>
   </div>



      <div class="container">
        <div class="row">
          <div class="col-12 d-flex justify-content-end p-3">
            <div class="button-container">
              <button class="btn btn-primary submit-button" name="submit">Save</button>
              <button class="btn btn-primary" type="submit">Cancel</button>
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

      <style>
        @media screen and (min-width: 768px) {
  /* Styles for screens with a minimum width of 768px (PCs and laptops) */
  #preview-container {
    max-width: 500px; /* Adjust the maximum width as per your requirements */
    margin: 0 auto; /* Center the container horizontally */
  }
}

        .cutting-line {
          position: relative;
          margin: 20px 0;
          display: flex;
          align-items: center;
        }

        .cutting-line::before,
        .cutting-line::after {
          content: "";
          flex-grow: 1;
          height: 1px;
          background-color: #000;
        }

        .cutting-line::before {
          margin-right: 10px;
        }

        .cutting-line::after {
          margin-left: 10px;
        }

        .cutting-line .scissors-icon {
          font-family: "Font Awesome 5 Free";
          font-weight: 900;
          font-size: 20px;
          line-height: 1;
          padding: 5px;
          color: #000;
          background-color: #fff;
          border: 1px solid #000;
          border-radius: 50%;
        }
      </style>
@endsection
