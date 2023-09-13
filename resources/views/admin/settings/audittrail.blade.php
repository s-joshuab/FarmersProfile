@extends('layouts.index')
@section('content')
<title>Audit Trail</title>

<style>
    /* Custom styles for the table */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f7f7f7; /* Light gray background for odd rows */
    }

    .table-bordered th, .table-bordered td {
        border-color: #dee2e6; /* Gray border color */
    }

    .table-bordered th {
        background-color: #f8f9fa; /* Light blue-gray background for table headers */
    }
</style>

<div class="container-fluid">
    <h1 class="my-4">Audit Trail</h1>

    <div class="form-group col-sm-4">
        <label for="date_filter">Select Date Range:</label>
        <select class="form-control" id="date_filter" name="date_filter">
            <option value="all">All</option>
            <option value="today">Today</option>
            <option value="yesterday">Yesterday</option>
            <option value="last_week">Last Week</option>
        </select>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table datatable table-bordered table-striped" id="auditTrailTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date and Time</th>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->created_at }}</td>
                            <td>{{ $activity->causer ? $activity->causer->name : 'No Data' }}</td>
                            <td>
                                {{ $activity->causer && $activity->causer->user_type ? $activity->causer->user_type : 'No Data' }}
                            </td>
                            <td>{{ ucwords($activity->description) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to filter the table based on the selected date filter
    function filterTable(selectedValue) {
        var table = document.getElementById('auditTrailTable').getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var dateCell = row.getElementsByTagName('td')[0];
            var date = dateCell.textContent || dateCell.innerText;
            var showRow = false;

            if (selectedValue === 'all' || selectedValue === 'All') {
                showRow = true; // Show all rows when "All" is selected
            } else if (date.includes(selectedValue)) {
                showRow = true; // Show rows matching the selected date filter
            }

            row.style.display = showRow ? '' : 'none';
        }
    }

    // Initial filter when the page loads
    filterTable(document.getElementById('date_filter').value);

    // Filter the table when the user selects a date range
    document.getElementById('date_filter').addEventListener('change', function() {
        var selectedValue = this.value;
        filterTable(selectedValue);
    });
</script>




@endsection
