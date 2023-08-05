<form id="dataForm" method="POST" action="{{ url('save-data') }}">
    @csrf <!-- Laravel CSRF token -->
    <div class="form-group">
        <label for="province">Province:</label>
        <select id="province" name="province_id" class="form-control">
            <option value="">Select Province</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->provinces }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="municipality">Municipality:</label>
        <select id="municipality" name="municipality_id" class="form-control">
            <option value="">Select Municipality</option>
        </select>
    </div>

    <div class="form-group">
        <label for="barangay">Barangay:</label>
        <select id="barangay" name="barangay_id" class="form-control">
            <option value="">Select Barangay</option>
        </select>
    </div>

    <button type="submit" class="btn btn-sm btn-success">Submit</button>
</form>






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
