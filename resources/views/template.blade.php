<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title id="page-title">GNC</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class='m-0 p-0'>
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script defer async="false">
        document.addEventListener('DOMContentLoaded', (event) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
        var base_url = "{{ url('/') }}";

        function message(text) {
            const notification = document.querySelector('.message')
            notification.innerHTML =
                `
<div id="toast-simple"
    class="flex items-center p-4 w-full max-w-sm text-gray-500 bg-slate-600 rounded-lg divide-x divide-gray-200 shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
    role="alert">
    <img id="" src="{{ asset('images/check-svgrepo-com.svg') }}" class="filter-green w-5 h-5" />
    <div class="pl-4 text-lg font-semibold m-0">
        ${text}
    </div>
</div>
`
            setTimeout(() => {
                console.log(notification)
                notification.innerHTML = ""
                {{ Session::forget('message') }}
            }, 4000);
        }
    </script>
    <div class="message"></div>
    <div class="container-scroller">
        @yield('content')
    </div>
    <script defer src="{{ asset('js/custom.js') }}"></script>
    <script defer src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script defer src="{{ asset('js/off-canvas.js') }}"></script>
    <script defer src="{{ asset('js/misc.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelector('#spinner').style.opacity = 0
            document.querySelector('#divLoading').style.opacity = 1
        })
    </script>

    @if ($role === 'tecnico')
        <div id="data-tecnico" data-data=@json($data)></div>
        <script src="{{ asset('js/tecnico.js') }}"></script>
    @endif
</body>

</html>
