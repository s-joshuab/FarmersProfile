@extends('layouts.index')
@section('content')
<div class="pagetitle">
    <h1>Report</h1><br>
  </div><!-- End Page Title -->

  <section class="section">

    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <form class="row g-3 needs-validation" novalidate action="generate_report.php" enctype="multipart/form-data" method="POST">

              <div class="col-md-6 position-relative">
                <label class="form-label">Choose Report<font color="red">*</font></label>
                <select class="form-select" aria-label="Default select example" name="report" id="report" required>
                  <option value="" selected>Select Report</option>
                </select>
                <div class="invalid-tooltip">
                  The Choose Report field is required.
                </div>
              </div>

              <div class="col-md-6 position-relative">

              </div>

              <div class="col-md-6 position-relative">
                <label class="form-label">Select Barangay</label>
                <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="barangay" id="barangay">
                        <option value="" selected disabled>Select Barangay</option>
                        @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 position-relative">
                <label class="form-label">Select Commodity</label>
                <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="commodity" id="commodity">
                        <option value="" selected disabled>Select Commodity</option>
                        @foreach ($commodities as $commodity)
                            <option value="{{ $commodity->id }}">{{ $commodity->commodities }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-warning" name="submit">Generate Report</button>
                <button type="reset" class="btn btn-primary">Cancel</button>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </section>


<!-- ... Your HTML code ... -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>


@endsection
