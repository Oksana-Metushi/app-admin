<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ url('public/backend/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.layouts.sidebar')

        @yield('content')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="{{ url('public/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ url('public/backend/dist/js/adminlte.js') }}"></script>

@yield('script')
</body>
</html>
