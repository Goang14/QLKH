<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/webp" href="{{ asset('images/favicon/sankei.webp') }}">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</head>

<body class="sb-nav-fixed">
    @include('layouts.header')
    <div id="layoutSidenav">
        @include('layouts.menu')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid p-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    {{-- toast --}}
    <div class="toast"
        style="position: absolute; top: 60px; right: 6px;"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        data-bs-animation="true",
        data-bs-autohide="true",
        data-bs-delay="1000"
    >
        <div class="alert alert-success toast-body mb-0">
            Thành công
        </div>
    </div>

    {{-- script --}}
    {{-- <script>
        const globalRouter = {
            loadDataMaster: "{{ route('data.loadDataMaster') }}",
            task: "{{ route('task.show') }}",
            statisticalGetById: function(idUser) {
                return "{{ route('statistical.statisticalByUser', ':id') }}".replace(':id', idUser);
            },
        };
        const clientRoute = {
            search: "{{ route('client.searchCustomer') }}",
            store: "{{ route('client.store') }}",
            getById: function(id) {
                return "{{ route('client.edit', ':id') }}".replace(':id', id);
            },
            update: function(id) {
                return "{{ route('client.custom_update', ':id') }}".replace(':id', id);
            },
            delete: function(id) {
                return "{{ route('client.destroy', ':id') }}".replace(':id', id);
            },
        };
        const projectRoute = {
            update: function(id) {
                return "{{ route('project.updateProject', ':id') }}".replace(':id', id);
            }
        };
        const clientLangText = {
            delete: "{{ __('business_customer.inform_delete') }}",
            edit: "{{ __('business_customer.inform_edit') }}",
        };
        const userRoute = {
            search: "{{ route('user.searchUser') }}",
            store: "{{ route('user.store') }}",
            getById: function(id) {
                return "{{ route('user.edit', ':id') }}".replace(':id', id);
            },
            update: function(id) {
                return "{{ route('user.custom_update', ':id') }}".replace(':id', id);
            },
            delete: function(id) {
                return "{{ route('user.destroy', ':id') }}".replace(':id', id);
            },
        };
        const userLangText = {
            delete: "{{ __('user.inform_delete') }}",
            detail: "{{ __('user.detail') }}",
            statistical: "{{ __('user.statistical') }}",
        };
    </script> --}}
    @yield('script')
</body>

</html>
