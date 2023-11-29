@extends('layouts.index')

@section('content')
<div class="title-container text-center py-4">
    <h1 class="display-4 font-weight-bold">Add Benefits</h1>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('farmers.beneficiary', ['id' => $farmersprofile->id]) }}">
                @csrf
                <input type="hidden" name="farmersprofile_id" value="{{ $farmersprofile->id }}">

                <div id="form-container">
                    <!-- Initial form fields -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="benefits">Benefits</label>
                                    <input type="text" class="form-control" name="benefits[]" placeholder="Enter something">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date[]" placeholder="Select date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <!-- Add Form button on the left -->
                        <div class="col-md-6 mt-3 align-self-start">
                            <button type="button" class="btn btn-success" onclick="addForm()">
                                Add Form <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between p-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function addForm() {
        // Clone the existing form fields
        var formFields = document.querySelector('#form-container .row').cloneNode(true);

        // Clear the values in the cloned form fields
        var inputs = formFields.querySelectorAll('input');
        inputs.forEach(function (input) {
            input.value = '';
        });

        // Append the cloned form fields to the form container
        document.getElementById('form-container').appendChild(formFields);
    }
</script>
@endsection
