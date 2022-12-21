@extends('template')


@section('content')
    @include('spinner')
    <div id="divLoading" style="opacity:0">
        <!--navbar -->
        @include('tecnico._navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav mt-3">
                    <li class="nav-item nav-profile flex justify-center m-0 mb-4">
                        <a href="#" class="nav-link relative w-[95%]">
                            <div class="profile-image">

                                <img class="img-xs rounded-circle object-cover"
                                    src="{{ Auth::user()->image ? asset('images/profile/1670282071.jpg') : asset('images/worker-svgrepo-com.svg') }}"
                                    alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="w-full py-3">
                                <p class="break-words whitespace-normal m-0 text-white  font-bold">
                                    {{ Auth::user()->name }} </p>
                                <p class="designation p-0 !mt-2">{{ $role_cute }}</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item nav-category">En inspección</li>
                    {{-- <li id="nav_dashboard"class="nav-item">
                        <a class="nav-link" href="{{ route('tecnico') }}">
                            <i class="menu-icon typcn typcn-document-text"></i>
                            <span class="menu-title">Salir de la inspección</span>
                        </a>
                    </li> --}}

                    <li id="nav_dashboard"class="nav-item">
                        <a class="flex justify-start mt-2 px-4 py-3 rounded nav-custom" href="{{ route('tecnico') }}">
                            <i class="fas fa-arrow-alt-circle-left text-white ml-12 self-center"></i>
                            <span class="menu-title text-white ml-5 text-lg">Salir de la inspección</span>
                        </a>
                    </li>
                </ul>
            </nav>

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
                @include('admin._footer')
            </div>
        </div>
    </div>

    @if (Session::has('message'))
        <script>
            message("{{ Session::get('message') }}");
        </script>
    @endif
@endsection
