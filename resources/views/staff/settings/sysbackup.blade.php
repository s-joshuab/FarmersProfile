@extends('layouts.staffindex')
@section('content')
      <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
        <form method="post" action="backup.php">
            <div class="form-group">
                <label for="backup_date">Backup Date:</label>
                <input type="date" class="form-control" name="backup_date" id="backup_date" required>
            </div>

            <div class="checkbox mt-2">
                <label>
                    <input type="checkbox" name="automatic_backup"> Automatic Backup (Monthly)
                </label>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Perform Backup</button>
        </form>
        </div>
        </div>
      </div>
@endsection
