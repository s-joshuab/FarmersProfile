<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar Navigation</title>
  <!-- Add your stylesheet and other head elements here -->
  <style>
    /* CSS to handle the background color change on hover and active state */
    .nav-item a.nav-link {
      background-color: transparent;
      color: black;
    }

    .nav-item a.nav-link:hover {
      background-color: white;
    }

    .nav-item a.nav-link.active {
    background-color: lightblue; /* Change to your preferred color */
    color: black;
    font-weight: bold;
  }
  </style>
</head>
<body>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard" href="{{ url('admin/dashboard') }}"
          onclick="setActiveNavItem(this)">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Farmers Data Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/farmreport') }}" onclick="setActiveNavItem(this)">
          <i class="bi bi-person"></i>
          <span>Farmers Data</span>
        </a>
      </li>

      <!-- Reports Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/reports') }}" onclick="setActiveNavItem(this)">
          <i class="bi bi-person"></i>
          <span>Reports</span>
        </a>
      </li>

      <!-- Profile -->
      <li class="nav-heading">Profile</li>

      <!-- Settings Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/profile') }}" class="nav-item nav-link" onclick="setActiveNavItem(this)">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/audit') }}" class="nav-item nav-link" onclick="setActiveNavItem(this)">
              <i class="bi bi-circle"></i><span>Audit Trail</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/manageusers') }}" class="nav-item nav-link" onclick="setActiveNavItem(this)">
              <i class="bi bi-circle"></i><span>Manage Users</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/backup') }}" class="nav-item nav-link" onclick="setActiveNavItem(this)">
              <i class="bi bi-circle"></i><span>System Backup</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Logout Nav -->
      <li class="nav-item">
        <a href="#" onclick="logout()" class="nav-link">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </aside>

  <script>
    function toggleActiveNavItem(navItem) {
      var isActive = navItem.classList.contains("active");
      var navLinks = document.querySelectorAll(".nav-item a.nav-link");

      for (var i = 0; i < navLinks.length; i++) {
        navLinks[i].classList.remove("active");
      }

      if (!isActive) {
        navItem.classList.add("active");
      }
    }

    document.addEventListener("DOMContentLoaded", function () {
      var navLinks = document.querySelectorAll(".sidebar-nav .nav-item .nav-link");

      for (var i = 0; i < navLinks.length; i++) {
        navLinks[i].addEventListener("click", function () {
          toggleActiveNavItem(this);
        });
      }

      // Find the initially active navigation item and apply the "active" class
      var initialActiveNavItem = document.querySelector(".nav-item a.nav-link.active");
      if (initialActiveNavItem) {
        toggleActiveNavItem(initialActiveNavItem);
      }
    });

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
</body>
</html>
