@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
@endsection

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Merubah Data Sejarah</h5>
        <div class="card-body">
            <form action="{{ route('backend.sejarah.update', $sejarah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label text-dark">Judul<span class="text-danger">*</span></label>
                    <input class="form-control mb-3  @error('title') is-invalid @enderror" type="text"
                        value="{{ old('title', $sejarah->title) }}" aria-label="default input example" name="title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label text-dark">Deskripsi Sejarah</label>
                    <textarea class="form-control @error('sejarah') is-invalid @enderror" id="text-sejarah" rows="15" name="sejarah"
                        value="{{ old('sejarah', $sejarah->sejarah) }}">{!! old('sejarah', $sejarah->sejarah) !!}</textarea>
                    @error('sejarah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    @if ($sejarah->image)
                        <label for="html5-text-input" class="col col-form-label">Gambar Sejarah Sebelumnya</label>
                        <div class="col-md-10">
                            <div class="mb-2">
                                <img src="{{ Storage::url($sejarah->image) }}" alt="Image"class="img-fluid"
                                    style="max-width: 10rem;">
                            </div>
                        </div>
                    @endif
                    <label for="formFileMultiple" class="form-label text-dark">Gambar Sejarah</label>
                    <input class="form-control @error('image') is-invalid @enderror" accept="image/*" name="image"
                        type="file" id="formFileMultiple">
                    <small class="text-muted">Ukuran maksimal 2MB</small>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row float-end mt-3">
                    <div class="col-sm-6">
                        <a href="{{ route('backend.sejarah.index') }}" class="btn btn-secondary" type="button">kembali</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
            .create(document.querySelector('#text-sejarah'), {
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
