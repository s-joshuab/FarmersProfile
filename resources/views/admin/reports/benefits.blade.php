@extends('layouts.index')

@section('content')
    <section>
        <h3>Benefits Claimed</h3>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="table-responsive mt-3">

                            <div class="row mb-2 ">
                                <div class="col-md-3">
                                    <label for="barangayFilter">Filter by Barangay:</label>
                                    <select id="barangayFilter" class="form-control"
                                        onchange="updateTableForSelectedBarangay()">
                                        <option value="">All Barangays</option>
                                        <option value="Almeida">Almeida</option>
                                        <option value="Antonino">Antonino</option>
                                        <option value="Apatut">Apatut</option>
                                        <option value="Ar-arampang">Ar-arampang</option>
                                        <option value="Baracbac Este">Baracbac Este</option>
                                        <option value="Baracbac Oeste">Baracbac Oeste</option>
                                        <option value="Bet-ang">Bet-ang</option>
                                        <option value="Bulbulala">Bulbulala</option>
                                        <option value="Bungol">Bungol</option>
                                        <option value="Butubut Este">Butubut Este</option>
                                        <option value="Butubut Norte">Butubut Norte</option>
                                        <option value="Butubut Oeste">Butubut Oeste</option>
                                        <option value="Butubut Sur">Butubut Sur</option>
                                        <option value="Cabuaan">Cabuaan</option>
                                        <option value="Calliat">Calliat</option>
                                        <option value="Calungbuyan">Calungbuyan</option>
                                        <option value="Camiling">Camiling</option>
                                        <option value="Dr. Camilo Osias">Dr. Camilo Osias</option>
                                        <option value="Guinaburan">Guinaburan</option>
                                        <option value="Masupe">Masupe</option>
                                        <option value="Nagsabaran Norte">Nagsabaran Norte</option>
                                        <option value="Nagsabaran Sur">Nagsabaran Sur</option>
                                        <option value="Nalasin">Nalasin</option>
                                        <option value="Napaset">Napaset</option>
                                        <option value="Pa-o">Pa-o</option>
                                        <option value="Pagbennecan">Pagbennecan</option>
                                        <option value="Pagleddegan">Pagleddegan</option>
                                        <option value="Pantar Norte">Pantar Norte</option>
                                        <option value="Pantar Sur">Pantar Sur</option>
                                        <option value="Paraoir">Paraoir</option>
                                        <option value="Patpata">Patpata</option>
                                        <option value="Sablut">Sablut</option>
                                        <option value="San Pablo">San Pablo</option>
                                        <option value="Sinapangan Norte">Sinapangan Norte</option>
                                        <option value="Sinapangan Sur">Sinapangan Sur</option>
                                        <option value="Tallipugo">Tallipugo</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="benefitsFilter">Filter by Benefits Claimed:</label>
                                    <input type="text" id="benefitsFilter" class="form-control">
                                </div>

                                {{-- <div class="col-md-3">
                                <label for="dateFilter">Filter by Date Claimed:</label>
                                <input type="date" id="dateFilter" class="form-control">
                            </div> --}}

                                <!-- Include moment.js -->
                                <!-- Include moment.js -->
                                {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}

                                <div class="col-md-3">
                                    <label for="dateFilterPicker">Filter by Date Claimed:</label>
                                    <input type="date" id="dateFilterPicker" class="form-control">
                                </div>

                            </div>
                            <script>
                                $(document).ready(function() {
                                    // Initialize DataTable
                                    var table = $('#myTable').DataTable({
                                        "order": [
                                            [3, 'desc']
                                        ], // Default sorting by Date Claimed column
                                    });

                                    // Add filtering for Barangays column
                                    $('#barangayFilter').on('change', function() {
                                        var selectedBarangay = $(this).val();
                                        table.column(1).search(selectedBarangay).draw();
                                    });

                                    // Add filtering for Benefits Claimed column
                                    $('#benefitsFilter').on('keyup', function() {
                                        var benefitsClaimed = $(this).val();
                                        table.column(2).search(benefitsClaimed).draw();
                                    });

                                    // Add filtering for Date Claimed column
                                    $('#dateFilterPicker').on('change', function() {
                                        var selectedDate = $(this).val();
                                        filterTableByDate(selectedDate);
                                    });
                                });

                                function updateTableForSelectedBarangay() {
                                    // You can add additional logic here if needed
                                }

                                function filterTableByDate(selectedDate) {
                                    // Loop through each row and show/hide based on the selected date
                                    $('#myTable tbody tr').each(function() {
                                        var rowDate = $(this).find('td:eq(3)').text(); // Assuming Date Claimed is in the 4th column
                                        if (!selectedDate || moment(rowDate, 'MMMM D, YYYY').isSame(selectedDate)) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                }
                            </script>

                            <button id="exportButton" class="btn btn-lg btn-danger clearfix"><span
                                    class="fa fa-file-pdf-o"></span> Export to PDF</button>

                            <table id="myTable" class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Benefits Claimed</th>
                                        <th scope="col">Date Claimed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($benefits as $benefit)
                                        <tr>
                                            <td>{{ optional($benefit->farmersProfile)->fname . ' ' . optional($benefit->farmersProfile)->sname }}
                                            </td>
                                            <td>{{ optional(optional($benefit->farmersProfile)->barangay)->barangays ?? '' }}
                                            </td>
                                            <td>{{ $benefit->benefits }}</td>
                                            <td>{{ \Carbon\Carbon::parse($benefit->date)->format('F j, Y') }}</td>
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

    <style>
        .status-circle {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .active {
            background-color: green;
        }

        .inactive {
            background-color: red;
        }

        .dataTables_length {
            margin-bottom: 20px;
            /* Adjust the margin as needed */
        }

        /* Style the table */
        #myTable {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        #myTable th,
        #myTable td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        #myTable th {
            background-color: #f2f2f2;
        }

        /* Style the table header */
        #myTable thead {
            font-weight: bold;
        }

        /* Style the "Add Farmer" button */
        .add-employee a.btn {
            background-color: #007bff;
            color: #fff;
        }

        .add-employee a.btn:hover {
            background-color: #0056b3;
        }

        /* Style the action buttons */
        .btn-group .btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
        }

        /* Style the status badges */
        .badge.bg-success {
            background-color: #28a745;
        }

        .badge.bg-danger {
            background-color: #dc3545;
        }
    </style>


    {{-- <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script> --}}
    <script type="text/javascript">
        jQuery(function($) {
            $("#exportButton").click(function() {
                // parse the HTML table element having an id=myTable
                var dataSource = new shield.DataSource.create({
                    data: "#myTable",
                    schema: {
                        type: "table",
                        fields: {
                            "Name": {
                                type: String
                            },
                            "Barangay": {
                                type: String
                            },
                            "Benefits Claimed": {
                                type: String
                            },
                            "Date Claimed": {
                                type: String
                            }
                        }
                    }
                });

                // when parsing is done, export the data to PDF
                dataSource.read().then(function(data) {
                    var pdf = new shield.exp.PDFDocument({
                        author: "Benefits Reports",
                        created: new Date()
                    });

                    pdf.addPage("a4", "portrait");

                    pdf.table(
                        50,
                        50,
                        data,
                        [{
                                field: "Name",
                                title: "Person Name",
                                width: 200
                            },
                            {
                                field: "Barangay",
                                title: "Barangay",
                                width: 100
                            },
                            {
                                field: "Benefits Claimed",
                                title: "Benefits Claimed",
                                width: 100
                            },
                            {
                                field: "Date Claimed",
                                title: "Date Claimed",
                                width: 100
                            }
                        ], {
                            margins: {
                                top: 50,
                                left: 50
                            }
                        }
                    );

                    pdf.saveAs({
                        fileName: "Benefits Reports"
                    });
                });
            });
        });
    </script>
@endsection
