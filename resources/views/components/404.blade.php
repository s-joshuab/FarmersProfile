@include('layouts.header')
<style>
    body {
        background-color: #f8f9fa;
    }

    .error-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        text-align: center;
    }

    .error-container h1 {
        font-size: 8rem;
        color: #dc3545;
        margin-bottom: 0;
    }

    .error-container p {
        font-size: 1.5rem;
        margin-top: 0;
    }

    .error-container a {
        margin-top: 20px;
    }
</style>

<div class="error-container">
    <h1>404</h1>
    <p>Page Not Found</p>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
</div>
