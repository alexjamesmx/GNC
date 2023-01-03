@extends('template.template')

@section('content')
    @include('template.spinner')
    <div id="divLoading" style="opacity:0">
        <!--navbar -->
        @include('template._navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @include('template._tecnico_test_sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Body -->
                    <div class="inspeccion-test">
                        <div class="row">
                            <div class="col-lg-4">
                                <div id="nav_edificio"class="card hover:bg-amber-100  cursor-pointer"
                                    onclick="edificio({{ $id }})" style="height:75vh; min-width:fit-content">
                                    <div class="card-body grid ">
                                        <p class="text-2xl font-semibold m-0 p-0 text-center capitalize self-center">
                                            Inspección
                                            edificio</p>
                                        <img src="{{ asset('images/gnc/building-news-svgrepo-com.svg') }}" alt=""
                                            class="w-11/12 h-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div id="nav_electrica" onclick="electrica({{ $id }})"
                                    class="card hover:bg-amber-100 cursor-pointer"style="height:75vh; min-width:fit-content">
                                    <div class="card-body grid ">
                                        <p class="text-2xl font-semibold m-0 p-0 text-center capitalize self-center">
                                            Inspección
                                            eléctrica</p>
                                        <img src="{{ asset('images/gnc/electric-signal-svgrepo-com.svg') }}" alt=""
                                            class="w-11/12  h-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div id="nav_transformador" onclick="transformador({{ $id }})"
                                    class="card hover:bg-amber-100 cursor-pointer"style="height:75vh; min-width:fit-content">
                                    <div class="card-body grid ">
                                        <p class="text-2xl font-semibold m-0 p-0 text-center capitalize self-center">
                                            Inspección
                                            transformador</p>
                                        <img src="{{ asset('images/gnc/tesla-coil-svgrepo-com.svg') }}" alt=""
                                            class="w-11/12  h-full">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('template._footer')
            </div>
        </div>
    </div>
    @if (Session::has('message'))
        <script>
            message("{{ Session::get('message') }}");
        </script>
    @endif
@endsection
