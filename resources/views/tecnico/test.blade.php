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
                                <div
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
                                <div
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
