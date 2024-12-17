@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Struktural</h5>
                </div>
                <div class="col">
                    <button type="button" class="btn rounded-pill btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#storeStruktural"><i class='bx bxs-add-to-queue'></i> Tambah Guru/Karyawan</button>
                    <!-- Modal Store -->
                    <div class="modal fade" id="storeStruktural" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <form class="modal-content" action="{{ route('backend.struktural.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="storeStrukturalTitle">Masukan Data Guru/Karyawan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameBackdrop" class="form-label">Nama</label>
                                            <input type="text" id="nameBackdrop"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="masukan nama" name="nama" />
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameBackdrop" class="form-label">Masukan Foto</label>
                                            <input class="form-control @error('foto') is-invalid @enderror" name="foto"
                                                type="file" id="formFileMultiple" accept="image/*" multiple />
                                            <small class="form-text text-muted">Masukan Foto dengan ukuran maksimal
                                                2MB</small>
                                            @error('foto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label class="form-label" for="basic-default-company">Jabatan<span
                                                    class="text-danger">*</span></label>
                                            <select id="defaultSelect"
                                                class="form-select
                                                @error('id_jabatan') is-invalid @enderror"
                                                name="id_jabatan">
                                                @foreach ($jabatan as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_jabatan')
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
                <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($struktural as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><strong>{{ $data->nama }}</strong></td>
                                <td>{{ $data->jabatan->nama_jabatan }}</td>
                                <td>
                                    <img src="{{ Storage::url($data->foto) }}" alt="Image" style="max-height: 100px;">
                                    {{-- <p>{{ Storage::url($data->foto) }}</p> --}}
                                </td>
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
                                                action="{{ route('backend.struktural.update', $data->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalTitle">Merubah Data Guru/Karyawan
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBackdrop" class="form-label">Nama</label>
                                                            <input type="text" id="nameBackdrop"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                value="{{ old('nama', $data->nama) }}" name="nama" />
                                                            @error('nama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label text-dark">Foto Sebelumnya</label>
                                                            @if ($data->foto)
                                                                <div class="mb-2">
                                                                    <img src="{{ Storage::url($data->foto) }}"
                                                                        alt="Image" style="max-height: 100px;">
                                                                </div>
                                                            @endif
                                                            <label for="image" class="form-label text-dark">Masukkan
                                                                Foto Baru</label>
                                                            <input class="form-control @error('foto') is-invalid @enderror"
                                                                name="foto" type="file" id="foto"
                                                                accept="image/*" />
                                                            @error('foto')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label"
                                                                for="basic-default-company">Jabatan<span
                                                                    class="text-danger">*</span></label>
                                                            <select id="defaultSelect"
                                                                class="form-select
                                                                @error('id_jabatan') is-invalid @enderror"
                                                                name="id_jabatan">
                                                                @foreach ($jabatan as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ $item->id == $data->id_jabatan ? 'selected' : '' }}>
                                                                        {{ $item->nama_jabatan }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('id_jabatan')
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
                                    <!-- End Modal Update -->

                                    <form action="{{ route('backend.struktural.destroy', $data->id) }}" method="POST"
                                        style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('backend.struktural.destroy', $data->id) }}" type="submit"
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
        new DataTable('#example');
    </script>
@endpush
