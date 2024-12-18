<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{url('/')}}" class="navbar-brand p-0">
        <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{url('/')}}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle {{ Request::is('profil*') ? 'active' : '' }}">Profil</span>
                </a>
                <div class="dropdown-menu m-0">
                    <a href="{{url('visi_misi')}}" class="dropdown-item {{ Request::is('visi_misi') ? 'active' : '' }}">Visi Misi</a>
                    <a href="{{url('guru')}}" class="dropdown-item {{ Request::is('guru') ? 'active' : '' }}">Guru</a>
                    <a href="{{url('kurikulum')}}" class="dropdown-item {{ Request::is('kurikulum') ? 'active' : '' }}">Kurikulum</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle {{ Request::is('informasi*') ? 'active' : '' }}">Informasi</span>
                </a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('berita.index') }}" class="dropdown-item {{ Request::is('berita.index') ? 'active' : '' }}">Berita</a>
                    <a href="{{ url('agenda')}}" class="dropdown-item {{ Request::is('agenda') ? 'active' : '' }}">Agenda</a>
                    <a href="{{ url('pengumuman')}}" class="dropdown-item {{ Request::is('pengumuman') ? 'active' : '' }}">Pengumuman</a>
                    <a href="{{ url('prestasi') }}" class="dropdown-item {{ Request::is('prestasi') ? 'active' : '' }}">Prestasi</a>
                </div>
            </div>
            <a href="{{ url('fasilitas') }}" class="nav-item nav-link {{ Request::is('fasilitas') ? 'active' : '' }}">Fasilitas</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle {{ Request::is('galeri*') ? 'active' : '' }}">Galeri</span>
                </a>
                <div class="dropdown-menu m-0">
                    <a href="{{ url('kepesantrenan') }}" class="dropdown-item {{ Request::is('kepesantrenan') ? 'active' : '' }}">Kepesantrenan</a>
                    <a href="{{ url('sekolah') }}" class="dropdown-item {{ Request::is('sekolah') ? 'active' : '' }}">Sekolah</a>
                </div>
            </div>
            <a href="{{ url('ppdb') }}" class="nav-item nav-link {{ Request::is('ppdb') ? 'active' : '' }}">PPDB</a>
        </div>
    </div>
</nav>
