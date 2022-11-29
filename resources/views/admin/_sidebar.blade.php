<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav mt-3">
        <li class="nav-item nav-profile flex justify-center m-0 mb-4">
            <a href="#" class="nav-link relative w-[95%]">
                <div class="profile-image">

                    <img class="img-xs rounded-circle"
                        src="{{ Auth::user()->image ? asset('images/faces/face8.jpg') : asset('images/faces/face8.jpg') }}"
                        alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="w-full py-3">
                    <p class="break-words whitespace-normal m-0 text-white  font-bold">
                        {{ Auth::user()->name }}</p>
                    <p class="designation p-0 !mt-2">Admin</p>
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
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
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
