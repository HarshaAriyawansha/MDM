@php
    $currentRoute = request()->segment(1); // detects 'roles', 'permissions', 'users'
@endphp

<nav class="navbar navbar-light bg-light">
    <div class="container d-flex justify-content-center">
        <div class="d-flex gap-3"> <!-- gap-3 adds equal spacing between buttons -->
            <a href="{{ url('roles') }}" 
               class="btn btn-outline-secondary rounded {{ $currentRoute == 'roles' ? 'btn-primary text-white' : '' }}">
                Roles
            </a>
            <a href="{{ url('permissions') }}" 
               class="btn btn-outline-secondary rounded {{ $currentRoute == 'permissions' ? 'btn-primary text-white' : '' }}">
                Permissions
            </a>
            <a href="{{ url('users') }}" 
               class="btn btn-outline-secondary rounded {{ $currentRoute == 'users' ? 'btn-primary text-white' : '' }}">
                Users
            </a>
        </div>
    </div>
</nav>

<style>
    /* Hover effect */
    .btn-outline-secondary:hover {
        background-color: #0d6efd; /* Bootstrap primary color */
        color: white;
        border-color: #0d6efd;
    }

    /* Smooth transition */
    .btn {
        transition: all 0.3s ease;
    }
</style>
