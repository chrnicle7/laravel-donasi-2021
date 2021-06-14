<div id="sidebar" class="{{ Route::is('homepage') ? '' : 'active'}}">
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
                <li class="sidebar-item  {{ Route::is('create_saran_umum') ? 'active' : '' }}">
                    <a href="{{ route('create_saran_umum') }}" class='sidebar-link'>
                        <i class="far fa-paper-plane"></i>
                        <span>Saran</span>
                    </a>
                </li>

                @can('admin-users')
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-user" style="color: rgb(16, 69, 227)" aria-hidden="true"></i>
                            <span>Admin</span>
                        </a>
                        <ul class="submenu {{ auth()->user()->hasRole('admin') ? 'active' : '' }}">
                            <li class="submenu-item">
                                <a href="{{ route('admin.users.index') }}" class='sidebar-link'>
                                    <i class="fas fa-users-cog"></i>
                                    <span>Manajemen User</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('admin.profesis.index') }}" class='sidebar-link'>
                                    <i class="fas fa-user-md"></i>
                                    <span>Manajemen Profesi</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('admin.agamas.index') }}" class='sidebar-link'>
                                    <i class="fas fa-praying-hands"></i>
                                    <span>Manajemen Agama</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('admin.vendors.index') }}" class='sidebar-link'>
                                    <i class="fas fa-university"></i>
                                    <span>Manajemen Vendor Saving</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('admin.rekenings.index') }}" class='sidebar-link'>
                                    <i class="fas fa-money-check-alt"></i>
                                    <span>Manajemen Rekening</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('admin.konten-blogs.index') }}" class='sidebar-link'>
                                    <i class="fas fa-th-large"></i>
                                    <span>Manajemen Konten Blog</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('admin.saran.index') }}" class='sidebar-link'>
                                    <i class="far fa-paper-plane"></i>
                                    <span>Manajemen Saran</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('relawan-users')
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-user" style="color: rgb(81, 157, 34)"  aria-hidden="true"></i>
                            <span>Relawan</span>
                        </a>
                        <ul class="submenu {{ auth()->user()->hasRole('relawan') ? 'active' : '' }}">
                            <li class="submenu-item">
                                <a href="{{ route('relawan.programs.index') }}" class='sidebar-link'>
                                    <i class="fas fa-calendar"></i>
                                    <span>Manajemen Program</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('relawan.programs.create') }}" class='sidebar-link'>
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Tambahkan Program</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
