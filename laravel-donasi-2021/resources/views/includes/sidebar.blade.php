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
                @can('admin-users')
                <li class="sidebar-item  {{ Route::is('admin.users.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class='sidebar-link'>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ Route::is('admin.list_profesi') ? 'active' : '' }}">
                    <a href="{{ route('admin.list_profesi') }}" class='sidebar-link'>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Manajemen Profesi</span>
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