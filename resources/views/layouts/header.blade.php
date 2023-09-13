<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="../../assets/img/balaoan-5.webp" rel="icon">
    <link href="../../assets/img/balaoan-5.webp" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Alphine -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Template Main CSS File -->
<link href="../../assets/css/style.css" rel="stylesheet">

@livewireStyles
  </head>

  <div class="preloader"></div>

<script>
    // Optional: You can add JavaScript to hide the preloader when the page finishes loading
    window.addEventListener('load', function () {
        document.querySelector('.preloader').style.display = 'none';
    });
</script>

<style>
    /* Preloader styles */
.preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff; /* Change the background color as needed */
    z-index: 9999;
}

/* Preloader animation */
.preloader::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    border: 5px solid #ccc; /* Change the border color as needed */
    border-top-color: #000; /* Change the top border color as needed */
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Animation keyframes */
@keyframes spin {
    0% {
        transform: translate(-50%, -50%) rotate(0);
    }

    100% {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

</style>
