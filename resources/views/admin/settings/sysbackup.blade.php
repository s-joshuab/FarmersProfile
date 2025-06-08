@extends('layouts.index')
@section('content')

<title>System Backup & Restore</title>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="pagetitle mb-4">
    <h1>Backup & Restore Your Database</h1>
    <p class="text-muted">Keep your important data safe by making a backup. You can also restore your data from a backup if something goes wrong.</p>
</div>

<div class="row justify-content-center">

    <!-- Backup Card -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-primary">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Make a Backup</h5>
            </div>
            <div class="card-body">
                <p>
                    Creating a backup means making a copy of all your data right now.
                    This way, if anything bad happens (like accidental deletion or errors), you can bring everything back to how it was.
                </p>
                <form method="POST" action="{{ route('manual.backup') }}">
                    @csrf
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-cloud-upload-fill me-2"></i> Create Backup
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Restore Card -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-danger">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Restore From Backup</h5>
            </div>
            <div class="card-body">
                <p>
                    Choose a backup file from your computer to replace your current data.
                    <strong>This will erase everything you have now and put back the data from the backup file.</strong>
                </p>
                <p class="text-muted fst-italic small">
                    <i class="bi bi-exclamation-triangle-fill text-warning"></i>
                    Please make sure you have a backup of your current data before restoring, just in case.
                </p>
                <form method="POST" action="{{ route('manual.restore') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="database_file" class="form-label">Select your backup file (.sql)</label>
                        <input type="file" class="form-control" id="database_file" name="database_file" accept=".sql" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-lg">
                            <i class="bi bi-cloud-download-fill me-2"></i> Restore Backup
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<style>
    /* Buttons */
    .btn-lg {
        font-weight: 600;
    }

    /* Card Shadows */
    .card.shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    /* Pagetitle */
    .pagetitle p {
        font-size: 1.1rem;
    }
</style>

@endsection
