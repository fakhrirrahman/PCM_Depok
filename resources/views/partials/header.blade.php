<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">Fadel anjing</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li class="dropdown">
                    <a href="{{ url('/about') }}" class="{{ request()->is('about*') ? 'active' : '' }}">
                        <span>About</span>
                    </a>
                </li>
                <li><a href="{{ url('/services') }}"
                        class="{{ request()->is('services') ? 'active' : '' }}">Services</a></li>
                {{-- <li><a href="{{ url('/portfolio') }}"
                        class="{{ request()->is('portfolio') ? 'active' : '' }}">Portfolio</a></li> --}}
                <li><a href="{{ url('/pricing') }}" class="{{ request()->is('pricing') ? 'active' : '' }}">Pricing</a>
                </li>
                <li><a href="{{ url('/presensi') }}"
                        class="{{ request()->is('presensi') ? 'active' : '' }}">presensi</a>
                </li>

                <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</header>