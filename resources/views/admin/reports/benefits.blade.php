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

                                   <div class="col-md-3">
                                    <label for="dateFilterPicker">Filter by Date Claimed:</label>
                                    <input type="date" id="dateFilterPicker" class="form-control">
                                </div>

                            </div>
                            <script>
                                $(document).ready(function() {
                                    // Initialize DataTable
                                    var table = $('#benefitsTable').DataTable({
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
                                    $('#benefitsTable tbody tr').each(function() {
                                        var rowDate = $(this).find('td:eq(3)').text(); // Assuming Date Claimed is in the 4th column
                                        if (!selectedDate || moment(rowDate, 'MMMM D, YYYY').isSame(selectedDate)) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                }
                            </script>


                           <button onclick="exportToExcel()" class="btn btn-success" style="margin-bottom: 10px;">Export to Excel</button>

                            <table id="benefitsTable" class="ttable-bordered table-striped">
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
        #benefitsTable {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        #benefitsTable th,
        #benefitsTable td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        #benefitsTable th {
            background-color: #f2f2f2;
        }

        /* Style the table header */
        #benefitsTable thead {
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>



<script>
    function exportToExcel() {
        var table = document.getElementById("benefitsTable");
        var ws = XLSX.utils.table_to_sheet(table);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Benefits");
        var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });
        saveAs(new Blob([s2ab(wbout)], { type: "application/octet-stream" }), 'benefits.xlsx');
    }


    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }

</script>
@endsection
