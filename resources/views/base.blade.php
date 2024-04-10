<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>App</title>

    {{-- <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    @yield('style')

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <style>
        .required:after {
            content: "*";
            position: relative;
            font-size: inherit;
            color: var(--bs-danger);
            padding-left: 0.25rem;
            font-weight: 600;
        }
    </style>
    @yield('body')



    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/parsley.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('app-js/modules.js') }}"></script>
    @stack('js')

    <script src="{{ asset('assets/js/script.js') }}"></script>





</body>

</html>
