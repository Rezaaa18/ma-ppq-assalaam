@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
@endsection

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Masukan Data Prestasi</h5>
        <div class="card-body">
            <form action="{{ route('backend.prestasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Judul<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control @error('judul') is-invalid @enderror" type="text"
                            id="html5-text-input" placeholder="masukan judul prestasi" name="judul" />
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleFormControlTextarea1" class="col-md-2 form-label">Keterangan<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="text-prestasi" rows="15"
                            name="keterangan"></textarea>
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Gambar<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                            id="formFileMultiple" name="image" accept="image/*" multiple />
                        <small class="text-muted">Ukuran maksimal 2MB</small>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control @error('tanggal') is-invalid @enderror" type="date"
                            id="html5-date-input" name="tanggal" />
                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row float-end mt-3">
                    <div class="col-sm-6">
                        <a href="{{ route('backend.prestasi.index') }}" class="btn btn-secondary" type="button">kembali</a>
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
            .create(document.querySelector('#text-prestasi'), {
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
