@extends('template')

@section('content')
    <!--navbar -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="../../index.html">
                <img src="{{ asset('images/logo_gnc.png') }}" alt="logo" /> </a>
            <a class="navbar-brand brand-logo-mini" href="../../index.html">
                <img src="{{ asset('images/logo-mini.svg') }}" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block">Dashboard</li>
                <li class="nav-item drWopdown language-dropdown">
                    <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#"
                        data-toggle="dropdown" aria-expanded="false">
                        <div class="d-inline-flex mr-0 mr-md-3">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                        </div>
                        <span class="profile-text font-weight-medium d-none d-md-block">English</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                        <a class="dropdown-item">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>English
                        </a>
                        <a class="dropdown-item">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-fr"></i>
                            </div>French
                        </a>
                        <a class="dropdown-item">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-ae"></i>
                            </div>Arabic
                        </a>
                        <a class="dropdown-item">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-ru"></i>
                            </div>Russian
                        </a>
                    </div>
                </li>
            </ul>
            {{-- <form class="ml-auto search-form d-none d-md-block" action="#">
                <div class="form-group">
                    <input type="search" class="form-control" placeholder="Search Here">
                </div>
            </form> --}}
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count bg-success">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                        aria-labelledby="notificationDropdown">
                        <a class="dropdown-item py-3 border-bottom">
                            <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                            <span class="badge badge-pill badge-primary float-right">View all</span>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-alert m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error
                                </h6>
                                <p class="font-weight-light small-text mb-0"> Just now </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-settings m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                                <p class="font-weight-light small-text mb-0"> Private message </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-airballoon m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration
                                </h6>
                                <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="{{ asset('images/faces/face8.jpg') }}"
                                alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">

                            </p>
                            <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
                        </div>
                        <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger">1</span><i
                                class="dropdown-item-icon ti-dashboard"></i></a>
                        <a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
                        <a class="dropdown-item">Activity<i class="dropdown-item-icon ti-location-arrow"></i></a>
                        <a class="dropdown-item">FAQ<i class="dropdown-item-icon ti-help-alt"></i></a>
                        <a class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- navbar -->
    <div class="container-fluid page-body-wrapper">
        <!-- sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav tw-mt-3">
                <li class="nav-item nav-profile tw-flex tw-justify-center m-0">
                    <a href="#" class="nav-link tw-relative tw-w-[95%] !tw-p-10">
                        <div class="profile-image tw-w-1/5">

                            <img class="img-xs rounded-circle"
                                src="{{ Auth::user()->image ? asset('images/faces/face8.jpg') : asset('images/faces/face8.jpg') }}"
                                alt="profile image">
                            <div class="dot-indicator bg-success"></div>
                        </div>
                        <div class="tw-flex-wrap tw-w-4/5 tw-py-3">
                            <p class="tw-break-words tw-whitespace-normal tw-m-0 text-white text-xl tw-font-bold">
                                {{ Auth::user()->name }}</p>
                            <p class="designation p-0 !tw-mt-2">Admin</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item nav-category">Menú principal</li>
                <li class="nav-item">
                    <a class="nav-link" href="../../index.html">
                        <i class="menu-icon typcn typcn-document-text"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../../pages/forms/basic_elements.html">
                        <i class="menu-icon typcn typcn-shopping-bag"></i>
                        <span class="menu-title">Parques</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/charts/chartjs.html">
                        <i class="menu-icon typcn typcn-th-large-outline"></i>
                        <span class="menu-title">Empresas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/tables/basic-table.html">
                        <i class="menu-icon typcn typcn-bell"></i>
                        <span class="menu-title">Técnicos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/icons/font-awesome.html">
                        <i class="menu-icon typcn typcn-user-outline"></i>
                        <span class="menu-title">Reportes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/icons/font-awesome.html">
                        <i class="menu-icon typcn typcn-user-outline"></i>
                        <span class="menu-title">Calendario</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                        aria-controls="auth">
                        <i class="menu-icon typcn typcn-document-add"></i>
                        <span class="menu-title">test</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/samples/login.html"> Login </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/samples/register.html"> Register </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class='tw-text-clip tw-text-cyan-600 tw-text-xl'>HOLA BEBE</h1>

            </div>
            <!-- footer -->
            <footer class="footer">
                <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        bootstrapdash.com 2020</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                            href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                            templates</a> from Bootstrapdash.com</span>
                </div>
            </footer>
        </div>
    </div>
@endsection
