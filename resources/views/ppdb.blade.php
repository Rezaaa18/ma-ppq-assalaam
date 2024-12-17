<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Penerimaan Peserta Didik Baru (PPDB) Madrasah Assalaam terbuka untuk siswa berprestasi yang ingin mendapatkan pendidikan Islam terbaik.">
    <meta name="keywords" content="PPDB, pendaftaran siswa baru, madrasah Assalaam, sekolah Islam terbaik, pendidikan Islam, PPDB madrasah">
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
    <style>
        /* Header Section dengan Latar Biru Laut */
        .header-section {
            background-color: #1E4C6B;
            /* Biru Laut */
            color: #fff;
            padding: 220px 30px;
        }

        .cartoon-image {
            max-width: 100%;
            height: auto;
            margin-top: -50px;
            animation: bounceIn 2s ease-out;
        }

        .title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: white;
        }

        .description {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        .btn-cta {
            background-color: green;
            /* Merah Bata */
            color: white;
            border: none;
            border-radius: 2rem;
            padding: 12px 24px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-cta:hover {
            background-color: gray;
            /* Merah Bata lebih gelap */
        }

        @keyframes bounceIn {
            0% {
                transform: translateY(-50%);
                opacity: 0;
            }

            50% {
                transform: translateY(0);
                opacity: 1;
            }

            100% {
                transform: translateY(-50%);
                opacity: 0;
            }
        }

        .content-section {
            margin-top: 20px;
            padding: 40px 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            background-color: #f4f8fb;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .call-to-action {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            /* Memusatkan konten */
        }

        .call-to-action h2 {
            color: #007b5e;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 2.5em;
            width: 100%;
            text-align: center;
            /* Pusatkan teks */
        }

        .call-to-action p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .call-to-action ul {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 20px;
        }

        .call-to-action ul li {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #333;
            line-height: 1.6;
        }

        .activities-images {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 20px;
        }

        .activities-images img {
            width: 80%;
            max-width: 500px;
            display: block;
            margin: 0 auto;
        }

        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .activities-images img {
            width: 80%;
            max-width: 500px;
            display: block;
            margin: 0 auto;
            animation: slideInFromLeft 1s ease-out;
        }

        /* Responsif untuk Tampilan Mobile */
        @media (max-width: 768px) {
            .content-section {
                flex-direction: column;
            }

            .activities-images {
                margin-left: 0;
            }
        }

        /* Section Styling */
        .promo-section {
            background: linear-gradient(135deg, #76c8f3, #eef5ff);
            position: relative;
            padding: 60px 20px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Decorative SVG Wave */
        .promo-section::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('https://www.svgrepo.com/show/33121/wave.svg') no-repeat bottom center;
            background-size: cover;
            opacity: 0.3;
            z-index: 0;
        }

        /* Image Styling */
        .promo-image {
            max-width: 100%;
            height: auto;
            z-index: 1;
            position: relative;
        }

        /* Text Styling */
        .text-container {
            z-index: 1;
            position: relative;
        }

        .promo-title {
            font-size: 3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .promo-title .highlight {
            background: linear-gradient(45deg, #ff7e5f, #feb47b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
        }

        .promo-description {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #444;
            margin-bottom: 20px;
        }

        /* Button Styling */
        .btn-container {
            display: flex;
            gap: 15px;
            z-index: 1;
        }

        .promo-btn img {
            width: 150px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .promo-btn img:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Decorative Radial Gradient */
        .promo-section::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 206, 128, 0.6), transparent);
            z-index: 0;
            filter: blur(50px);
        }
    </style>
</head>

<body>
    @include('include.frontend.spinner')

    {{-- navbar --}}
    @include('include.frontend.navbarr')
    {{-- end navbar --}}





    <!-- Header Sambutan -->
    <header class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="https://ppdb.smkassalaambandung.sch.id/images/hero-3-img.png" alt="Kartun PPDB"
                        class="cartoon-image">
                </div>
                <div class="col-md-6">
                    <h1 class="title">Selamat Datang di PPDB Madrasah Aliyah Assalaam</h1>
                    <p class="description">Bergabunglah bersama kami dalam menuntut ilmu di Madrasah, tempat pendidikan
                        dengan nilai-nilai keislaman yang kental. PPDB dibuka untuk tahun ajaran baru, segera daftarkan
                        diri Anda!</p>
                    <a href="https://tally.so/r/wM5pY8" target="blank"><button class="btn-cta">Daftar Sekarang</button></a>
                    <a href="https://wa.me/6285946863319?text=Assalamualaikum...%20" target="_blank"><button class="btn-cta"><i class="fas fa-phone me-2" target="_blank"></i> Informasi Lebih Lanjut</button></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Keunggulan Madrasah -->
    <div class="container content-section mt-5 mb-5">
        <div class="call-to-action">
            <h2>Keunggulan Madrasah Kami</h2>
            <p>Kami memiliki program unggulan yang dirancang untuk membantu siswa berkembang secara akademik dan
                karakter. Program ini meliputi pengajaran yang interaktif, fasilitas yang lengkap, dan pendampingan yang
                personal bagi setiap siswa.</p>

            <ul>
                <li><strong>Pendidikan Berkualitas</strong> dengan pengajaran yang terstruktur dan modern.</li>
                <li><strong>Lingkungan Islami</strong> yang mendukung pengembangan karakter berdasarkan nilai-nilai
                    agama.</li>
                <li><strong>Fasilitas Lengkap</strong> untuk mendukung kegiatan belajar mengajar dan ekstrakurikuler.
                </li>
                <li><strong>Pengajaran Tahfiz Al-Qur'an</strong> untuk membentuk generasi Qur'ani.</li>
            </ul>
        </div>

        <!-- Gambar Keunggulan -->
        <div class="activities-images">
            <img src="{{ asset('frontend/img/santri1.png') }}" alt="Keunggulan Madrasah">
        </div>
    </div>

    <div class="promo-section mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/img/promo-removebg-preview.png') }}" alt="Kartun Aplikasi"
                        class="promo-image ml-5">
                </div>
                <div class="col-md-6 text-container">
                    <h1 class="promo-title">
                        Unduh <span class="highlight">SIM Assalaam</span>
                    </h1>
                    <p class="promo-description">
                        Dapatkan kemudahan akses informasi, jadwal, dan layanan PPDB langsung di aplikasi resmi kami.
                        Unduh sekarang dan nikmati pengalaman yang lebih praktis!
                    </p>
                    <div class="btn-container">
                        <a href="https://apps.apple.com/id/app/sim-assalaam/id1586757657" target="_blank" class="promo-btn">
                            <img src="{{ asset('frontend/img/iphone.png') }}" alt="Google Play Store" class="icon">
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.sim.app.yayasan&pcampaignid=web_share" target="_blank" class="promo-btn">
                            <img src="{{ asset('frontend/img/icon2-removebg-preview.png ') }}" alt="Apple App Store"
                                class="icon">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Informasi Sambutan dan Kegiatan -->



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
