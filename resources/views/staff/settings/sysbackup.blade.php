@extends('layouts.staffindex')
@section('content')
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
    <h1>System Backup</h1>
    <nav>
      <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item active">Farmers Data</li> --}}
      </ol>
    </nav>
  </div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Manual Backup</h2>
            <form method="post" action="#">

                @csrf
                <button type="submit" class="btn btn-primary">Perform Manual Backup</button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h2 class="card-title">Automatic Backup (Monthly)</h2>
            <form method="post" action="automatic_backup.php">
                <div class="form-group">
                    <label for="automatic_backup_date">Backup Date:</label>
                    <input type="date" class="form-control" name="automatic_backup_date" id="automatic_backup_date" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Schedule Automatic Backup</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
