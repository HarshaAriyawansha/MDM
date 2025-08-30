<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-3">
    <a class="navbar-brand fw-bold" href="#"> Dashboard</a>
    <div class="ms-auto d-flex align-items-center">
        @auth
    <span class="me-3">Welcome  &nbsp;&nbsp; {{ Auth::user()->name }}</span>
@endauth

        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           Logout
        </a>

        <!-- Hidden logout form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
