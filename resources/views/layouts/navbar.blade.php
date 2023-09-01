
<header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #0d6efd;">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('admin/dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/12345.jpg')}}" alt="" style="border-radius: 50%;">
            <span class="d-none d-lg-block" style="color: black; text-decoration: none;">MAO</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

            <div class="nav-profile d-flex align-items-center pe-0">
                <span class="d-none d-md-block mt-2" style="margin-right: 10px; color: black; font-weight: bold;">
                    @if (Auth::check())
                        <h6>{{ Auth::user()->name }}</h6>
                    @endif
                </span>
                @if ($user->image)
                <img src="data:image/jpeg;base64,{{ base64_encode($user->image) }}" alt="Profile Image">
            @else
                <img src="{{ asset('assets/img/default-profile.jpg') }}" alt="Default Profile Image">
            @endif

            </div>


        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

    </header>
<style>
    .nav-profile:hover span {
    background-color: #0d6efd;
}

</style>

