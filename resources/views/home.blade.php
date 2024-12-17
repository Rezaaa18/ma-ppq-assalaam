{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">Selamat Datang {{ Auth::user()->name }}! 🎉</h5>
                    <p class="mb-4">
                        Setiap langkah yang Anda ambil adalah bagian dari perjalanan menuju impian yang lebih besar.
                        Ingatlah, kesuksesan adalah proses yang harus dinikmati. Jangan takut akan kegagalan, karena di
                        balik setiap tantangan terdapat pelajaran berharga. Rayakan setiap pencapaian, sekecil apa pun, dan
                        teruslah bergerak maju dengan keyakinan bahwa Anda memiliki kemampuan untuk mencapai semua yang Anda
                        impikan. Mari wujudkan hal-hal hebat bersama!
                    </p>
                </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="{{ asset('backend/assets/img/illustrations/man-with-laptop-light.png') }}" height="250"
                        alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
            </div>
        </div>
    </div>
@endsection
