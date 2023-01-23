<!-- Top -->
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl navbar-nav-right">

        <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
            <a href="{{ url('/home') }}" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                    <img src="{{ asset('assets/logo/logo.jpeg') }}" alt="" style="width: 200px">
                </span>
            </a>
        </div>


        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">


                <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        Change Decimal
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 1) }}">
                                <span class="align-middle">1 (.0)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 2) }}">
                                <span class="align-middle">2 (.00)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 3) }}">
                                <span class="align-middle">3 (.000)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 4) }}">
                                <span class="align-middle">4 (.0000)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 5) }}">
                                <span class="align-middle">5 (.00000)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 6) }}">
                                <span class="align-middle">6 (.000000)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 7) }}">
                                <span class="align-middle">7 (.0000000)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 8) }}">
                                <span class="align-middle">8 (.00000000)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 9) }}">
                                <span class="align-middle">9 (.000000000)</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set_decimal', 10) }}">
                                <span class="align-middle">10 (.0000000000)</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                                class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block lh-1">MGMC</span>
                                        <small>Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('changepassword.index') }}">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">Change Password</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off me-2"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>

    </div>
</nav>
<!-- TOp -->
