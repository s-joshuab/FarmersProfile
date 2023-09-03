@extends('layouts.index')
@section('content')
    @if (session()->has('message'))
        <div id="success-alert" class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div id="error-alert" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <script>
        // Function to hide the alert after a specified number of milliseconds
        function hideAlert(alertId, delay) {
            setTimeout(function() {
                document.getElementById(alertId).style.display = 'none';
            }, delay);
        }

        // Automatically hide success alert after 3 seconds
        if (document.getElementById('success-alert')) {
            hideAlert('success-alert', 3000);
        }

        // Automatically hide error alert after 3 seconds
        if (document.getElementById('error-alert')) {
            hideAlert('error-alert', 3000);
        }
    </script>

    <div class="pagetitle">
        <h1>Farmers Data</h1>
        <nav>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item active">Farmers Data</li> --}}
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                        </div>

                        <div class="row d-flex justify-content-end mt-3">
                            <div class="col-md-2">
                                <select id="barangayFilter" class="form-select" aria-label="Barangay Filter">
                                    <option value="">All Barangays</option>
                                    @foreach ($barangays as $barangay)
                                        <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select id="commoditiesFilter" class="form-select" aria-label="Commodities Filter">
                                    <option value="">All Commodities</option>
                                    @foreach ($commodities as $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->commodities }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select name="statusFilter" id="statusFilter" class="form-select"
                                    aria-label="Status Filter">
                                    <option value="">All Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" id="generatePDFButton" class="btn btn-primary">Generate PDF</button>

                        <div class="table-responsive mt-3">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Commodities</th>
                                        <th scope="col">Farm Size</th>
                                        <th scope="col">Farm Location</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmers as $farmer)
                                        <tr data-barangay="{{ $farmer->barangay->id }}"
                                            data-commodities="{{ implode(',', $farmer->crops->pluck('commodities_id')->toArray()) }}"
                                            data-status="{{ $farmer->status }}">
                                            <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                            <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                            <td>
                                                @php
                                                    $commoditiesList = $farmer->crops
                                                        ->filter(function ($crop) use ($selectedCommodity) {
                                                            return $crop->commodity_id == $selectedCommodity;
                                                        })
                                                        ->map(function ($crop) {
                                                            return $crop->commodity->commodities;
                                                        })
                                                        ->implode('<br>');

                                                    if ($commoditiesList) {
                                                        echo $commoditiesList;
                                                    } else {
                                                        echo 'No Data';
                                                    }
                                                @endphp
                                            </td>
                                            <td></td>
                                            <td></td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        // Function to hide the alert after a specified number of milliseconds
        function hideAlert(alertId, delay) {
            setTimeout(function () {
                document.getElementById(alertId).style.display = 'none';
            }, delay);
        }

        // Automatically hide success alert after 3 seconds
        if (document.getElementById('success-alert')) {
            hideAlert('success-alert', 3000);
        }

        // Automatically hide error alert after 3 seconds
        if (document.getElementById('error-alert')) {
            hideAlert('error-alert', 3000);
        }

        // Function to generate a PDF
        // Function to generate a PDF
// Function to generate a PDF
function generatePDF() {
    const table = document.getElementById('myTable'); // Replace 'myTable' with the ID of your table.

    const doc = new jsPDF();
    doc.text('BALAOANS FARMERS REPORT', 10, 10); // Add the title to the PDF

    // Generate the PDF table from your HTML table
    doc.autoTable({ html: table });

    // Save the PDF with a specified filename
    doc.save('balaoans_farmers_report.pdf');
}


        // Function to filter the table based on selected filters
        function filterTable() {
            var selectedBarangayId = $('#barangayFilter').val();
            var selectedCommodityId = $('#commoditiesFilter').val();
            var selectedStatus = $('#statusFilter').val();
            var searchText = $('#search').val().toLowerCase();

            $('#myTable tbody tr').each(function() {
                var tr = $(this);
                var trBarangayId = tr.data('barangay');
                var trCommodities = tr.data('commodities');
                var trStatus = tr.data('status');
                var trText = tr.text().toLowerCase();

                var showRow = true;

                // Check if selectedBarangayId is not empty and doesn't match the row's barangay
                if (selectedBarangayId !== '' && selectedBarangayId != trBarangayId) {
                    showRow = false;
                }

                // Check if selectedCommodityId is not empty
                if (selectedCommodityId !== '') {
                    var rowCommodities = trCommodities.split(',');
                    if (!rowCommodities.includes(selectedCommodityId)) {
                        showRow = false;
                    }
                }

                // Check if selectedStatus is not empty and doesn't match the row's status
                if (selectedStatus !== '' && selectedStatus != trStatus) {
                    showRow = false;
                }

                // Check if the search text is not empty and doesn't match the row's text
                if (searchText !== '' && !trText.includes(searchText)) {
                    showRow = false;
                }

                // Show or hide the row based on the filtering result
                if (showRow) {
                    tr.show();
                } else {
                    tr.hide();
                }
            });
        }

        // Filter the table when either Barangay, Commodities, Status, or Search changes
        $('#barangayFilter, #commoditiesFilter, #statusFilter, #search').on('change keyup', function() {
            filterTable();
        });

        // Initial filter when the page loads
        filterTable();
    </script>
@endsection
