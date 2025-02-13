<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center" style="background-color: #00A8A8;"> <!-- Use Uzbek flag colors -->
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center text-white"><a href="mailto:contact@example.com"
                        class="text-white">contact@youthglobe.uz</a></i>
                <i class="text-white bi bi-phone d-flex align-items-center ms-4"><span class="text-white">+998 90 123
                        4567</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter text-white"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook text-white"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram text-white"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin text-white"><i class="bi bi-linkedin"></i></a>

                <!-- Language Selection Dropdown -->
                {{-- <div class="ms-4">
                    <form method="GET" action="{{ url()->current() }}" id="language-switcher">
                        <select name="locale" class="form-select text-white" style="background-color: transparent;" onchange="window.location.href = window.location.pathname.replace(/\/(en|ru|uz)/, '/' + this.value)">
                            <option value="uz" class="text-dark" {{ app()->getLocale() === 'uz' ? 'selected' : '' }}>O'zbekcha</option>
                            <option value="en" class="text-dark" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
                            <option value="ru" class="text-dark" {{ app()->getLocale() === 'ru' ? 'selected' : '' }}>Русский</option>
                        </select>
                    </form>
                </div> --}}

            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <h1 class="sitename">Youth Globe<br><span style="font-size: 16px">Work & Travel</span></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('programs') }}" class="{{ request()->routeIs('programs') ? 'active' : '' }}">Programs</a>
                    </li>
                    <li><a href="{{ route('partners') }}"
                            class="{{ request()->routeIs('partners') ? 'active' : '' }}">Partners</a></li>

                    <li><a href="#" class="{{ request()->is('blog') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="{{ route('about.us') }}" class="{{ request()->routeIs('about.us') ? 'active' : '' }}">About Us</a>
                    </li>
                    <li><a href="{{ route('contact.us') }}" class="{{ request()->routeIs('contact.us') ? 'active' : '' }}">Contact Us</a>
                    </li>

                    <!-- Apply/Login Button -->
                    <li class="nav-item dropdown">
                        @auth
                            <!-- User Icon -->
                            <button class="btn-get-started" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Display a rounded avatar without arrow -->
                                @if (Auth::guard('partner')->check())
                                    <!-- If a partner is logged in, display the partner's username -->
                                    {{ Auth::guard('partner')->user()->username }}
                                @elseif (Auth::check())
                                    <!-- If a regular user is logged in, display their name -->
                                    {{ Auth::user()->name }}
                                @endif
                            </button>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @if (Auth::guard('partner')->check())
                                    <!-- If partner is logged in -->
                                    <li><a class="dropdown-item" href="{{ route('partner.index') }}">Partner Dashboard</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('partner.logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                @elseif (Auth::check())
                                    <!-- If regular user is logged in -->
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">My Page</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        @else
                            <!-- Login Button -->
                            <button class="btn-get-started" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Login</button>
                        @endauth
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>
@include('modals.studentlogin')
