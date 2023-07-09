
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard" href="{{ url('admin/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span></i>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/farmreport') }}">
          <i class="bi bi-person"></i>
          <span>Farmers Data</span>
        </a>
      </li><!-- End Farmers Data Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/reports') }}">
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
            <a href="{{ url('admin/profile') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/audit') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Audit Trail</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/manageusers') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Manage Users</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/backup') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>System Backup</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../auth/logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
    </li>
    <!-- End Login Page Nav -->

    </ul>

    </aside>
