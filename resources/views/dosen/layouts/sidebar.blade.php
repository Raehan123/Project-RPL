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
                <li>
                    <a href="{{ url('/dosen/dashboard') }}"
                        class="nav-link {{ request()->is('dosen/dashboard') ? 'bg-primary text-white' : '' }}">
                        <i class="fa-solid fa-table-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/dosen/jadwal') }}"
                        class="nav-link {{ request()->is('dosen/jadwal') ? 'bg-primary text-white' : '' }}">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Bimbingan</span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>