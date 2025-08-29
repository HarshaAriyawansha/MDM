<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body class="d-flex">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    <div class="flex-grow-1 d-flex flex-column">

        {{-- Header --}}
        @include('layouts.header')

        {{-- Breadcrumb --}}
        @include('layouts.breadcrumb')

        {{-- Page Content --}}
        <main class="p-3">
            @yield('content')
        </main>

    </div>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
