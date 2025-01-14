<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('GenQR.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
</head>
<body class="bg-gray-100">
<div id="app">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <button class="block text-gray-800 focus:outline-none md:hidden" id="navbar-toggler">
                    <span class="material-icons">menu</span>
                </button>

                <div class="hidden md:flex items-center">
                    <!-- Left Side Of Navbar -->
                    <ul class="flex space-x-4">
                        <!-- Your navigation links here -->
                    </ul>
                </div>

                <div class="flex items-center">
                    <!-- Authentication Links -->
                    @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-700 px-3 py-2">{{ __('Đăng nhập') }}</a>
                            @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-800 hover:text-gray-700 px-3 py-2">{{ __('Đăng ký') }}</a>
                        @endif
                    @else
                        <div class="relative">
                            <button class="relative z-10 block rounded-md bg-white px-3 py-2 text-gray-800 focus:outline-none">
                                {{ Auth::user()->name }}
                                <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>
</div>

<script>
    document.getElementById('navbar-toggler').addEventListener('click', function () {
        var menu = document.querySelector('.md\\:flex');
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
