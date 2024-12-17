<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pengumuman terbaru dari Madrasah Assalaam mencakup informasi penting untuk siswa, guru, dan orang tua mengenai kegiatan, jadwal, dan acara madrasah.">
    <meta name="keywords" content="pengumuman madrasah, informasi madrasah, berita terbaru, madrasah Assalaam, kegiatan sekolah, jadwal sekolah">
    <meta name="author" content="Madrasah Assalaam">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MA-PPQ ASSALAAM</title>

    <link href="{{ asset('backend/img/favicon/logo.png') }}" rel="icon">

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

    <link rel="icon" href="{{ asset('backend/assets/img/favicon/logo.png') }}" type="image/x-icon">



    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/ai.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tabgallery.css') }}">
</head>

<body>
    @include('include.frontend.spinner')


    {{-- navbar --}}
    @include('include.frontend.navbarr')
    {{-- end navbar --}}

    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <img src="{{ asset('frontend/img/pengumuman.webp') }}" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                        <h1 class="display-5 mb-4 text-white">Pengumuman Madrasah Assalaam Bandung</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @foreach ($pengumuman as $data)
    <div class="announcement-container mt-5 mb-5">
        <div class="announcement-header">
            <h2>{{$data->judul}}</h2>
        </div>
        <div class="announcement-content">
            <img id="announcement-image" src="{{ asset('image/pengumuman/' . $data->image) }}">
            <p>
                {!! $data->deskripsi !!}
            </p>
            <p><strong>Tanggal : </strong> {{$data->tanggal}}</p>

            {{-- <div class="countdown" data-date="2024-11-01T08:00:00Z"></div> --}}
        </div>
    </div>
    @endforeach



    @include('include.frontend.footer')


    <!-- JavaScript Libraries -->
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
    <script>
        document.querySelectorAll('.countdown').forEach(function(element) {
            const countdownDate = new Date(element.getAttribute('data-date')).getTime();

            const interval = setInterval(function() {
                const now = new Date().getTime();
                const distance = countdownDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (distance < 0) {
                    clearInterval(interval);
                    element.innerHTML = "Waktu telah berlalu!";
                } else {
                    element.innerHTML = days + " hari " + hours + " jam " + minutes + " menit " + seconds +
                        " detik";
                }
            }, 1000);
        });
    </script>



</body>

</html>
