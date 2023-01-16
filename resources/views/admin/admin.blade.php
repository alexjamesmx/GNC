@extends('template.template')

@section('content')
    @include('template.spinner')
    <div id="divLoading" style="opacity:0">

        <!--navbar -->
        @include('template._navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @if ($section !== 'profile')
                @include('admin._sidebar_admin')
            @endif
            {{-- SI LA SECCION ES PERFIL USAMOS OTRO SIDEBAR --}}
            @if ($section === 'profile')
                @include('template._sidebar_perfil')
            @endif
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
                    @if ($section === 'inspecciones')
                        @include('admin._modal_inspecciones')
                        @include('admin._body_inspecciones')
                        @include('admin._modal_inspecciones_detalle')
                    @endif
                    @if ($section === 'verificar')
                        @include('admin._body_verificar')
                    @endif
                    @if ($section === 'profile')
                        @include('profile.edit')
                    @endif
                    @if ($section === 'calendario')
                        @include('admin._body_calendario')
                    @endif
                </div>

                @include('template._footer')

            </div>
        </div>
    </div>
@endsection
