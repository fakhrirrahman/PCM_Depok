<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">PCM Depok</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Halaman Utama</a></li>
                <li class="dropdown">
                    <a href="{{ url('/tentang-kami') }}" class="{{ request()->is('tentang-kami*') ? 'active' : '' }}">
                        <span>Tentang Kami</span>
                    </a>
                </li>
                <li><a href="{{ url('/anggota') }}" class="{{ request()->is('anggota') ? 'active' : '' }}">Anggota</a>
                </li>
                <li><a href="{{ url('/struktur-organisasi') }}"
                        class="{{ request()->is('struktur-organisasi') ? 'active' : '' }}">Struktur
                        Organisasi</a>
                </li>
                {{-- <li><a href="{{ url('/presensi') }}"
                        class="{{ request()->is('presensi') ? 'active' : '' }}">presensi</a> --}}
                </li>
                <li><a href="{{ url('/kegiatan') }}"
                        class="{{ request()->is('kegiatan') ? 'active' : '' }}">Kegiatan</a></li>

                <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Kontak</a>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/pdmsleman/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</header>