<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    Sistem Donasi
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  {{ Route::is('homepage') ? 'active' : '' }}">
                    <a href="{{ route('homepage') }}" class='sidebar-link'>
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                @can('admin-users')
                <li class="sidebar-item  {{ Route::is('admin.users.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class='sidebar-link'>
                        <i class="fas fa-users-cog"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ Route::is('admin.profesis.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.profesis.index') }}" class='sidebar-link'>
                        <i class="fas fa-user-md"></i>
                        <span>Manajemen Profesi</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ Route::is('admin.agamas.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.agamas.index') }}" class='sidebar-link'>
                        <i class="fas fa-praying-hands"></i>
                        <span>Manajemen Agama</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ Route::is('admin.vendors.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.vendors.index') }}" class='sidebar-link'>
                        <i class="fas fa-university"></i>
                        <span>Manajemen Vendor Saving</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ Route::is('admin.rekenings.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.rekenings.index') }}" class='sidebar-link'>
                        <i class="fas fa-money-check-alt"></i>
                        <span>Manajemen Rekening</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ Route::is('admin.konten-blogs.index') ||
                                            Route::is('admin.konten-blogs.create') ||
                                            Route::is('admin.konten-blogs.edit') ||
                                            Route::is('admin.konten-blogs.show') ? 'active' : '' }}">
                    <a href="{{ route('admin.konten-blogs.index') }}" class='sidebar-link'>
                        <i class="fas fa-th-large"></i>
                        <span>Manajemen Konten Blog</span>
                    </a>
                </li>
                @endcan

                @can('relawan-users')
                <li class="sidebar-item  {{ Route::is('relawan.programs.index') ? 'active' : '' }}">
                    <a href="{{ route('relawan.programs.index') }}" class='sidebar-link'>
                        <i class="fas fa-calendar"></i>
                        <span>Daftar Program</span>
                    </a>
                </li>
                @endcan

                {{-- Menu login  --}}
                @if(!Auth::check())
                <li class="sidebar-item  ">
                    <a href="{{ route('login') }}" class='sidebar-link'>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Login</span>
                    </a>
                </li>

                {{-- Menu Register --}}
                <li class="sidebar-item  ">
                    <a href="{{ route('register') }}" class='sidebar-link'>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Register</span>
                    </a>
                </li>
                @else
                <li class="sidebar-item  ">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
