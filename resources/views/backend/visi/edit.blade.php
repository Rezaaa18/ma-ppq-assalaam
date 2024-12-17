@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
@endsection

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Ubah Data Visi</h5>
        <div class="card-body">
            <form action="{{ route('backend.visi.update', $visi->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Title</label>
                    <div class="col-md-10">
                        <textarea class="form-control @error('title') is-invalid @enderror" @error('title') is-invalid @enderror
                            id="exampleFormControlTextarea1" rows="3" name="title">{{ old('title', $visi->title) }}</textarea>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleFormControlTextarea1" class="col-md-2 form-label">Isi</label>
                    <div class="col-md-10">
                        <textarea class="form-control @error('isi') is-invalid @enderror" id="text-visi" rows="15" name="isi">{!! old('isi', $visi->isi) !!}</textarea>
                        @error('isi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row float-end mt-3">
                    <div class="col-sm-6">
                        <a href="{{ route('backend.visi.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Ubah</button>
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
            .create(document.querySelector('#text-visi'), {
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
