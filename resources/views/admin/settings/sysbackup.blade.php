@extends('layouts.index')
@section('content')

<!-- Font Awesome -->

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

<div class="d-flex justify-content-center align-items-center mt-4">
<div class="col-lg-6">
    <div class="card">
        <div class="card-body text-center">
            <h2 class="card-title">Manual Backup</h2>
            <form method="POST" action="{{ route('manual.backup') }}">
                @csrf
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        Perform System Backup
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download ml-2" viewBox="0 0 16 16">
                            <path d="M8 1a.5.5 0 0 1 .5.5v9.793l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 11.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M0 13.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5A.5.5 0 0 1 0 15.5H16a.5.5 0 0 1 .5.5a.5.5 0 0 1-.5.5H0a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>



    </div>
{{--
    <div class="card mt-4">
        <div class="card-body">
            <h2 class="card-title">Automatic Backup (Monthly)</h2>
            <form method="post" action="{{ route('schedule-automatic-backup') }}">
                @csrf
                <div class="form-group">
                    <label for="automatic_backup_date">Backup Date:</label>
                    <input type="date" class="form-control" name="automatic_backup_date" id="automatic_backup_date" required>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Schedule Automatic Backup</button>
                </div>
            </form>
        </div>
    </div> --}}
</div>
</div>
@endsection
