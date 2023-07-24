

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard" href="{{ url('staff/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span></i>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('staff/farmreport') }}">
          <i class="bi bi-person"></i>
          <span>Farmers Data</span>
        </a>
      </li><!-- End Farmers Data Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('staff/reports') }}">
          <i class="bi bi-person"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Reports Page Nav -->

      <li class="nav-heading">Profile</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('staff/profile') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
          <li>
            <a href="{{ url('staff/audit') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Audit Trail</span>
            </a>
          </li>
          <li>
            <a href="{{ url('staff/manageusers') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Manage Brgy. Sec.</span>
            </a>
          </li>
          <li>
            <a href="{{ url('staff/backup') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>System Backup</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a href="#" onclick="logout()" class="nav-link">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li>
      <style>
        /* CSS to handle the background color change on hover */
        .nav-item a.nav-link {
          background-color: transparent;
          color: black;
        }

        .nav-item a.nav-link:hover {
          background-color: white;
        }
      </style>

    </ul>
  </aside>

  <script>
    function logout() {
      // Assuming the 'route' function is defined properly.
      // You can replace it with the actual route URL for logout.
      var logoutUrl = "{{ route('logout') }}";

      // Create a form dynamically
      var form = document.createElement("form");
      form.setAttribute("action", logoutUrl);
      form.setAttribute("method", "POST");

      // Add CSRF token to the form for security
      var csrfInput = document.createElement("input");
      csrfInput.setAttribute("type", "hidden");
      csrfInput.setAttribute("name", "_token");
      csrfInput.setAttribute("value", "{{ csrf_token() }}");

      form.appendChild(csrfInput);
      document.body.appendChild(form);

      // Submit the form to perform logout
      form.submit();
    }
  </script>
