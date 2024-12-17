@extends('layouts.backend')

@section('content')
    <style>
        /* Gaya untuk tampilan show berita */
        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-img-top {
            height: 400px;
            object-fit: cover;
        }

        .card-title {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }

        .content {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-top: 20px;
        }

        .text-muted {
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .card-title {
                font-size: 1.5rem;
            }

            .content {
                font-size: 1rem;
            }

            .card-img-top {
                height: 250px;
            }
        }
    </style>

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
                        <a href="{{ route('backend.berita.index') }}" class="btn btn-primary mt-4">Kembali ke Daftar
                            Berita</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
