<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MA-PPQ ASSALAAM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Guru-guru Madrasah Assalaam adalah tenaga pendidik profesional yang berdedikasi dalam membimbing siswa menuju prestasi akademik dan akhlak mulia.">
    <meta name="keywords" content="guru madrasah, pendidik Islam, madrasah Assalaam, tenaga pengajar terbaik, pendidikan Islam">
    <meta name="author" content="Madrasah Assalaam">


    <!-- Favicon -->
    <link href="{{ asset('frontend/img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/lib/animate/animate.min.css') }}">
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/ai.css') }}">
    <style>
        /* Latar belakang penuh */
        .teacher-background {
            background: linear-gradient(to bottom right, #f8f9fa, #c8d6e5);
            /* Gradasi abu-abu lembut */
            position: relative;
            overflow: hidden;
            /* Agar dekorasi tidak keluar */
            min-height: 100vh;
            /* Tinggi minimal 100% dari viewport */
            padding: 80px 0;
            /* Tambahkan jarak */
        }

        /* Dekorasi gelombang */
        .teacher-background::before,
        .teacher-background::after {
            content: '';
            position: absolute;
            width: 150%;
            height: 200px;
            /* Tinggi diperbesar */
            background: #a0d2eb;
            /* Warna biru pastel */
            border-radius: 50%;
            transform: rotate(-5deg);
        }

        /* Gelombang atas */
        .teacher-background::before {
            top: -100px;
            /* Posisikan lebih ke atas */
            left: -30%;
            /* Pastikan memenuhi layar */
            clip-path: ellipse(60% 100% at 50% 0%);
        }

        /* Gelombang bawah */
        .teacher-background::after {
            bottom: -100px;
            /* Posisikan lebih ke bawah */
            right: -30%;
            /* Pastikan memenuhi layar */
            clip-path: ellipse(60% 100% at 50% 100%);
        }

        /* Responsif */
        @media (max-width: 768px) {

            .teacher-background::before,
            .teacher-background::after {
                width: 200%;
                /* Perbesar gelombang untuk layar kecil */
                height: 150px;
            }
        }


        /* Gambar guru */
        .teacher-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            z-index: 2;
            position: relative;
        }

        /* Judul */
        .teacher-title {
            font-size: 36px;
            font-weight: 700;
            color: #2c3e50;
            /* Warna abu-abu gelap */
            margin-bottom: 20px;
            z-index: 2;
            position: relative;
        }

        /* Deskripsi */
        .teacher-description {
            font-size: 18px;
            color: #5d6d7e;
            /* Warna abu-abu medium */
            line-height: 1.8;
            z-index: 2;
            position: relative;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .teacher-title {
                font-size: 28px;
            }

            .teacher-description {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    @include('include.frontend.spinner')
    {{-- navbar --}}
    {{-- end navbar --}}
    @include('include.frontend.navbarr')

    <header class="teacher-header">
        <div class="teacher-background">
            <div class="container py-5">
                <div class="row align-items-center">
                    <!-- Gambar di sebelah kanan -->
                    <div class="col-lg-6 order-lg-2 text-center">
                        <img src="https://mdec.my/static/images/malaysiadigital/apply/MD-eligibility-criteria.png"
                            alt="Ilustrasi Guru" class="teacher-image">
                    </div>
                    <!-- Teks di sebelah kiri -->
                    <div class="col-lg-6 order-lg-1 text-start">
                        <h1 class="teacher-title">Guru Madrasah Aliyah Assalaam</h1>
                        <p class="teacher-description">
                            Para guru kami adalah pendidik profesional yang berdedikasi untuk membentuk generasi
                            yang cerdas, berintegritas, dan berbudi pekerti luhur. Dengan pengalaman dan kompetensi
                            yang tinggi, mereka memandu siswa menuju kesuksesan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <div class="container-fluid team pb-5 mt-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h2 class="display-7 mb-5">STRUKTURAL</h2>
            </div>
            <h4 class="text-primary">Kepala Sekolah</h4>
            <div class="row g-4">
                @if ($kepalaSekolah)
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card shadow-sm">
                            <img src="{{ Storage::url($kepalaSekolah->foto) }}" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">{{ $kepalaSekolah->nama }}</h5>
                                <p class="card-text">{{ $kepalaSekolah->status }}</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="btn btn-outline-primary btn-sm"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Kepala sekolah tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>


    <!-- Team Start -->
    <div class="container-fluid team pb-5 mt-5">
        <div class="container pb-5">
            <h4 class="text-primary">Guru</h4>
            <div class="row g-4">
                @foreach ($guru as $item)
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card shadow-sm">
                            <img src="{{ Storage::url($item->foto) }}" class="card-img-top"
                                alt="Guru {{ $item->nama }}">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->status }}</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="btn btn-outline-primary btn-sm"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $guru->links('pagination::bootstrap-4', ['class' => 'pagination-custom']) }}
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Team Start -->
    @if ($staff->isNotEmpty())
        <div class="container-fluid team pb-5 mt-5">
            <div class="container pb-5">
                <h4 class="text-primary">Staff</h4>
                <div class="row g-4">
                    @foreach ($karyawan as $item)
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="card shadow-sm">
                                {{-- <img src="{{ Storage::url($item->foto) }}" class="card-img-top"
                                    alt="MOCH RISMAN N, S.PD"> --}}
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1">{{ $item->nama }}</h5>
                                    <p class="card-text">{{ $item->status }}</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                                class="fab fa-twitter"></i></a>
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                                class="fab fa-linkedin-in"></i></a>
                                        <a href="#" class="btn btn-outline-primary btn-sm"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Team End -->

    <!-- Team Start -->
    @if ($karyawan->isNotEmpty())
        <div class="container-fluid team pb-5 mt-5">
            <div class="container pb-5">
                <h4 class="text-primary">Karyawan</h4>
                <div class="row g-4">
                    @foreach ($karyawan as $item)
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="card shadow-sm">
                                <img src="{{ Storage::url($item->foto) }}" class="card-img-top"
                                    alt="MOCH RISMAN N, S.PD">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1">{{ $item->nama }}</h5>
                                    <p class="card-text">{{ $item->status }}</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                                class="fab fa-twitter"></i></a>
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i
                                                class="fab fa-linkedin-in"></i></a>
                                        <a href="#" class="btn btn-outline-primary btn-sm"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Team End -->

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
