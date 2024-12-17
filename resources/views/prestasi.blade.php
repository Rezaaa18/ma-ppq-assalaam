<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Prestasi siswa Madrasah Assalaam mencakup bidang akademik, olahraga, seni, dan keagamaan, menunjukkan kualitas pendidikan yang unggul.">
    <meta name="keywords" content="prestasi siswa, madrasah Assalaam, prestasi akademik, prestasi olahraga, pendidikan unggul">
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
</head>

<body>
    @include('include.frontend.spinner')

    {{-- navbar --}}
    @include('include.frontend.navbarr')
    {{-- end navbar --}}


    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="achievement-container mt-5 mb-5">
        <div class="achievement-description">
            <h2>Siswa Berprestasi di Madrasah Assalaam</h2>
            <p>Siswa berprestasi adalah mereka yang berhasil menunjukkan kemampuan dan talenta di berbagai bidang.
                Mereka telah mengharumkan nama Madrasah Assalaam.</p>
        </div>

        <div class="achievement-section">
            @foreach ($bulanPrestasi as $bulan => $prestasis)
                <h2 class="month-title">
                   Prestasi Di Bulan {{ \Carbon\Carbon::parse($bulan . '-01')->translatedFormat('F Y') }}
                </h2>

                <div class="achievement-grid mb-5">
                    @foreach ($prestasis as $data)
                        <div class="achievement-card">
                            <img src="{{ asset('image/prestasi/' . $data->image) }}" alt="Prestasi Siswa">
                            <h3>{{ $data->judul }}</h3>
                            <p>{!! $data->keterangan !!}</p>
                            <span class="date">{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</span>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $pagination->links('pagination::bootstrap-4') }}
    </div>

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
</body>

</html>
