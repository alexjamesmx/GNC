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
    <li class="nav-item nav-category">En inspección</li>
    <li id="nav_dashboard"class="nav-item">
        <a class="flex justify-start mt-2 px-4 py-3 rounded nav-custom" href="{{ route('tecnico.test', $inspeccion->id) }}">
            <i class="fas fa-arrow-alt-circle-left text-white ml-12 self-center"></i>
            <span class="menu-title text-white ml-12 text-lg">Atrás</span>
        </a>
    </li>
@endsection
