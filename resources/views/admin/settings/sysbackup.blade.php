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


<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Manual Backup</h2>
            <form method="POST" action="{{ route('manual.backup') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Perform System Backup</button>
            </form>

        </div>
    </div>

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
    </div>
</div>
@endsection
