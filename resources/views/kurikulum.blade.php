<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kurikulum Madrasah Assalaam dirancang untuk mengintegrasikan ilmu pengetahuan umum dan nilai-nilai Islam, menciptakan lulusan yang berakhlak mulia dan kompeten.">
    <meta name="keywords" content="kurikulum madrasah, pendidikan Islam, kurikulum sekolah Islam, madrasah Assalaam, integrasi ilmu dan agama, kurikulum unggulan">
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
    <style>
        /* Gaya untuk header */
        .curriculum-header {
            background: linear-gradient(135deg, #e3f2fd, #00d084);
            /* Gradien biru lembut */
            padding: 50px 0;
            color: #333;
        }

        .curriculum-background {
            padding: 40px 0;
        }

        .curriculum-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #007b5e;
            /* Biru terang */
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .curriculum-description {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
        }

        .curriculum-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            /* Sedikit lengkung pada gambar */

        }


        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .curriculum-title {
                font-size: 2rem;
            }

            .curriculum-description {
                font-size: 1rem;
            }
        }

        .curriculum-details {
            background: linear-gradient(135deg, #f0f8ff, #dfe9f3);
            /* Gradien lembut biru */
            padding: 50px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #4a90e2;
            text-transform: uppercase;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .curriculum-card {
            background: white;
            padding: 30px 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
            transition: all 0.4s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .curriculum-card:hover {
            transform: scale(1.05);
            /* Sedikit membesar */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih besar */
        }

        .icon-wrapper {
            font-size: 3rem;
            color: #4a90e2;
            /* Warna ikon */
            margin-bottom: 15px;
            transition: 0.3s ease;
        }

        .curriculum-card:hover .icon-wrapper {
            color: #ff5a5f;
            /* Warna ikon saat hover */
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin: 10px 0;
            color: #333;
            background: linear-gradient(to right, #4a90e2, #ff5a5f);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
            line-height: 1.8;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            .curriculum-card {
                padding: 20px 15px;
            }

            .card-title {
                font-size: 1.4rem;
            }

            .card-text {
                font-size: 0.9rem;
            }
        }

        /* Gaya untuk section "curriculum-structure" */
        .curriculum-structure {
            background-color: #eef7fa;
            /* Biru sangat terang */
            color: #333;
        }

        .structure-title {
            font-size: 2rem;
            font-weight: 700;
            color: #007b5e;
            /* Biru gelap */
            margin-bottom: 10px;
        }

        .structure-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
        }

        .structure-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
            min-height: 300px;
        }

        .structure-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .structure-subtitle {
            font-size: 1.5rem;
            font-weight: 600;
            color: #007b5e;
            margin-bottom: 15px;
        }

        .structure-list {
            list-style-type: none;
            padding: 0;
            font-size: 1rem;
            color: #555;
        }

        .structure-list li {
            margin-bottom: 10px;
        }

        /* Gaya untuk section "curriculum-advantages" */
        .curriculum-advantages {
            background-color: #f9f9f9;
            /* Latar abu-abu terang */
            color: #333;
        }

        .advantages-title {
            font-size: 2rem;
            font-weight: bold;
            color: #007b5e;
            /* Biru lebih gelap */
            margin-bottom: 10px;
        }

        .advantages-description {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .advantage-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: 0.3s ease-in-out;
        }

        .advantage-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .advantage-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #007b5e;
            margin-bottom: 10px;
        }

        .advantage-text {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    @include('include.frontend.spinner')

    {{-- navbar --}}
    @include('include.frontend.navbarr')
    {{-- end navbar --}}
    <header class="curriculum-header">
        <div class="container-fluid curriculum-background">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2 text-center">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbNpnxBCMor4Ej2AuEKXOG9msqURsnYvPjXpAWknies8EW-JYGhEsANCU224sF63iEZaKwQf0A5P0G7oUQgHHoNPPOG2zS7kp6DSLKJ2QTPaHfUvldV1fQu09o1LtIFrr5dEZL-Q0-jsFArABOwWDwTjfCyNA9S1Tn5LjyM05i8K-GGQ7B4qiqh2mY4w/s900/komunitas-penggerak.png"
                            alt="Ilustrasi Kurikulum" class="curriculum-image">
                    </div>
                    <div class="col-lg-6 order-lg-1 text-start">
                        <h1 class="curriculum-title">Kurikulum Madrasah Aliyah Assalaam</h1>
                        <p class="curriculum-description">
                            Kurikulum kami mengintegrasikan nilai-nilai keislaman dengan ilmu pengetahuan modern,
                            menghasilkan generasi yang unggul, berakhlak mulia, dan kompetitif di tingkat global.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="curriculum-details py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="details-title">Detail Kurikulum</h2>
                    <p class="details-description">
                        Madrasah Aliyah Assalaam menawarkan kurikulum terpadu dengan fokus pada pendidikan agama Islam,
                        ilmu pengetahuan, dan keterampilan modern. Berikut adalah beberapa fitur utama kami:
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <img src="https://img.icons8.com/color/100/000000/open-book--v1.png" alt="Ikon Pendidikan"
                            class="feature-icon">
                        <h4 class="feature-title mt-3">Pendidikan Agama</h4>
                        <p class="feature-description">
                            Mengintegrasikan nilai-nilai keislaman dalam seluruh aspek pembelajaran.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <img src="https://img.icons8.com/color/100/000000/microscope.png" alt="Ikon Sains"
                            class="feature-icon">
                        <h4 class="feature-title mt-3">Ilmu Pengetahuan</h4>
                        <p class="feature-description">
                            Membekali siswa dengan dasar-dasar ilmu pengetahuan untuk masa depan.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <img src="https://img.icons8.com/color/100/000000/code.png" alt="Ikon Teknologi"
                            class="feature-icon">
                        <h4 class="feature-title mt-3">Teknologi & Keterampilan</h4>
                        <p class="feature-description">
                            Program keterampilan berbasis teknologi untuk kesiapan di era digital.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="curriculum-structure py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="structure-title">Struktur Kurikulum Unggulan</h2>
                    <p class="structure-description">
                        Madrasah Aliyah Assalaam menghadirkan struktur kurikulum yang holistik, mengintegrasikan tiga elemen utama:
                        spiritualitas, keunggulan akademik, dan penguasaan keterampilan praktis.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="structure-card p-4">
                        <h3 class="structure-subtitle">Spiritualitas Islami</h3>
                        <ul class="structure-list mt-3">
                            <li>Penguasaan Al-Qur'an dan Tajwid</li>
                            <li>Pemahaman Akidah dan Syariah</li>
                            <li>Pendidikan Akhlak Mulia</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="structure-card p-4">
                        <h3 class="structure-subtitle">Keunggulan Akademik</h3>
                        <ul class="structure-list mt-3">
                            <li>Pelajaran Matematika dan IPA</li>
                            <li>Kemampuan Bahasa Arab dan Inggris</li>
                            <li>Pendidikan Ilmu Sosial dan Budaya</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="structure-card p-4">
                        <h3 class="structure-subtitle">Keterampilan Hidup</h3>
                        <ul class="structure-list mt-3">
                            <li>Pengenalan Teknologi Modern</li>
                            <li>Pendidikan Kewirausahaan</li>
                            <li>Latihan Kepemimpinan dan Public Speaking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="curriculum-advantages py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="advantages-title">Keunggulan Kurikulum Kami</h2>
                    <p class="advantages-description">
                        Madrasah Aliyah Assalaam mengusung kurikulum yang memadukan nilai-nilai keislaman dengan ilmu pengetahuan modern, serta fokus pada pengembangan karakter dan keterampilan siswa untuk menghadapi tantangan global.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Kurikulum Terintegrasi</h3>
                        <p class="advantage-text">
                            Kami menggabungkan kurikulum nasional dengan sistem pembelajaran khas pesantren yang menekankan pendidikan akhlak dan keislaman, sehingga siswa tidak hanya unggul secara akademik tetapi juga memiliki karakter yang kuat.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Berbasis Karakter</h3>
                        <p class="advantage-text">
                            Penerapan kurikulum berbasis karakter bertujuan membentuk siswa yang memiliki nilai moral tinggi, integritas, dan rasa tanggung jawab terhadap masyarakat serta lingkungannya.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Peminatan MIPA</h3>
                        <p class="advantage-text">
                            Jurusan MIPA di Madrasah kami dirancang untuk memberikan pemahaman mendalam tentang sains dan matematika, dikombinasikan dengan pembelajaran kontekstual yang relevan dengan nilai-nilai Islami.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Lulusan Hafizh Qur'an</h3>
                        <p class="advantage-text">
                            Setiap siswa dididik untuk menjadi penghafal Al-Qur'an, dengan dukungan program tahfizh intensif yang terintegrasi dalam kegiatan harian sekolah.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Membaca Kitab Gundul</h3>
                        <p class="advantage-text">
                            Lulusan kami dibekali kemampuan membaca dan memahami kitab kuning, memperkuat dasar keilmuan Islam yang bermanfaat dalam berbagai aspek kehidupan.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Lancar Berbahasa Arab</h3>
                        <p class="advantage-text">
                            Dengan kurikulum khusus, siswa dilatih untuk mahir berbahasa Arab, baik secara lisan maupun tulisan, untuk mendukung pemahaman terhadap literatur Islam.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Perguruan Tinggi</h3>
                        <p class="advantage-text">
                            Lulusan kami terbukti berhasil diterima di berbagai perguruan tinggi ternama, baik dalam negeri maupun luar negeri, berkat kompetensi akademik dan non-akademik yang dimiliki.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="advantage-card">
                        <h3 class="advantage-title">Public Speaking</h3>
                        <p class="advantage-text">
                            Dengan pelatihan intensif, siswa mampu menguasai kemampuan berbicara di depan umum dengan percaya diri, mendukung mereka dalam berbagai aktivitas profesional maupun sosial.
                        </p>
                    </div>
                </div>
            </div>
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
