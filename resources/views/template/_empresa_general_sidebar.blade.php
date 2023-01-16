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
                <p class="designation p-0 !mt-2">{{ $role }}</p>
            </div>
        </a>
    </li>
    <li class="nav-item nav-category">Menú principal</li>
    <li class="nav-item {{ $section === 'dashboard' ? 'active' : '' }} hover:bg-cyan-400">
        <a class="nav-link" href="{{ route('empresa') }}">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Inicio </span>
        </a>
    </li>
@endsection
