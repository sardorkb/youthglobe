<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
                aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
            </button>
            <a class="navbar-brand me-1 me-sm-3" href="index.html">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <p class="logo-text ms-2 d-none d-sm-block">Youth Globe</p>
                    </div>
                </div>
            </a>
        </div>

        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="moon"></span></label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="sun"></span></label>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="avatar avatar-l">
                        <img class="rounded-circle" src="{{ asset('backend/img/team/40x40/57.webp') }}" alt="" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="overflow-auto scrollbar" style="height: 10rem">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!">
                                        <span class="me-2 text-900"
                                            data-feather="user"></span><span>Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!"><span class="me-2 text-900"
                                            data-feather="pie-chart"></span>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!">
                                        <span class="me-2 text-900" data-feather="lock"></span>Posts &amp;
                                        Activity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!">
                                        <span class="me-2 text-900" data-feather="settings"></span>Settings &amp;
                                        Privacy
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!">
                                        <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!">
                                        <span class="me-2 text-900" data-feather="globe"></span>Language</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!">
                                        <span class="me-2 text-900" data-feather="user-plus"></span>Add another
                                        account</a>
                                </li>
                            </ul>
                            <hr />
                            <div class="px-3">
                                <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!">
                                    <span class="me-2" data-feather="log-out"> </span>Sign
                                    out</a>
                            </div>
                            <div class="my-2 text-center fw-bold fs--2 text-600">
                                <a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a
                                    class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1"
                                    href="#!">Cookies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
