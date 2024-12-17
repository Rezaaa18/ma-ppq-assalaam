<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Agenda Madrasah Assalaam berisi kegiatan terkini yang melibatkan siswa, guru, dan masyarakat untuk mendukung pembelajaran dan pengembangan karakter.">
    <meta name="keywords" content="agenda madrasah, kegiatan madrasah, madrasah Assalaam, acara sekolah Islam, pendidikan Islam">
    <meta name="author" content="Madrasah Assalaam">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MA-PPQ ASSALAAM</title>

    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon/logo.png') }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css">
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/ai.css') }}">


</style>
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
    <br>
    <div class="container agenda-section mb-5 mt-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp mt-2" style="max-width: 800px;">
            <h2 class="display-7 mb-5">AGENDA MADRASAH</h2>
        </div>

        <!-- Bagian Kalender -->
        <div id="calendar"></div>
    </div>



</body>

</html>

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: @json($events), // Menggunakan data events dari controller
        eventClick: function(info) {
            // Sesuaikan tampilan event
            alert(info.event.title + "\n" + info.event.extendedProps.description);
        },
        headerToolbar: {
            left: 'prevYear,prev,next,nextYear today', // Menambahkan tombol untuk tahun
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        customButtons: {
            prevYear: {
                text: '<< Tahun Sebelumnya',
                click: function() {
                    calendar.incrementDate({ years: -1 }); // Menggeser 1 tahun ke belakang
                }
            },
            nextYear: {
                text: 'Tahun Berikutnya >>',
                click: function() {
                    calendar.incrementDate({ years: 1 }); // Menggeser 1 tahun ke depan
                }
            }
        },
    });
    calendar.render();
});

</script>
</body>

</html>
