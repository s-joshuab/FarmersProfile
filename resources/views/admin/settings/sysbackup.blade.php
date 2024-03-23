@extends('layouts.index')
@section('content')

<title>System Backup</title>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="pagetitle">
    <h1>Database Backup</h1>
  </div>

<div class="d-flex justify-content-center align-items-center mt-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="card-title">Manual Backup</h2>
                <p>Performing a database backup is the process of creating a copy of your database to ensure that your data is safe and can be restored in case of data loss or system failure. It's an essential part of data management and disaster recovery.</p>
                <form method="POST" action="{{ route('manual.backup') }}">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-backup">
                            Database Backup
                            <i class="bi bi-cloud-upload ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="d-flex justify-content-center align-items-center mt-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="card-title">Database Upload</h2>
                <p>Upload a database file to restore or replace the current database.</p>
                <form method="POST" action="{{ route('database.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="new_database_name">New Database Name:</label>
                        <input type="text" class="form-control" name="new_database_name" id="new_database_name" required>
                    </div>
                    <div class="form-group">
                        <label for="database_file">Choose a database file (SQL only):</label>
                        <input type="file" class="form-control-file" name="database_file" id="database_file" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            Upload Database File and Create New Database
                            <i class="bi bi-cloud-upload ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}



<style>
    /* Style for the Manual Backup button */
    .btn-backup {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
    }

    .btn-backup:hover {
        background-color: #0056b3;
    }

    /* Style for the Automatic Backup button (if uncommented) */
    .btn-schedule-backup {
        background-color: #28a745;
        color: #fff;
        padding: 10px 20px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
    }

    .btn-schedule-backup:hover {
        background-color: #1f8c41;
    }
</style>

@endsection
