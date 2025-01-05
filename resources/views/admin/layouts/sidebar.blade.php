<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <div class="navbar-brand-box">
                    <a class="logo">
                        <span class="logo-sm">
                            <i class="mdi mdi-account-circle mdi-36px"></i>
                        </span>
                        <span class="logo-lg">
                            <i class="mdi mdi-account-circle" style="font-size: 64px"></i>
                            <h3 class="text-light">{{ Auth::user()->name }}</h3>
                        </span>
                    </a>
                </div>
                <br>
                <br>
                <!-- Dashboard -->
                <li>
                    <a href="{{ url('/admin') }}"
                        class="nav-link {{ request()->is('admin') ? 'bg-primary text-white' : '' }}">
                        <i class="fa-solid fa-table-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Mahasiswa -->
                <li>
                    <a href="{{ url('admin/mahasiswa') }}"
                        class="nav-link {{ request()->is('admin/mahasiswa*') ? 'bg-primary text-white' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Mahasiswa</span>
                    </a>
                </li>

                <!-- Dosen -->
                <li>
                    <a href="{{ url('admin/dosen') }}"
                        class="nav-link {{ request()->is('admin/dosen*') ? 'bg-primary text-white' : '' }}">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Dosen</span>
                    </a>
                </li>

                <!-- Bimbingan -->
                <li>
                    <a href="{{ url('admin/bimbingan') }}"
                        class="nav-link {{ request()->is('admin/bimbingan*') ? 'bg-primary text-white' : '' }}">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Bimbingan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

