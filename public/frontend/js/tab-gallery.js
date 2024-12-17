(function() {
    let links = document.querySelectorAll('.gallery-tabs button'); // Ambil semua link
    let imagesCollection = document.querySelectorAll('.image-container img'); // Ambil semua gambar

    function displayImages(album) {
        imagesCollection.forEach((image) => {
            if (image.dataset.album === album) {
                image.style.display = 'block'; // Tampilkan gambar yang sesuai
            } else {
                image.style.display = 'none'; // Sembunyikan gambar yang tidak sesuai
            }
        });
    }

    links.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault(); // Cegah perilaku default

            // Hapus kelas aktif dari semua link
            links.forEach((el) => el.classList.remove('active'));
            // Tambahkan kelas aktif ke link yang diklik
            link.classList.add('active');

            // Tampilkan gambar berdasarkan album yang dipilih
            displayImages(link.dataset.album);
        });
    });

    // Atur album default saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        displayImages('Masjid'); // Tampilkan gambar dari album Lapang secara default
    });
})();
