@include('layouts.header')


<body style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover;
background-position: center;
background-repeat: no-repeat;
">
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center py-4">
                                    <a href="#" class="balaoann-logo">
                                        <img src="{{ asset('assets/img/balaoan-5.webp') }}" alt="Balaoan Image"
                                            class="logo-image" style="height: 80px; width: 80px;">
                                    </a>
                                    <span class="balaoann-text">Municipal Agriculturist Office</span>
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

                                <form class="row g-3 needs-validation" action="{{ route('login') }}" method="post"
                                    novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="bi bi-person-fill"></i> <!-- User Icon -->
                                            </span>
                                            <input type="email" name="email" class="form-control" id="yourEmail"
                                                required>
                                            <div class="invalid-feedback">Please enter your Email.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div class="input-group password-input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="bi bi-key-fill"></i> <!-- Key Icon -->
                                            </span>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <button class="password-toggle" type="button" id="showPasswordButton">
                                                <i class="bi bi-eye"></i> <!-- Eye Icon -->
                                            </button>
                                            <div class="invalid-feedback">Please enter a password!</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="acceptTerms"
                                                name="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">
                                                I accept the <a href="#" id="openTermsModal">terms and
                                                    conditions</a>
                                            </label>
                                            <div class="invalid-feedback">You must accept the Terms and Conditions.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ url('forgot-password') }}">Forgot Password?</a>
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="copyright">
                            &copy; Copyright <strong><span>Balaoan, La Union</span></strong>. All Rights Reserved
                        </div>
                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
</body>
<!-- Modal for Terms and Conditions -->
<!-- Modal for Terms and Conditions -->
<div class="modal" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <!-- Place your terms and conditions content here -->
                <p>Kunware Meron MUna</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- JavaScript to open the modal -->
<script>
    document.getElementById("openTermsModal").addEventListener("click", function(e) {
        e.preventDefault();
        $('#termsModal').modal('show'); // Show the modal
    });
</script>


<style>
    .password-input-group {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        background: none;
        border: none;
    }
</style>
<script>
    const passwordInput = document.getElementById("yourPassword");
    const showPasswordButton = document.getElementById("showPasswordButton");

    showPasswordButton.addEventListener("click", () => {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordButton.innerHTML = '<i class="bi bi-eye-slash"></i>'; // Change button icon
        } else {
            passwordInput.type = "password";
            showPasswordButton.innerHTML = '<i class="bi bi-eye"></i>'; // Change button icon
        }
    });
</script>
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
