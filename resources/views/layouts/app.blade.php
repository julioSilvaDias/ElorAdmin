<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>{{ config('app.name', 'Laravel') }}</title>

            <!-- Modo Oscuro -->
            <script>
                if (localStorage.dark == 1 || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                    localStorage.dark = 1;
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.dark = 0;
                }
            </script>

            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

            <!-- Scripts -->
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        </head>
        <body class="bg-white dark:bg-gray-900">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white dark:bg-gray-800 shadow-sm">
                    <div class="container">
                        <a class="navbar-brand text-black dark:text-white" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <!-- Modo oscuro toggle -->
                                <li class="nav-item">
                                    <button id="darkModeToggle" class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-black dark:text-white rounded">
                                        🌙 / ☀️
                                    </button>
                                </li>

                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link text-black dark:text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-black dark:text-white" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end dark:bg-gray-700" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item text-black dark:text-white" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="py-4">
                    @yield('content')
                </main>
            </div>

            <script>
                document.getElementById("darkModeToggle").addEventListener("click", function () {
                    if (localStorage.dark == 1) {
                        localStorage.dark = 0;
                        document.documentElement.classList.remove("dark");
                    } else {
                        localStorage.dark = 1;
                        document.documentElement.classList.add("dark");
                    }
                });
            </script>
        </body>
    </html>