@extends('template._sidebar')

@section('sidebar_body')
    <li class="nav-item nav-profile flex justify-center m-0 mb-4">
        <a href="{{ route('profile.edit') }}" class="nav-link relative w-[95%]">
            <div class="profile-image">

                <img class="img-xs rounded-circle object-cover"
                    src="{{ Auth::user()->image ? asset('images/profile/') . '/' . Auth::user()->image : asset('images/worker-svgrepo-com.svg') }}"
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
    <li class="nav-item nav-category">Menú principal</li>
    <li id="nav_dashboard"class="nav-item {{ $section === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="#dashboard"onclick="handle_dashboard()">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Inicio</span>
        </a>
    </li>
    <li class="nav-item" id="nav_inspecciones">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="menu-icon typcn typcn-document-add"></i>
            <span class="menu-title">Inspecciones</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth" style="visibility:visible !important">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#activas" onclick="handle_inspecciones_activas()">Asignadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#completas" onclick="handle_inspecciones_completas()">Finalizadas</a>
                </li>
            </ul>
        </div>
    </li>
@endsection
