@extends('template')



<svg class="animate-spin" style="opacity:1;position: absolute;
top: calc(50% - 24px);
left: calc(50% - 24px);
}"
    id="spinner"width="48px" height="48px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
        d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
        fill="black" />
    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="black" />
</svg>


@section('content')
    <div id="divLoading" style="opacity:0">

        <!--navbar -->
        @include('admin._navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @include('admin._sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Body -->
                    @include('admin._modal_eliminar')
                    @if ($section === 'parques')
                        @include('admin._modal_parques')
                        @include('admin._body_parques')
                    @endif
                    @if ($section === 'dashboard')
                        @include('admin._body_dashboard')
                    @endif
                    @if ($section === 'enterprises')
                        @include('admin._modal_enterprises')
                        @include('admin._body_enterprises')
                    @endif
                    @if ($section === 'subestaciones')
                        @include('admin._modal_subestaciones')
                        @include('admin._body_subestaciones')
                    @endif
                    @if ($section === 'users')
                        @include('admin._modal_users')
                        @include('admin._body_users')
                    @endif
                </div>

                @include('admin._footer')

            </div>
        </div>
    </div>
@endsection
