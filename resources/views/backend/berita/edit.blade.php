@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
@endsection

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Ubah Data Berita</h5>
        <div class="card-body">
            <form action="{{ route('backend.berita.update', $berita->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Judul Berita/Artikel</label>
                    <div class="col-md-10">
                        <input class="form-control @error('judul') is-invalid @enderror" type="text"
                            id="html5-text-input" placeholder="Masukkan judul berita" name="judul"
                            value="{{ old('judul', $berita->judul) }}" />
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Penulis</label>
                    <div class="col-md-10">
                        <input class="form-control @error('penulis') is-invalid @enderror" type="text"
                            id="html5-text-input" placeholder="Masukkan nama penulis" name="penulis"
                            value="{{ old('penulis', $berita->penulis) }}" />
                        @error('penulis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal</label>
                    <div class="col-md-10">
                        <input class="form-control @error('tanggal') is-invalid @enderror" type="date"
                            value="{{ old('tanggal', $berita->tanggal) }}" id="html5-date-input" name="tanggal" />
                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Gambar Berita Sebelumnya</label>
                    <div class="col-md-10">
                        @if ($berita->image)
                            <div class="mb-2">
                                <img src="{{ asset('image/berita/' . $berita->image) }}" alt="cover" class="img-fluid"
                                    style="max-width: 100px;">
                            </div>
                        @else
                            <p>Tidak ada gambar sebelumnya.</p>
                        @endif
                    </div>
                    <label for="html5-text-input" class="col-md-2 col-form-label">Masukkan Gambar Berita Baru</label>
                    <div class="col-md-10">
                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                            id="formFileMultiple" accept="image/*" name="image" />
                        <small class="text-muted">Ukuran maksimal 2MB</small>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="form-text text-muted">Jika Anda tidak memilih file baru, gambar sebelumnya akan tetap
                            digunakan.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="text-berita" class="form-label">Isi Berita</label>
                    <textarea class="form-control @error('isi') is-invalid @enderror" value="{{ old('isi', $berita->isi) }}"
                        id="text-berita" rows="15" name="isi">{{ old('isi', $berita->isi) }}</textarea>
                    @error('isi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row float-end mt-3">
                    <div class="col-sm-6">
                        <a type="button" class="btn btn-secondary" href="{{ route('backend.berita.index') }}">Kembali</a>
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
            .create(document.querySelector('#text-berita'), {
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
