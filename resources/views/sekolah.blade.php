<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Galeri Sekolah Madrasah Assalaam memuat dokumentasi kegiatan belajar mengajar, ekstrakurikuler, dan berbagai acara penting di sekolah.">
    <meta name="keywords" content="galeri sekolah, kegiatan sekolah, madrasah Assalaam, dokumentasi sekolah, pendidikan berkualitas">
    <meta name="author" content="Madrasah Assalaam">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MA-PPQ ASSALAAM</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon/logo.png') }}" type="image/x-icon">

    <link href="" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css">
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ai.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/modal.css') }}">
</head>

<body>


    {{-- navbar --}}
    @include('include.frontend.navbarr')
    {{-- end navbar --}}
    <br>
    <br>
    <br>
    <br>
    <br>

    <h2 class="text-center mb-5 mt-5">Galeri Kegiatan Sekolah</h2>

    <div class="api-container mb-5">
        @foreach ($videos as $index => $video)
            <input type="radio" name="slider" id="item-{{ $index + 1 }}" {{ $index === 0 ? 'checked' : '' }}>
        @endforeach

        <div class="cards">
            @foreach ($videos as $index => $video)
                <label class="card" for="item-{{ $index + 1 }}" target="blank">
                    <iframe src="{{ $video['url'] }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </label>
            @endforeach
        </div>

        <div class="buttons">
            <button class="button left" id="prev"><i
                class="fa fa-arrow-left"></i></button>
            <button class="button right" id="next"><i
                class="fa fa-arrow-right"></i></button>
        </div>

        <div class="indicators">
            @foreach ($videos as $index => $video)
                <label for="item-{{ $index + 1 }}" class="indicator"></label>
            @endforeach
        </div>
    </div>


    <div class="galeri-container">
        <div class="row g-4 mb-3">
            @foreach ($sekolahFoto as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item position-relative overflow-hidden">
                        <img src="{{ Storage::url($data->media) }}" class="img-fluid w-100 gallery-img" alt="Kegiatan 1">
                        <!-- Deskripsi manual untuk setiap gambar -->
                        <div class="gallery-description position-absolute bottom-0 start-0 p-3 w-100">
                            <p class="text-white">{{ $data->description }}</p>
                        </div>
                        <div class="gallery-overlay d-flex align-items-center justify-content-center">
                            <button class="btn btn-light" data-toggle="modal" data-target="#galleryModal1{{ $data->id }}">
                                <i class="fas fa-eye"></i> <!-- Ikon mata (eye) -->
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk menampilkan gambar secara besar -->
                <div class="modal fade" id="galleryModal1{{ $data->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content" style="background: transparent; border: none;">
                            <div class="modal-body text-center">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                                <img src="{{ Storage::url($data->media) }}" class="img-fluid" alt="Kegiatan 1">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/caraousel.js') }}"></script>

</body>

</html>
