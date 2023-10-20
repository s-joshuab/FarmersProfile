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

        <div class="card">
            <div class="card-body">
                <form action="{{ route('audit') }}" method="GET" class="container">
                    <label for="date_filter">Filter by Date:</label>
                    <select name="date_filter" id="date_filter">
                        <option value="all">All</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="this_week">This Week</option>
                        <option value="this_month">This Month</option>
                    </select>
                </form>
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
            var now = new Date(); // Current date

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var dateCell = row.getElementsByTagName('td')[0];
                var date = new Date(dateCell.textContent);

                if (selectedValue === 'all') {
                    row.style.display = ''; // Show all rows when "All" is selected
                } else {
                    var showRow = false;

                    if (selectedValue === 'today' && isSameDate(now, date)) {
                        showRow = true;
                    } else if (selectedValue === 'yesterday' && isYesterday(now, date)) {
                        showRow = true;
                    } else if (selectedValue === 'this_week' && isThisWeek(now, date)) {
                        showRow = true;
                    } else if (selectedValue === 'this_month' && isThisMonth(now, date)) {
                        showRow = true;
                    }

                    row.style.display = showRow ? '' : 'none';
                }
            }
        }

        // Check if two dates are on the same day
        function isSameDate(date1, date2) {
            return date1.toDateString() === date2.toDateString();
        }

        // Check if date1 is one day before date2
        function isYesterday(date1, date2) {
            var yesterday = new Date(date2);
            yesterday.setDate(yesterday.getDate() - 1);
            return date1.toDateString() === yesterday.toDateString();
        }

        // Check if date1 is in the same week as date2
        function isThisWeek(date1, date2) {
            var oneDay = 24 * 60 * 60 * 1000; // One day in milliseconds
            var diffDays = Math.round(Math.abs((date1 - date2) / oneDay));
            return diffDays <= date1.getDay();
        }

        // Check if date1 is in the same month as date2
        function isThisMonth(date1, date2) {
            return date1.getMonth() === date2.getMonth() && date1.getFullYear() === date2.getFullYear();
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
