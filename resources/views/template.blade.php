<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GNC - Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-scroller">


        @yield('content')



    </div>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    {{-- <script src="{{ asset('js/vendor.bundle.addons.js') }}"></script> --}}
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
</body>

</html>
