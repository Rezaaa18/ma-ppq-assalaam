<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Visi dan Misi Madrasah Assalaam untuk mencetak generasi Islami yang unggul dan berakhlak mulia, siap menghadapi tantangan global.">
    <meta name="keywords" content="visi misi, madrasah Assalaam, pendidikan Islam, visi sekolah Islam, tujuan pendidikan Islam">
    <meta name="author" content="Madrasah Assalaam">

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


    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/ai.css')}}">
</head>

<body>
    @include('include.frontend.spinner')

    {{-- navbar --}}
    @include('include.frontend.navbarr')
    {{-- end navbar --}}
    <header class="vision-mission-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://bootstrapmade.com/content/demo/iLanding/assets/img/illustration-1.webp"
                        alt="Kartun PPDB" class="vision-image">
                </div>
                <div class="col-md-6 text-center">
                    <h1 class="vision-title">Visi & Misi Madrasah Aliyah Assalaam</h1>
                    <p class="vision-description">
                        Madrasah Aliyah Assalaam berkomitmen untuk menjadi lembaga pendidikan yang unggul,
                        mencetak generasi cerdas, religius, dan berakhlak mulia dengan menerapkan nilai-nilai
                        keislaman dalam setiap aspek pembelajaran.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section class="vision-mission-section mt-5 mb-5">
        <!-- Header -->
        <div class="mission-header">
            <h2 class="mission-title">
                <span class="title-symbol"></span> Visi dan Misi
            </h2>
        </div>
        <!-- Konten Visi dan Misi -->
        <div class="mission-content">
            @foreach ($visi_misi as $data)
                <div class="mission-item mb-5">
                    <h3 class="mission-subtitle">
                        <span class="subtitle-symbol">❖</span> {{ $data->title }}
                    </h3>
                    <p class="mission-description">
                        {!! $data->isi !!}
                    </p>
                </div>
            @endforeach
        </div>
    </section>








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
