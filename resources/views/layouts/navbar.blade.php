
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('admin/dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/12345.jpg')}}" alt="" style="border-radius: 50%;">
            <span class="d-none d-lg-block" style="color: white; text-decoration: none;">MAO</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block mt-2" style="margin-right: 10px;">
                    @if (Auth::check())
                        <h6>{{ Auth::user()->name }}</h6>
                    @endif
                </span>
                <img src="{{ Auth::user()->profileImage ? asset(Auth::user()->profileImage->image_url) : asset('assets/img/profile-img.jpg') }}"
     alt="Profile" class="rounded-circle" style="width: 50px; height: 50px; border-radius: 50%;">

            </a>
            <!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                @if (Auth::check())
                <h6>{{ Auth::user()->name }}</h6>
            @endif
            @if (Auth::check())
            <span>{{ Auth::user()->username }}</span>
        @endif
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

    </header>
