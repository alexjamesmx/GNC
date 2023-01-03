<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title id="page-title">GNC</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    @if ($role === 'tecnico')
        {{-- <link rel="stylesheet" href="{{ asset('resources/tecnico.css') }}"> --}}
    @endif
    @if ($role === 'tecnico' && $section === 'test')
        <link rel="stylesheet" href="{{ asset('css/inspecciones_cards.css') }}">
        <link rel="stylesheet" href="{{ asset('css/inspecciones_popup.css') }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class='m-0 p-0'>
    <script src="{{ asset('js/template/jquery-3.6.1.min.js') }}"></script>
    <script defer async="false">
        var base_url = "{{ url('/') }}";

        function message(text) {
            const notification = document.querySelector('.message')
            notification.innerHTML =
                `<div id="toast-simple"class="flex items-center p-4 w-full max-w-sm text-gray-500 bg-slate-600 rounded-lg divide-x divide-gray-200 shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"role="alert"><img id="" src="{{ asset('images/check-svgrepo-com.svg') }}" class="filter-green w-5 h-5" /><div class="pl-4 text-lg font-semibold m-0">${text}</div></div>`

            setTimeout(() => {
                console.log(notification)
                notification.innerHTML = ""
                {{ Session::forget('message') }}
            }, 4000);
        }
    </script>
    <div class="message"></div>

    {{-- CONTENIDO --}}
    <div class="container-scroller">
        @yield('content')
    </div>

    <script defer src="{{ asset('js/template/custom.js') }}"></script>
    <script defer src="{{ asset('js/template/vendor.bundle.base.js') }}"></script>
    <script defer src="{{ asset('js/template/off-canvas.js') }}"></script>
    <script defer src="{{ asset('js/template/misc.js') }}"></script>

    @include('scripts.tecnico')

    @include('scripts.admin')


</body>

</html>
