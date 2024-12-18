<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Meta Tags untuk SEO -->
    <meta name="description" content="Madrasah Assalaam adalah institusi pendidikan Islam yang menawarkan program berkualitas untuk mencetak generasi unggul.">
    <meta name="keywords" content="madrasah, pendidikan Islam, madrasah terbaik, madrasah Assalaam, sekolah Islam">
    <meta name="author" content="Madrasah Assalaam">

    <!-- Title Tag -->
    <title>Madrasah Assalaam - Pendidikan Islam Berkualitas</title>

    <!-- Canonical Tag -->
    <link rel="canonical" href="https://ma-assalaam.sch.id/">

    <!-- Open Graph Tags untuk Social Media -->
    <meta property="og:title" content="Madrasah Assalaam - Pendidikan Islam Berkualitas">
    <meta property="og:description" content="Madrasah Assalaam menawarkan program pendidikan berkualitas untuk mencetak generasi unggul dengan nilai-nilai Islam.">
    <meta property="og:image" content="https://ma-assalaam.sch.id/images/logo.png">
    <meta property="og:url" content="https://ma-assalaam.sch.id/">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Madrasah Assalaam - Pendidikan Islam Berkualitas">
    <meta name="twitter:description" content="Madrasah Assalaam menawarkan program pendidikan berkualitas untuk mencetak generasi unggul dengan nilai-nilai Islam.">
    <meta name="twitter:image" content="https://ma-assalaam.sch.id/images/logo.png">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/logo.png') }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> --}}

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/lib/animate/animate.min.css') }}">
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/ai.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/modal.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Gradient Background */
        .bg-gradient-santri {
            background: linear-gradient(135deg, #5cb85c, #8dc891);
            background-size: 95% 95%;
            background-position: center;
            background-repeat: no-repeat;
            padding: 0 20px;
            color: #fff;
            border-radius: 90px;
        }

        p.pengumuman {
            color: black !important;
        }

        .text-green {
            color: #2a6e2f;
        }

        .bg-krem {
            background-color: #f9f7f1;
        }

        .text-krem {
            color: #f9f7f1;
        }

        .text-krem-light {
            color: #faf9f3;
        }

        .btn-gradient-green {
            background: linear-gradient(90deg, #2a6e2f, #56ab56);
            border: none;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-gradient-green:hover {
            box-shadow: 0 8px 15px rgba(42, 110, 47, 0.4);
            transform: scale(1.05);
        }

        .icon-date {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            font-size: 1rem;
            display: inline-flex;
            text-align: center;
            line-height: 1.2;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<body>

    @include('include.frontend.spinner')


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        @include('include.frontend.navbarr')

        {{-- End Navbar --}}

        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <img src="{{ asset('frontend/img/kobong.jpg') }}" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row gy-0 gx-5">
                            <div class="col-lg-0 col-xl-5"></div>
                            <div class="col-xl-7 animated fadeInUp">
                                <div class="text-sm-center text-md-end">
                                    <h1 class="display-5 text-uppercase text-white mb-4">SELAMAT DATANG DI
                                        WEBSITE RESMI MADRASAH ALIYAH PONDOK PESANTREN ASSALAAM</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <img src="{{ asset('frontend/img/gedung.jpg') }}" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-12 animated fadeInUp">
                                <div class="text-center">
                                    <h1 class="display-5 text-uppercase text-white mb-4"> SELAMAT DATANG DI WEBSITE
                                        RESMI MADRASAH ALIYAH PONDOK PESANTREN ASSALAAM</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <img src="{{ asset('frontend/img/mosque.jpg') }}" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-12 animated fadeInUp">
                                <div class="text-start">
                                    <h1 class="display-5 text-uppercase text-white mb-4">
                                        SELAMAT DATANG DI WEBSITE RESMI MADRASAH ALIYAH PONDOK PESANTREN ASSALAAM
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->

    <!-- Sejarah Section Start -->
    <div class="container-fluid sejarah-section py-5">
        <div class="container py-5">
            <div class="row text-center mb-5">
                @foreach ($sejarah as $data)
                    <!-- Judul dengan animasi fadeInUp -->
                    <h3 class="sejarah-section-title display-5 text-gradient wow fadeInUp" data-wow-delay="0.1s">
                        {{ $data->title }}
                    </h3>
            </div>

            <!-- Section content -->
            <div class="row g-5 align-items-center">
                <!-- Gambar dengan modal -->
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="gallery-item position-relative overflow-hidden">
                        <img src="{{ Storage::url($data->image) }}" style="height: 550px"
                            class="img-fluid rounded-bottom w-100 gallery-img" alt="Sejarah Madrasah">
                        <!-- Ikon Mata untuk membuka modal -->
                        <div class="gallery-overlay d-flex align-items-center justify-content-center">
                            <button class="btn btn-light" data-toggle="modal"
                                data-target="#sejarahModal{{ $data->id }}">
                                <i class="fas fa-eye"></i> <!-- Ikon mata -->
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Konten Sejarah -->
                <div class="col-xl-6 wow fadeInLeft enhanced-content" data-wow-delay="0.3s">
                    <div class="content-container text-light justify-text">
                        <p class="mb-0 text-light">
                            <b>{{ $data->sejarah }}</b>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal untuk Sejarah -->
    @foreach ($sejarah as $data)
        <div class="modal fade" id="sejarahModal{{ $data->id }}" tabindex="-1" role="dialog"
            aria-labelledby="sejarahModalLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" style="background: transparent; border: none;">
                    <div class="modal-body text-center">
                        <!-- Tombol untuk menutup modal -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                        <!-- Gambar di modal -->
                        <img src="{{ Storage::url($data->image) }}" class="img-fluid" alt="Sejarah Madrasah">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Sejarah Section End -->

    {{-- start Pengumuman --}}
    <!-- Judul Utama -->
    <div class="text-center mb-5 mt-5">
        <h1 class="display-3 text-dark">Pengumuman Terbaru MA Assalaam</h1>
        <p class="fs-5 text-dark opacity-75">
            Pengumuman Resmi Madrasah Aliyah Jangan Lewatkan
        </p>
    </div>
    <div class="container-fluid announcement-section py-5 bg-gradient-santri mb-5 mt-5 ">
        <div class="container">
            <!-- Konten Utama -->
            <div class="row align-items-center g-5">
                <!-- Detail Pengumuman -->
                @foreach ($pengumumanWelcome as $data)
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="bg-white p-5 rounded shadow-lg position-relative">
                            <!-- Judul Pengumuman -->
                            <h2 class="fw-bold text-green mb-4">
                                {{ $data->judul }}
                            </h2>

                            <!-- Deskripsi -->
                            <div class="text-dark">
                                <p class="pengumuman fs-5 text-dark mb-4">
                                    {!! $data->deskripsi !!}
                                </p>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ url('pengumuman') }}"
                                    class="btn btn-gradient-green py-3 px-5 fs-5 shadow-lg">
                                    Lihat Selengkapnya
                                </a>

                                <!-- Tanggal -->
                                <div
                                    class="icon-date bg-krem text-green fw-bold d-flex align-items-center justify-content-center">
                                    {{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d F Y') }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-info-circle-fill text-green fs-4 me-3"></i>
                                <p class="mb-0 text-muted small">
                                    Informasi terbaru akan terus diperbarui secara berkala.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="position-relative overflow-hidden rounded shadow-lg">
                            <img src="{{ asset('image/pengumuman/' . $data->image) }}" alt="Pengumuman Pesantren"
                                class="img-fluid rounded hover-zoom">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end Pengumuman --}}




    <!-- Berita Start -->
    <div class="container-fluid news-section py-5 bg-gradient-news text-white">
        <div class="container">
            <!-- Judul Utama -->
            <div class="text-center mb-5 mt-3">
                <h1 class="display-3 fw-bold text-light">Berita Terbaru</h1>
                <p class="fs-5 text-white">Informasi Terkini dari Madrasah Aliyah Assalaam</p>
            </div>

            <!-- Grid Berita -->
            <div class="row g-4">
                @foreach ($beritaWelcome as $data)
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
                                    {!! Str::limit($data->isi, 100, '...') !!}
                                </p>
                                <a href="{{ route('berita.show', $data->slug) }}" class="btn btn-gradient-news">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mx-auto mt-5">
                <a class="btn btn-outline-light rounded-pill py-3 px-5" href="{{ route('berita.index') }}">Lihat
                    Semua Artikel</a>
            </div>
        </div>
    </div>
    {{-- end Berita --}}

    <div class="container agenda-section mb-5 mt-5">
        <h1 class="text-center mb-5">Agenda Kegiatan MA ASSALAAM BANDUNG</h1>

        <div class="row">
            @foreach ($agendaWelcome as $data)
                <div class="col-md-4 mt-4">
                    <div class="agenda-card">
                        @if ($data->image)
                            <img class="agenda-card-img img-fluid rounded-top"
                                src="{{ asset('image/agenda/' . $data->image) }}" alt="Agenda Image">
                        @endif
                        <div class="agenda-card-body">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <td class="agenda-label"><strong>Judul</strong></td>
                                    <td class="agenda-colon">:</td>
                                    <td class="agenda-value">{{ $loop->index + 1 }}. {{ $data->judul }}</td>
                                </tr>
                                <tr>
                                    <td class="agenda-label"><strong>Tanggal</strong></td>
                                    <td class="agenda-colon">:</td>
                                    <td class="agenda-value">{{ date('d M Y', strtotime($data->tanggal_mulai)) }}</td>
                                </tr>
                                @if ($data->tempat)
                                    <tr>
                                        <td class="agenda-label"><strong>Tempat</strong></td>
                                        <td class="agenda-colon">:</td>
                                        <td class="agenda-value">{{ $data->tempat }}</td>
                                    </tr>
                                @endif
                                @if ($data->deskripsi)
                                    <tr>
                                        <td class="agenda-label"><strong>Deskripsi</strong></td>
                                        <td class="agenda-colon">:</td>
                                        <td class="agenda-value">{!! Str::limit(strip_tags($data->deskripsi), 50, '...') !!}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="agenda-label"><strong>Status</strong></td>
                                    <td class="agenda-colon">:</td>
                                    <td class="agenda-value">
                                        <span class="badge">{{ ucfirst($data->status) }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('agenda') }}" class="btn btn-outline-primary">Lihat Semua Agenda</a>
        </div>
    </div>





    <!-- Section Visit Us Start -->
    <section>
        <div class="container-fluid no-padding" style="background-color: #ecf5fe;">
            <div class="row g-0 align-items-center">
                <!-- Google Map -->
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5774.139826763171!2d107.6536355!3d-7.0783545!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68eb7e5566b1bf%3A0xbee688f707934ef4!2sMadrasah%20Aliyah%20Assalaam!5e1!3m2!1sid!2sid!4v1727154362092!5m2!1sid!2sid"
                            width="100%" height="500" style="border:0; border-radius: 10px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- End Google Map -->

                <!-- Contact Info -->
                <div class="col-lg-5  text-dark py-5 px-4 wow fadeInLeft" data-wow-delay="0.3s"
                    style="border-radius: 0 10px 10px 0;">
                    <h2 class="display-5 mb-4">Visit Us</h2>
                    <p class="mb-4">You can know more about us by visiting the address below. Feel free to contact us
                        via phone or email for any inquiries.</p>

                    <!-- Address -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-map-marker-alt fa-2x text-dark me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0">Address</h5>
                            <p class="mb-0">Pinggirsari, Kec. Arjasari, Kab. Bandung</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="fa fa-phone-alt fa-2x text-dark me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0">Phone</h5>
                            <p class="mb-0">0857-9555-5803</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-envelope fa-2x text-dark me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0">Email</h5>
                            <p class="mb-0">info@MAassalaambandung</p>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="mt-5">
                        <h5 class="fw-bold mb-3">Follow Us</h5>
                        <div class="d-flex">
                            <a class="btn btn-outline-dark btn-sm-square rounded-circle me-3"
                                href="https://web.facebook.com/profile.php?id=100092602596854&ref=xav_ig_profile_web"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-dark btn-sm-square rounded-circle me-3"
                                href="https://www.tiktok.com/@maassalaam4?is_from_webapp=1&sender_device=pc"><i
                                    class="fab fa-tiktok"></i></a>
                            <a class="btn btn-outline-dark btn-sm-square rounded-circle me-3"
                                href="https://www.instagram.com/ma_ppq.assalaamarjasari/?igsh=MTl5c3Q3YzR5cjNuNg%3D%3D"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-dark btn-sm-square rounded-circle"
                                href="http://www.youtube.com/@maassalaamschool"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Contact Info -->
            </div>
        </div>
    </section>
    <!-- Section Visit Us End -->

    <!-- Testimonial End -->

    <!-- Footer Start -->
    @include('include.frontend.footer')
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- jQuery (one version) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Other JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- Memuat JavaScript Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
