@extends('template.template')

@section('content')
    @include('template.spinner')
    <div id="divLoading" style="opacity:0">
        <!--navbar -->
        @include('template._navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @include('template._tecnico_inspecciones_sidebar')
            <div class="main-panel">
                <div class="content-wrapper ">


                    @yield('test_body')

                    @include('template._tecnico_inspecciones_template_anomalias')
                    @include('template._footer')
                </div>
            </div>
        </div>
    </div>
