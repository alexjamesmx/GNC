@extends('template.template')

@section('content')
    @include('template.spinner')
    <div id="divLoading" style="opacity:0">
        <!--navbar -->
        @include('template._navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->

            @if ($section !== 'profile')
                @include('template._empresa_general_sidebar')
            @endif

            @if ($section === 'profile')
                @include('template._sidebar_perfil')
            @endif

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Body -->

                    @if ($section === 'profile')
                        @include('profile.edit')
                    @endif

                    @if ($section === 'dashboard')
                        @include('empresa._body_inicio')
                    @endif
                </div>
                @include('template._footer')

            </div>
        </div>
    </div>
@endsection


