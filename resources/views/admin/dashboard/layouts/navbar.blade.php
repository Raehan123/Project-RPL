<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="bg-primary">
            <div class="navbar-brand-box bg-primary">
                <a href="{{ route('dashboard') }}" class="logo bg-primary">
                    <span class="logo-sm">
                        <div class="d-flex justify-center align-items-center mt-3">
                            <img src="{{ asset('assets/images/logo-finalease-removebg-preview.png') }}" alt=""
                                height="30">
                        </div>
                    </span>

                    <span class="logo-lg bg-primary">
                        <div class="d-flex justify-center align-items-center mt-2">
                            <img src="{{ asset('assets/images/logo-finalease-removebg-preview.png') }}" alt=""
                                height="50">
                            <h3 class="text-light">Final Ease</h3>
                        </div>
                    </span>
                </a>
            </div>
        </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-account-circle mdi-36px"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <div class="dropdown-item"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item text-danger" data-toggle="dropdown" href="route('logout')"
                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            <i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i>
                            Logout
                        </a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</header>