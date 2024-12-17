<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MA-PPQ ASSALAAM</title>
    <link href="{{ asset('frontend/img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/ai.css') }}">
</head>


<body>
    @include('include.frontend.spinner')

    @include('include.frontend.navbarr')

    <div class="container-fluid news-section py-5 bg-gradient-news text-white">
        <div class="container">
            <!-- Judul Utama -->
            <div class="text-center mb-5 mt-navbar">
                <h1 class="display-3 fw-bold text-light">Berita Terbaru</h1>
                <p class="fs-5">Informasi Terkini dari Madrasah Aliyah Assalaam</p>
            </div>

            <!-- Grid Berita -->
            <div class="row g-4">
                @foreach ($berita as $data)
                    <div class="col-md-6 col-lg-4">
                        <div class="news-card shadow-lg">
                            <!-- Gambar Berita -->
                            <div class="news-img-wrapper position-relative">
                                <img src="{{ asset('image/berita/' . $data->image) }}" alt="{{ $data->judul }}"
                                    class="img-fluid rounded-top news-img">
                                <div class="news-date">
                                    {{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                                </div>
                            </div>
                            <!-- Isi Berita -->
                            <div class="card-body bg-white rounded-bottom p-4">
                                <h5 class="fw-bold text-dark">{{ $data->judul }}</h5>
                                <p class="text-muted small mb-3">
                                    {!! Str::limit(($data->isi), 100, '...') !!}
                                </p>
                                <a href="{{ route('berita.show', $data->slug) }}" class="btn btn-gradient-news">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




    @include('include.frontend.footer')





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
