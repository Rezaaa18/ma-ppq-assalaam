<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <div class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('backend/assets/img/favicon/logo.png') }}" alt="" style="max-height: 3rem">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">MA-PPQ <br> ASSALAAM</span>
        </div>
    </div>

    <div class="menu-inner-shadow"></div>
    <hr class="my-2" />

    <ul class="menu-inner py-1" id="menu-items">
        <!-- Dashboard -->
        <li class="menu-item {{ url()->current() == route('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Tersimpan</span>
        </li>
        <li
            class="menu-item {{ request()->routeIs('backend.struktural.*') || request()->routeIs('backend.jabatan.*') ? 'active menu-open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Form Elements">Struktural</div>
            </a>
            <ul
                class="menu-sub {{ request()->routeIs('backend.struktural.*') || request()->routeIs('backend.jabatan.*') ? 'menu-open' : '' }}">
                <li class="menu-item {{ request()->routeIs('backend.jabatan.*') ? 'active' : '' }}">
                    <a href="{{ route('backend.jabatan.index') }}" class="menu-link">
                        <div data-i18n="Input groups">Jabatan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('backend.struktural.index') ? 'active' : '' }}">
                    <a href="{{ route('backend.struktural.index') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Data Struktural</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('backend.sejarah.*') ? 'active' : '' }}">
            <a href="{{ route('backend.sejarah.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-buildings'></i>
                <div data-i18n="Basic">Sejarah</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('backend.visi.*') ? 'active' : '' }}">
            <a href="{{ route('backend.visi.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-flag'></i>
                <div data-i18n="Basic">Visi</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Input</span>
        </li>
        <li
            class="menu-item {{ request()->routeIs('backend.fasilitas.*') || request()->routeIs('backend.kategori-fasilitas.*') ? 'active menu-open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Form Elements">Fasilitas</div>
            </a>
            <ul
                class="menu-sub {{ request()->routeIs('backend.fasilitas.*') || request()->routeIs('backend.kategori-fasilitas.*') ? 'menu-open' : '' }}">
                <li class="menu-item {{ request()->routeIs('backend.kategori-fasilitas.*') ? 'active' : '' }}">
                    <a href="{{ route('backend.kategori-fasilitas.index') }}" class="menu-link">
                        <div data-i18n="Input groups">Kategori Fasilitas</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('backend.fasilitas.index') ? 'active' : '' }}">
                    <a href="{{ route('backend.fasilitas.index') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Data Fasilitas</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('backend.galeri.*') ? 'active' : '' }}">
            <a href="{{ route('backend.galeri.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-images'></i>
                <div data-i18n="Basic">Galeri Kegiatan</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('backend.berita.*') ? 'active' : '' }}">
            <a href="{{ route('backend.berita.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-news'></i>
                <div data-i18n="Basic">Berita & Artikel</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('backend.agenda.*') ? 'active' : '' }}">
            <a href="{{ route('backend.agenda.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-calendar-week'></i>
                <div data-i18n="Basic">Agenda</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('backend.pengumuman.*') ? 'active' : '' }}">
            <a href="{{ route('backend.pengumuman.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-message-square-error'></i>
                <div data-i18n="Basic">Pengumuman</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('backend.prestasi.*') ? 'active' : '' }}">
            <a href="{{ route('backend.prestasi.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-trophy'></i>
                <div data-i18n="Basic">Prestasi</div>
            </a>
        </li>
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">lainnya</span>
        </li>
        <li class="menu-item {{ request()->routeIs('index.*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <i class='menu-icon tf-icons bx bx-carousel'></i>
                <div data-i18n="Basic">Slide Show</div>
            </a>
        </li> --}}
    </ul>
</aside>
