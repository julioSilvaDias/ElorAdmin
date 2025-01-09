<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard - Admin Panel')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/EEM-Logo-vertical.png') }}" type="image/svg">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md"
            style="background-color: #f8f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.svg') }}" height="40" class="me-2">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <aside class="col-md-2 bg-light d-flex flex-column align-items-start py-3 border-end">
                    <h6 class="px-3 mb-3 text-uppercase">Settings</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item w-100">
                            <a class="nav-link text-dark ps-3 py-2" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link text-dark ps-3 py-2" href="#">Users</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link text-dark ps-3 py-2" href="#">Roles</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link text-dark ps-3 py-2" href="#">Permissions</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link text-dark ps-3 py-2" href="#">Reports</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link text-dark ps-3 py-2" href="#">Settings</a>
                        </li>
                    </ul>
                </aside>

                <!-- Main Content -->
                <main class="col-md-10 py-4">
                    <div class="container">
                        <h1 class="mb-4">@yield('page-title', 'Dashboard')</h1>
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>