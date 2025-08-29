
  <style>
    .sidebar {
      transition: all 0.3s;
      width: 240px;
    }
    .sidebar.shrink {
      width: 70px;
    }
    .sidebar .nav-link span {
      transition: opacity 0.3s;
    }
    .sidebar.shrink .nav-link span {
      opacity: 0;
      visibility: hidden;
    }
  </style>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar bg-dark text-white vh-100 p-3 d-flex flex-column">
    <button id="toggleBtn" class="btn btn-sm btn-light mb-3">
      <i class="fas fa-bars"></i>
    </button>

    <h5 class="mb-4 d-none d-md-block">Admin Panel</h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a href="#" class="nav-link text-white d-flex align-items-center">
          <i class="fas fa-tachometer-alt me-2"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="{{ url('permissions')}}" class="nav-link text-white d-flex align-items-center">
          <i class="fas fa-calendar-check me-2"></i> <span>Permission</span>
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="{{ url('roles')}}" class="nav-link text-white d-flex align-items-center">
          <i class="fas fa-car me-2"></i> <span>Roles</span>
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link text-white d-flex align-items-center">
          <i class="fas fa-users me-2"></i> <span>Customers</span>
        </a>
      </li>
    </ul>
  </div>


  <script>
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('shrink');
    });
  </script>
