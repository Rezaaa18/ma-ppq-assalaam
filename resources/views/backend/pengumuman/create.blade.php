@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
@endsection

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Isi Data Pengumuman</h5>
        <div class="card-body">
            <form action="{{ route('backend.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-dark">Judul<span class="text-danger">*</span></label>
                    <input class="form-control mb-3  @error('judul') is-invalid @enderror" type="text"
                        placeholder="masukan judul pengumuman" aria-label="default input example" name="judul">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Pengumuman<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="text-pengumuman" rows="15"
                        name="deskripsi"></textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label text-dark">Gambar Informasi
                        Pengumuman</label>
                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                        accept="image/*" id="formFileMultiple">
                    <small class="text-muted">Ukuran maksimal 2MB</small>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label text-dark">Tanggal</label>
                    <input class="form-control @error('tanggal') is-invalid @enderror" type="date" id="html5-date-input"
                        name="tanggal" />
                    @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row float-end mt-3">
                    <div class="col-sm-6">
                        <a href="{{ route('backend.pengumuman.index') }}" class="btn btn-secondary"
                            type="button">kembali</a>
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
            .create(document.querySelector('#text-pengumuman'), {
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
