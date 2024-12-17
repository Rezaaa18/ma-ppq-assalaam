<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Madrasah Assalaam menyediakan fasilitas modern dan lengkap untuk mendukung proses pembelajaran dan pengembangan siswa secara optimal.">
    <meta name="keywords" content="fasilitas madrasah, fasilitas pendidikan, madrasah Assalaam, fasilitas sekolah Islam, pendidikan berkualitas">
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

    <div class="container-fluid bg-breadcrumb-fasilitas">
        <div class="container text-center py-5" style="max-width: 900px;">
        </div>
    </div>

    <div class="text-center mt-5">
        <h2>Ruang Inspirasi: Fasilitas yang Memikat untuk Pembelajaran</h2>
    </div>
    <div class="gallery-tabs">
        @foreach ($kategoriFasilitas as $item)
            <button data-album="{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</button>
        @endforeach
    </div>


    <div class="image-container mb-5">
        @foreach ($fasilitas as $data)
            <img class="effect-hover" src="{{ asset('image/fasilitas/' . $data->image) }}" alt=""
                data-album="{{ $data->kategoriFasilitas->nama_kategori }}" data-bs-toggle="modal"
                data-bs-target="#fasilitasModal" data-bs-whatever="{{ asset('image/fasilitas/' . $data->image) }}">
        @endforeach
    </div>

    <div class="modal fade" id="fasilitasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Fasilitas" class="img-fluid" id="modalImage">
                </div>
            </div>
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


    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/tab-gallery.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Ketika gambar di klik
            $('.effect-hover').on('click', function() {
                // Ambil URL gambar dari atribut data-bs-whatever
                var imageSrc = $(this).data('bs-whatever');
                // Set gambar modal dengan URL yang diambil
                $('#modalImage').attr('src', imageSrc);
                // Tambahkan kelas modal-open ke body untuk menonaktifkan scroll
            });

            // Ketika modal ditutup
            $('#fasilitasModal').on('hidden.bs.modal', function() {});
        });

        // active
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.gallery-tabs button');
            const images = document.querySelectorAll('.image-container img');
            const selectedCategory = localStorage.getItem('selectedCategory');

            // Atur kategori aktif dari localStorage
            if (selectedCategory) {
                activateCategory(selectedCategory);
            }

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const album = button.getAttribute('data-album');

                    // Simpan kategori terpilih ke localStorage
                    localStorage.setItem('selectedCategory', album);

                    // Aktifkan tombol dan filter gambar
                    activateCategory(album);
                });
            });

            function activateCategory(category) {
                // Atur tombol aktif
                buttons.forEach(button => {
                    button.classList.toggle('active', button.getAttribute('data-album') === category);
                });

                // Tampilkan hanya gambar yang sesuai
                images.forEach(image => {
                    image.style.display = image.getAttribute('data-album') === category ? 'block' : 'none';
                });
            }
        });
    </script>

</body>

</html>
