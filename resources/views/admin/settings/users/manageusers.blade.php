@extends('layouts.index')
@section('content')
    <title>Manage Users</title>

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
        <h1>Manage Users</h1>
        <nav>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item active">Farmers Data</li> --}}
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="add-employee mb-3 mt-3">
                        <a href="{{ url('admin/users-add') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i>Add Users
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <select id="showEntries" class="form-select" aria-label="Show Entries">
                                <option value="10">Show 10 Entries</option>
                                <option value="25">Show 25 Entries</option>
                                <option value="50">Show 50 Entries</option>
                                <option value="100">Show 100 Entries</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead class="table-bordered">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Barangay</th>
                                    <th scope="col" class="text-center">Contact Number</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">UserType</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            @if ($user->image)
                                                <img src="data:image/jpeg;base64,{{ $user->image }}"
                                                    class="avatar rounded-circle" alt="Avatar"
                                                    style="width: 50px; height: 50px;">
                                            @endif
                                            {{ $user->name }}
                                        </td>

                                        <td class="text-center">{{ $user->barangay?->barangays ?? 'No Data' }}</< /td>
                                        <td class="text-center">{{ $user->phone_number }}</td>
                                        <td>
                                            @if ($user->status === 'Active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>


                                        <td class="text-center">{{ $user->user_type }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ url('user-view/' . $user->id) }}"
                                                    class="btn btn-sm btn-info view-btn m-1">
                                                    View
                                                </a>

                                                <a href="{{ url('user-edit/' . $user->id) }}"
                                                    class="btn btn-sm btn-primary view-btn m-1">
                                                    Update
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Data Available</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

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
                    </style>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const table = document.getElementById("myTable");
                            const ths = table.querySelectorAll("thead th[data-sortable]");
                            const showEntriesDropdown = document.getElementById("showEntries");
                            const searchInput = document.getElementById("search");

                            // Sorting function
                            ths.forEach((th) => {
                                th.addEventListener("click", () => {
                                    sortTable(table, th.cellIndex);
                                });
                            });

                            function sortTable(table, column) {
                                const rows = Array.from(table.tBodies[0].querySelectorAll("tr"));

                                rows.sort((a, b) => {
                                    const cellA = a.cells[column].textContent.trim();
                                    const cellB = b.cells[column].textContent.trim();
                                    return cellA.localeCompare(cellB, undefined, {
                                        sensitivity: "base"
                                    });
                                });

                                table.tBodies[0].append(...rows);
                            }

                            // Show Entries dropdown change event
                            showEntriesDropdown.addEventListener("change", () => {
                                updateRowCount(table, showEntriesDropdown.value);
                            });

                            function updateRowCount(table, selectedValue) {
                                const rows = Array.from(table.tBodies[0].querySelectorAll("tr"));
                                rows.forEach((row, index) => {
                                    if (index < selectedValue) {
                                        row.style.display = "";
                                    } else {
                                        row.style.display = "none";
                                    }
                                });
                            }

                            // Search input keyup event
                            searchInput.addEventListener("keyup", () => {
                                filterTable();
                            });

                            function filterTable() {
                                const filter = searchInput.value.toUpperCase();
                                const rows = table.tBodies[0].querySelectorAll("tr");

                                rows.forEach((row) => {
                                    const td = row.querySelector("td:first-child");
                                    if (td) {
                                        const textValue = td.textContent.trim().toUpperCase();
                                        if (textValue.includes(filter)) {
                                            row.style.display = "";
                                        } else {
                                            row.style.display = "none";
                                        }
                                    }
                                });
                            }
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
