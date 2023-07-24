@include('layouts.header')

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="balaoann-logo">
                                <img src="assets/img/balaoann.png" alt="" class="logo-image">
                            </a>
                            <span class="balaoann-text">Municipal Agri. Office</span>
                        </div>


                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.php" class="d-flex align-items-center w-auto">
                                        <img src="assets/img/logo2.png" alt=""
                                            style="height: 100px; width: 100px;">
                                    </a>
                                </div>

                                @if (session()->has('message'))
                                    <div class="alert alert-success text-center">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form class="row g-3" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="bi bi-person-fill"></i> <!-- User Icon -->
                                            </span>
                                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="bi bi-key-fill"></i> <!-- Key Icon -->
                                            </span>
                                            <input type="password" name="password" class="form-control" id="yourPassword" minlength="8" required>
                                            <div class="invalid-feedback">Please enter a password with a minimum of 8 characters!</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                </form>

                                <script>
                                    // JavaScript to add the 'was-validated' class to the form after submission
                                    const form = document.querySelector('.needs-validation');
                                    form.addEventListener('submit', function (event) {
                                        if (!form.checkValidity()) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    });
                                </script>


                            </div>
                        </div>


                        <div class="copyright">
                            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
                        </div>
                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>


</html>
<script>
    const passwordInput = document.getElementById('yourPassword');
    const showPasswordToggle = document.getElementById('showPasswordToggle');

    showPasswordToggle.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
