@extends('layouts.backend')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
@endsection
@section('navbar')
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <form method="GET" action="{{ route('backend.jabatan.index') }}" class="navbar-nav align-items-center d-flex">
                <div class="nav-item d-flex align-items-center">
                    <button type="submit" class="btn p-0" aria-label="Search">
                        <i class="bx bx-search fs-4 lh-0 me-2"></i>
                    </button>
                    <input type="text" name="search" class="form-control border-0 shadow-none"
                        placeholder="Cari Jabatan..." aria-label="Search..." value="{{ request()->get('search') }}" />
                </div>
            </form>
            <!-- /Search -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User Dropdown -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <span class="w-px-40 h-auto fw-semibold d-block">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off me-2"></i>
                                Log Out
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
    </nav>
@endsection
@section('content')
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Jabatan</h5>
                </div>
                <div class="col">
                    <button type="button" class="btn rounded-pill btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#backDropModal"><i class='bx bxs-add-to-queue'></i> Tambah Jabatan</button>
                    <!-- Modal Store -->
                    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <form class="modal-content" action="{{ route('backend.jabatan.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="backDropModalTitle">Masukan Data Jabatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameBackdrop" class="form-label">Nama Jabatan</label>
                                            <input type="text" id="nameBackdrop"
                                                class="form-control @error('nama_jabatan') is-invalid @enderror"
                                                placeholder="masukan nama jabatan" name="nama_jabatan" />
                                            @error('nama_jabatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Modal Store -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($jabatan as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><strong>{{ $data->nama_jabatan }}</strong></td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#updateModal{{ $data->id }}"><i
                                            class='bx bxs-edit' data-bs-toggle="tooltip" data-bs-offset="0,4"
                                            data-bs-placement="top" data-bs-html="true"
                                            title="<span>ubah</span>"></i></button>
                                    <!-- Modal Update -->
                                    <div class="modal fade" id="updateModal{{ $data->id }}" data-bs-backdrop="static"
                                        tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <form class="modal-content"
                                                action="{{ route('backend.jabatan.update', $data->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalTitle">Merubah Data Jabatan
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBackdrop" class="form-label">Nama
                                                                Jabatan</label>
                                                            <input type="text" id="nameBackdrop"
                                                                class="form-control @error('nama_jabatan') is-invalid @enderror"
                                                                value="{{ old('nama_jabatan', $data->nama_jabatan) }}"
                                                                name="nama_jabatan" />
                                                            @error('nama_jabatan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Modal Store -->
                                    <a href="{{ route('backend.jabatan.destroy', $data->id) }}" type="button"
                                        class="btn btn-sm rounded-pill btn-danger" data-confirm-delete="true"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<span>hapus</span>">
                                        <i class='bx bxs-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#dataTable');
    </script>
@endpush
