@extends('layouts.backend')

@section('content')
    <style>
        .about-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background-color: #f9f9f9;
        }

        .about-content {
            display: flex;
            max-width: 1200px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: white;
            margin-bottom: 40px;
        }

        .about-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .about-text {
            flex: 2;
            padding: 20px;
        }

        .about-text h2 {
            margin-bottom: 20px;
            font-size: 2.5em;
            color: #333;
            font-weight: bold;
        }

        .about-text p {
            margin-bottom: 15px;
            line-height: 1.6;
            color: #666;
            font-size: 1.1em;
        }

        .btn-primary:hover {
            background-color: green;
            border-color: lightgray;
        }

        @media (max-width: 768px) {
            .about-content {
                flex-direction: column;
            }

            .about-image,
            .about-text {
                padding: 10px;
            }

            .about-text h2 {
                font-size: 2em;
            }
        }
    </style>

    <div class="about-container">
        <div class="about-content">
            <div class="about-image">
                <img src="{{ Storage::url($sejarah->image) }}" alt="Sejarah MA-Pondok Pesantren Qur'an Assalaam Arjasari">
            </div>
            <div class="about-text">
                <h2>{{ $sejarah->title }}</h2>
                <p>{!! $sejarah->sejarah !!}</p>
                <a href="{{ route('backend.sejarah.edit', $sejarah->id) }}" class="btn btn-primary">Ubah Sejarah</a>
            </div>
        </div>
    </div>
@endsection
