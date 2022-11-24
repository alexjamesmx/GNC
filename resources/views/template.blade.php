<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GNC - Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link href="//db.onlinewebfonts.com/c/115792e2e8292773cdb8dd0ab76459f2?family=Font+Awesome+6+Free+Solid"
        rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('admin._modal')
    <div class="container-scroller">


        @yield('content')



    </div>



    <script>
        var base_url = "{{ url('/') }}";
    </script>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    {{-- <script src="{{ asset('js/vendor.bundle.addons.js') }}"></script> --}}
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
</body>

</html>
