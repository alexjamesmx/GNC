<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title id="page-title">GNC - Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link href="//db.onlinewebfonts.com/c/115792e2e8292773cdb8dd0ab76459f2?family=Font+Awesome+6+Free+Solid"
        rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <script>
        var base_url = "{{ url('/') }}";

        function message(text) {
            const notification = document.querySelector('.message')
            notification.innerHTML =
                `
    <div id="toast-simple" 
    class="flex items-center p-4 w-full max-w-sm text-gray-500 bg-slate-600 rounded-lg divide-x divide-gray-200 shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">           
        <img id=""
            src="{{ asset('images/check-svgrepo-com.svg') }}"  
            class="filter-green w-5 h-5"
        />
        <div class="pl-4 text-lg font-semibold m-0">
        ${text}
        </div>
    </div>
`
            setTimeout(() => {
                console.log(notification)
                notification.remove()
            }, 4000);
        }
    </script>
    <p class='text max-w-sm'></p>
    @include('admin._modal')
    <div class="container-scroller">
        @yield('content')
    </div>
    <div class="bg-slate-600"></div>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    {{-- <script src="{{ asset('js/vendor.bundle.addons.js') }}"></script> --}}
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
</body>

</html>
