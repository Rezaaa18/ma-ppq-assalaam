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
            <form method="GET" action="{{ route('backend.galeri.index') }}" class="navbar-nav align-items-center d-flex">
                <div class="nav-item d-flex align-items-center">
                    <button type="submit" class="btn p-0" aria-label="Search">
                        <i class="bx bx-search fs-4 lh-0 me-2"></i>
                    </button>
                    <input type="text" name="search" class="form-control border-0 shadow-none"
                        placeholder="Cari galeri..." aria-label="Search..." value="{{ request()->get('search') }}" />
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
    <div class="row">
        <div class="col">
            <h2>Galeri Kegiatan</h2>
        </div>
        <div class="col">
            <button type="button" class="btn rounded-pill btn-success float-end" data-bs-toggle="modal"
                data-bs-target="#backDropModal"><i class='bx bxs-add-to-queue'></i> Tambahkan media kegiatan</button>
            <!-- Modal Store -->
            <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <form class="modal-content" action="{{ route('backend.galeri.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="backDropModalTitle">Masukan Kegiatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label text-dark">Keterangan<span class="text-danger">*</span></label>
                                <input class="form-control @error('description') is-invalid @enderror" type="text"
                                    placeholder="masukan keterangan kegiatan" aria-label="default input example"
                                    name="description">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-dark">Jenis Kegiatan<span class="text-danger">*</span></label>
                                <select class="form-select mb-3 @error('jenis_kegiatan') is-invalid @enderror"
                                    name="jenis_kegiatan" aria-label="Default select example">
                                    <option value="Kepesantrenan">Kepesantrenan</option>
                                    <option value="Sekolah">Sekolah</option>
                                </select>
                                @error('jenis_kegiatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-dark">Masukkan media kegiatan<span
                                        class="text-danger">*</span></label>
                                <div>
                                    <label>Masukkan Gambar</label>
                                    <input type="file" name="media" accept="image/*"
                                        class="form-control @error('media') is-invalid @enderror">
                                    <small class="text-muted">Ukuran maksimal 2MB</small>
                                </div>
                                @error('media')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal Store -->
        </div>
    </div>
    <hr class="my-3" />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Kegiatan</th>
                            <th>Media</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($galeri as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->jenis_kegiatan }}</td>
                                <td>
                                    @if ($data->media)
                                        <img src="{{ Storage::url($data->media) }}" class="img-fluid"
                                            style="max-height: 70px;">
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-info"
                                        data-bs-toggle="modal" data-bs-target="#showKepesantrenan{{ $data->id }}"><i
                                            class='bx bx-show-alt' data-bs-toggle="tooltip" data-bs-offset="0,4"
                                            data-bs-placement="top" data-bs-html="true"
                                            title="<span>lihat</span>"></i></button>
                                    <!-- Modal Show -->
                                    <div class="modal fade" id="showKepesantrenan{{ $data->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Detail Media</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <img src="{{ Storage::url($data->media) }}" class="img-fluid"
                                                        style="max-height: 300px;">
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
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateKepesantrenan{{ $data->id }}"><i class='bx bxs-edit'
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true" title="<span>ubah</span>"></i></button>
                                    <!-- Modal Update -->
                                    <div class="modal fade" id="updateKepesantrenan{{ $data->id }}"
                                        data-bs-backdrop="static" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <form class="modal-content"
                                                action="{{ route('backend.galeri.update', $data->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalTitle">Masukan Perubahan
                                                        Kegiatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="keterangan"
                                                            class="form-label text-dark">Keterangan<span
                                                                class="text-danger">*</span></label>
                                                        <input
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            type="text" id="keterangan"
                                                            placeholder="Masukkan keterangan" name="description"
                                                            value="{{ old('description', $data->description) }}">
                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-dark">Jenis Kegiatan<span
                                                                class="text-danger">*</span></label>
                                                        <select
                                                            class="form-select mb-3 @error('jenis_kegiatan') is-invalid @enderror"
                                                            name="jenis_kegiatan">
                                                            <option value="Kepesantrenan"
                                                                {{ $data->jenis_kegiatan == 'Kepesantrenan' ? 'selected' : '' }}>
                                                                Kepesantrenan</option>
                                                            <option value="Sekolah"
                                                                {{ $data->jenis_kegiatan == 'Sekolah' ? 'selected' : '' }}>
                                                                Sekolah</option>
                                                        </select>
                                                        @error('jenis_kegiatan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <div>
                                                            <label class="form-label text-dark">Gambar
                                                                Sebelumnya</label><br>
                                                            <img src="{{ Storage::url($data->media) }}"
                                                                alt="media" class="img-thumbnail"
                                                                style="max-width: 150px;">
                                                            <label>Masukkan Gambar Baru</label>
                                                            <input type="file" name="media" accept="image/*"
                                                                class="form-control @error('media') is-invalid @enderror">
                                                        </div>
                                                        @error('media')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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
                                    <!-- End Modal Update -->

                                    <a href="{{ route('backend.galeri.destroy', $data->id) }}" type="button"
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
