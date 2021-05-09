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

                {{-- Jangan di hapus ini buat nyatet --}}
                {{-- <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-title">Extra UI</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Widgets</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-widgets-chatbox.html">Chatbox</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-widgets-pricing.html">Pricing</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-widgets-todolist.html">To-do List</a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>