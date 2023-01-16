@extends('template._sidebar')

@section('sidebar_body')
    <li class="nav-item nav-profile flex justify-center m-0 mb-4">
        <a href="{{ route('profile.edit') }}" class="nav-link relative w-[95%]">
            <div class="profile-image">

                <img class="img-xs rounded-circle"
                    src="{{ Auth::user()->image ? asset('images/profile/') . '/' . Auth::user()->image : asset('images/faces/face8.jpg') }}"
                    alt="profile image">
                <div class="dot-indicator bg-success"></div>
            </div>
            <div class="w-full py-3">
                <p class="break-words whitespace-normal m-0 text-white  font-bold">
                    {{ Auth::user()->name }}</p>
                <p class="designation p-0 !mt-2">{{ $role }}</p>
            </div>
        </a>
    </li>
    <li class="nav-item nav-category">Menú principal</li>
    <li class="nav-item {{ $section === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ $section === 'users' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.home') }}">
            <i class="menu-icon typcn typcn-user-outline"></i>
            <span class="menu-title">Usuarios</span>
        </a>
    </li>
    <li class="nav-item {{ $section === 'parques' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('parques.home') }}">
            <i class="menu-icon typcn typcn-shopping-bag"></i>
            <span class="menu-title">Parques</span>
        </a>
    </li>
    <li class="nav-item {{ $section === 'enterprises' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('empresas.home') }}">
            <i class="menu-icon typcn typcn-th-large-outline"></i>
            <span class="menu-title">Empresas</span>
        </a>
    </li>
    <li class="nav-item  {{ $section === 'subestaciones' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('subestacion.home') }}">
            <i class="menu-icon typcn typcn-bell"></i>
            <span class="menu-title">Subestaciones</span>
        </a>
    </li>
    <li class="nav-item {{ $section === 'inspecciones' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('inspeccion.home') }}">
            <i class="menu-icon typcn typcn-bell"></i>
            <span class="menu-title">Inspecciones</span>
        </a>
    </li>
    <li class="nav-item  {{ $section === 'verificar' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('verificar.home') }}">
            <i class="menu-icon typcn typcn-user-outline"></i>
            <span class="menu-title">Inspecciones por verificar</span>
        </a>
    </li>
    <li class="nav-item  {{ $section === 'calendario' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('calendario.home') }}">
            <i class="menu-icon typcn typcn-user-outline"></i>
            <span class="menu-title">Calendario</span>
        </a>
    </li>
@endsection
