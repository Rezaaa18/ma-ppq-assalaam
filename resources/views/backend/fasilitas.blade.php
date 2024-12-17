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
            <form method="GET" action="{{ route('backend.fasilitas.index') }}"
                class="navbar-nav align-items-center d-flex">
                <div class="nav-item d-flex align-items-center">
                    <button type="submit" class="btn p-0" aria-label="Search">
                        <i class="bx bx-search fs-4 lh-0 me-2"></i>
                    </button>
                    <input type="text" name="search" class="form-control border-0 shadow-none"
                        placeholder="Cari fasilitas..." aria-label="Search..." value="{{ request()->get('search') }}" />
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
                            <div class="dropdown-divider"></div>
                        </li>
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
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Fasilitas</h5>
                </div>
                <div class="col">
                    <button type="button" class="btn rounded-pill btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#backDropModal"><i class='bx bxs-add-to-queue'></i> Tambah Fasilitas</button>
                    <!-- Modal Store -->
                    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <form class="modal-content" action="{{ route('backend.fasilitas.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="backDropModalTitle">Masukan Data Fasilitas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameBackdrop" class="form-label">keterangan</label>
                                            <input type="text" id="nameBackdrop"
                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                placeholder="masukan keterangan" name="keterangan" />
                                            @error('keterangan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameBackdrop" class="form-label">Masukan gambar fasilitas</label>
                                            <input class="form-control @error('image') is-invalid @enderror" name="image"
                                                type="file" id="formFileMultiple" accept="image/*" multiple />
                                            <small class="text-muted">Ukuran maksimal 2MB</small>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label class="form-label" for="basic-default-company">Kategori Fasilitas</label>
                                            <select id="defaultSelect" class="form-select"
                                                @error('id_kategori') is-invalid @enderror" name="id_kategori">
                                                @foreach ($kategoriFasilitas as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori')
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
                            <th>Keterangan</th>
                            <th>Kategori Fasilitas</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($fasilitas as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><strong>{{ $data->keterangan }}</strong></td>
                                <td>{{ $data->kategoriFasilitas->nama_kategori }}</td>
                                <td>
                                    <img src="{{ asset('image/fasilitas/' . $data->image) }}" class="img-fluid"
                                        style="max-height: 70px;">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-info"
                                        data-bs-toggle="modal" data-bs-target="#showDetail{{ $data->id }}"><i
                                            class='bx bx-show' data-bs-toggle="tooltip" data-bs-offset="0,4"
                                            data-bs-placement="top" data-bs-html="true"
                                            title="<span>lihat</span>"></i></button>
                                    <!-- Modal Show -->
                                    <div class="modal fade" id="showDetail{{ $data->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Detail Media</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <img src="{{ asset('image/fasilitas/' . $data->image) }}"
                                                        class="img-fluid" style="max-height: 300px;">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Show -->

                                    <button type="button" class="btn btn-sm rounded-pill btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#updateModal{{ $data->id }}"><i
                                            class='bx bxs-edit' data-bs-toggle="tooltip" data-bs-offset="0,4"
                                            data-bs-placement="top" data-bs-html="true"
                                            title="<span>ubah</span>"></i></button>
                                    <!-- Modal Update -->
                                    <div class="modal fade" id="updateModal{{ $data->id }}"
                                        data-bs-backdrop="static" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <form class="modal-content"
                                                action="{{ route('backend.fasilitas.update', $data->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalTitle">Merubah Data Fasilitas
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBackdrop"
                                                                class="form-label">keterangan</label>
                                                            <input type="text" id="nameBackdrop"
                                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                                value="{{ old('keterangan', $data->keterangan) }}"
                                                                name="keterangan" />
                                                            @error('keterangan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label text-dark">Gambar Fasilitas
                                                                Sebelumnya</label>
                                                            @if ($data->image)
                                                                <div class="mb-2">
                                                                    <img src="{{ asset('image/fasilitas/' . $data->image) }}"
                                                                        alt="cover" class="img-fluid"
                                                                        style="max-width: 100px;">
                                                                </div>
                                                            @endif
                                                            <label for="image" class="form-label text-dark">Masukkan
                                                                Gambar Fasilitas Baru</label>
                                                            <input
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                name="image" type="file" id="image"
                                                                accept="image/*">
                                                            <small class="text-muted">Ukuran maksimal 2MB</small>
                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label" for="basic-default-company">Kategori
                                                                Fasilitas</label>
                                                            <select id="defaultSelect" class="form-select"
                                                                @error('id_kategori') is-invalid @enderror"
                                                                name="id_kategori">
                                                                @foreach ($kategoriFasilitas as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ $item->id == $data->id_kategori ? 'selected' : '' }}>
                                                                        {{ $item->nama_kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('id_kategori')
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

                                    <form action="{{ route('backend.fasilitas.destroy', $data->id) }}" method="POST"
                                        style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('backend.fasilitas.destroy', $data->id) }}" type="submit"
                                            class="btn btn-sm rounded-pill btn-danger" data-confirm-delete="true"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"><i
                                                class='bx bxs-trash'></i></a>

                                    </form>
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
