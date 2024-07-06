<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/webp" href="{{ asset('images/favicon/sankei.webp') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <style>
        /* #layout_auth{
            background: linear-gradient(-135deg, #33d1ae, #8d00df);
        } */
    </style>
</head>

<body class="sb-nav-fixed">
    {{-- <nav class="navbar bg-secondary px-md-5">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <b>QLKH</b>
            </a>
            <div class="d-flex" >
                @if (request()->is('login'))
                    <button type="button" class="btn btn-dark">
                        <a class="text-decoration-none text-light" href="{{ route('register') }}">
                            Register
                        </a>
                    </button>
                @else
                    <button type="button" class="btn btn-dark">
                        <a class="text-decoration-none text-light" href="{{ route('login') }}">
                            Login
                        </a>
                    </button>
                @endif
            </div>
        </div>
    </nav> --}}
    <div id="layout_auth" class="vh-100 d-flex align-items-center justify-content-center">
        @yield('content')
    </div>
    @yield('script')
</body>

</html>
