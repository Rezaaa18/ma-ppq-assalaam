@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
@endsection

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Isi Data Berita</h5>
        <div class="card-body">
            <form action="{{ route('backend.agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-dark">Judul<span class="text-danger">*</span></label>
                    <input class="form-control mb-3  @error('judul') is-invalid @enderror" type="text"
                        placeholder="masukan judul kegiatan" aria-label="default input example" name="judul">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Kegiatan</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="text-agenda" rows="15"
                        name="deskripsi"></textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label text-dark">Gambar Agenda Kegiatan</label>
                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                        accept="image/*" id="formFileMultiple">
                    <small class="text-muted">Ukuran maksimal 2MB</small>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label text-dark">Tanggal Mulai Kegiatan<span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('tanggal_mulai') is-invalid @enderror" type="date"
                                id="html5-date-input" name="tanggal_mulai" />
                            @error('tanggal_mulai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label text-dark">Tanggal Selesai Kegiatan<span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('tanggal_selesai') is-invalid @enderror" type="date"
                                id="html5-date-input" name="tanggal_selesai" />
                            @error('tanggal_selesai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-dark">Tempat Kegiatan</label>
                    <input class="form-control mb-3  @error('tempat') is-invalid @enderror" type="text"
                        placeholder="ini boleh di isi boleh juga kosong" aria-label="default input example" name="tempat">
                    @error('tempat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row float-end mt-3">
                    <div class="col-sm-6">
                        <a href="{{ route('backend.agenda.index') }}" class="btn btn-secondary" type="button">kembali</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.1/"
        }
    }
    </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#text-agenda'), {
                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>
@endpush
