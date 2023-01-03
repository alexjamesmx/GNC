@extends('template._sidebar')

@section('sidebar_body')
    <li id="nav_dashboard"class="nav-item">
        <a
            href="{{ url()->previous() === url()->current() ? route('access') : url()->previous() }}"class="flex justify-start mt-2 px-4 py-3 rounded nav-custom">
            <i class="fas fa-arrow-alt-circle-left text-white ml-12 self-center"></i>
            <span class="menu-title text-white ml-12 text-lg">Atrás</span>
        </a>
    </li>
    <form action="{{ url('logout') }}" method="POST" class="w-fit">
        @csrf
        <li id="nav_dashboard"class="nav-item">
            <button href="#"class="border-none flex justify-start mt-2 px-4 py-3 rounded nav-custom hover:bg-red-500"
                style="background:transparent;">
                <i class="fa-solid fa-arrow-right-from-bracket text-white ml-12 self-center"></i>
                <span class="menu-title text-white ml-12 text-lg">Cerrar sesión</span>
            </button>
        </li>
    </form>
@endsection
