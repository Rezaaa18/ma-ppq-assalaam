@extends('layouts.backend')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg border-0">
                    <img class="card-img-top" src="{{ asset('image/berita/' . $berita->image) }}" alt="Berita Image" />
                    <div class="card-body">
                        <h2 class="card-title">{{ $berita->judul }}</h2>
                        <p class="text-muted mb-3">
                            <small>
                                <i class="bx bx-calendar"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                                <i class="bx bx-user"></i> {{ $berita->penulis }}
                            </small>
                        </p>
                        <div class="content">
                            {!! $berita->isi !!}
                        </div>
                        <a href="{{ route('backend.berita.index') }}" type="button" class="btn btn-primary">Kembali ke
                            Daftar
                            Berita</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
