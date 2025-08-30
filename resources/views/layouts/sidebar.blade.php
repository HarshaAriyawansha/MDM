
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
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ url('dashboard')}}" class="nav-link text-white d-flex align-items-center">
                <i class="fa-solid fa-desktop fa-lg"></i> 
                <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
            </a>
        </li>

        @can('view user')
        <li class="nav-item mb-2">
            <a href="{{ url('permissions')}}" class="nav-link text-white d-flex align-items-center">
                <i class="fa-solid fa-user fa-lg"></i>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;Users</span>
            </a>
        </li>
        @endcan

        @can('view brand')
        <li class="nav-item mb-2">
            <a href="{{ url('brands')}}" class="nav-link text-white d-flex align-items-center">
                <i class="fa-solid fa-list fa-lg"></i>
                <span>&nbsp;&nbsp;&nbsp;Brand</span>
            </a>
        </li>
        @endcan

        @can('view category')
        <li class="nav-item mb-2">
            <a href="{{ url('categories')}}" class="nav-link text-white d-flex align-items-center">
                <i class="fa-solid fa-layer-group fa-lg"></i>
                <span>&nbsp;&nbsp;&nbsp;Category</span>
            </a>
        </li>
        @endcan

        @can('view item')
        <li class="nav-item mb-2">
            <a href="{{ url('items')}}" class="nav-link text-white d-flex align-items-center">
                <i class="fas fa-users me-2 fa-lg"></i> 
                <span>&nbsp;&nbsp;Item</span>
            </a>
        </li>
        @endcan
    </ul>
</div>


  <script>
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('shrink');
    });
  </script>
