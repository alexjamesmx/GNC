@extends('template')

@section('content')
    @include('spinner')
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
