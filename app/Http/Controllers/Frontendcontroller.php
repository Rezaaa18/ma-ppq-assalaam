<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Galeri;
use App\Models\KategoriFasilitas;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Sejarah;
use App\Models\Struktural;
use App\Models\Visi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Frontendcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function berita()
    {
        $berita = Berita::latest()->paginate(6);
        return view('artikel.index', compact('berita'));
    }

    public function showBerita(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('artikel.show', compact('berita'));
    }

    public function welcome()
    {
        Agenda::updateStatuses();
        $beritaWelcome = Berita::take(3)->latest()->get();
        $agendaWelcome = Agenda::where('status', 'akan datang')->take(3)->get();
        $pengumumanWelcome = Pengumuman::take(1)->get();
        $sejarah = Sejarah::latest()->get();

        return view('welcome', compact('beritaWelcome', 'agendaWelcome', 'sejarah','pengumumanWelcome'));
    }

    public function agenda()
    {
        Agenda::updateStatuses();
        $agendaAkanDatang = Agenda::where('status', 'akan datang')->latest()->get();
        $agendaSedangDilaksanakan = Agenda::where('status', 'sedang dilaksanakan')->latest()->get();
        $agendaSelesaiDilaksanakan = Agenda::where('status', 'selesai dilaksanakan')->latest()->get();

        // Gabungkan semua agenda dan buat data event untuk FullCalendar
        $events = collect($agendaAkanDatang)
            ->merge($agendaSedangDilaksanakan)
            ->merge($agendaSelesaiDilaksanakan)
            ->map(function ($agenda) {
                return [
                    'title' => $agenda->judul,
                    'start' => Carbon::parse($agenda->tanggal_mulai)->format('Y-m-d'),
                    'end' => $agenda->tanggal_selesai
                    ? Carbon::parse($agenda->tanggal_selesai)->addDay()->format('Y-m-d')
                    : Carbon::parse($agenda->tanggal_mulai)->format('Y-m-d'),
                    'description' => $agenda->deskripsi,
                    'backgroundColor' => $this->getStatusColor($agenda->status)['background'], // Warna latar belakang
                    'textColor' => '#FFFFFF', // Warna teks putih agar lebih jelas
                    'borderColor' => '#000000', // Garis hitam di sekitar event
                    'allDay' => true, // Event berlangsung seharian
                ];
            });

        return view('agenda', ['events' => $events]);
    }

    // Fungsi tambahan untuk menentukan warna berdasarkan status agenda
    private function getStatusColor($status)
    {
        switch ($status) {
            case 'akan datang':
                return ['background' => '#ffc107']; // Warna kuning untuk "Segera Datang"
            case 'sedang dilaksanakan':
                return ['background' => '#28a745']; // Warna hijau untuk "Sedang Dilaksanakan"
            case 'selesai dilaksanakan':
                return ['background' => '#6c757d']; // Warna abu-abu untuk "Telah Selesai"
            default:
                return ['background' => '#007bff']; // Warna biru untuk status lainnya
        }
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('pengumuman', compact('pengumuman'));
    }

    public function prestasi()
    {
        // Ambil data prestasi dan urutkan berdasarkan tanggal
        $prestasi = Prestasi::select('judul', 'keterangan', 'tanggal', 'image')
            ->orderBy('tanggal', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->tanggal)->format('Y-m');
            });

        // Paginate hasil dengan membagi data per 4 bulan
        $bulanPrestasi = $prestasi->forPage(request()->input('page', 1), 3); // Membagi data per 3 bulan per halaman

        // Membuat pagination manual
        $pagination = new \Illuminate\Pagination\LengthAwarePaginator(
            $bulanPrestasi,
            $prestasi->count(),
            3, // 4 bulan per halaman
            request()->input('page', 1),
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('prestasi', compact('bulanPrestasi', 'pagination'));
    }

    public function galeriKepesantrenan()
    {
        $kepesantrenanFoto = Galeri::where('jenis_kegiatan','Kepesantrenan')->latest()->get();
        $kepesantrenanVideo = Galeri::latest()->get();

        $apiKey = 'AIzaSyDoSmppg-G6gCul9QK_UMwha-oM7K5pBR8'; // API Key YouTube
        $channelId = 'UC0p7IBRCVkT6C-2Mfhn9OeA'; // ID Channel YouTube
        $maxResultsPerRequest = 50; // Maksimal per permintaan
        $totalVideosToFetch = 10; // Total video yang diambil
        $videos = [];
        $nextPageToken = null;

        do {
            $response = Http::get("https://www.googleapis.com/youtube/v3/search", [
                'key' => $apiKey,
                'channelId' => $channelId,
                'part' => 'snippet',
                'order' => 'date',
                'maxResults' => $maxResultsPerRequest,
                'type' => 'video', // Hanya mengambil video reguler
                'pageToken' => $nextPageToken,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data['items'] as $item) {
                    if (isset($item['id']['videoId']) && count($videos) < $totalVideosToFetch) {
                        $videos[] = [
                            'id' => $item['id']['videoId'],
                            'title' => $item['snippet']['title'],
                            'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
                            'url' => "https://www.youtube.com/embed/" . $item['id']['videoId'],
                        ];
                    }
                }

                // Hentikan loop jika sudah cukup video
                if (count($videos) >= $totalVideosToFetch) {
                    break;
                }

                // Update token untuk mengambil halaman berikutnya
                $nextPageToken = $data['nextPageToken'] ?? null;
            } else {
                break; // Keluar jika ada masalah dengan response
            }
        } while ($nextPageToken);

        return view('kepesantrenan', compact('kepesantrenanFoto', 'kepesantrenanVideo', 'videos'));
    }


    public function galeriSekolah()
    {
        $sekolahFoto = Galeri::where('jenis_kegiatan','Sekolah')->latest()->get();
        $sekolahVideo = Galeri::latest()->get();
        $apiKey = 'AIzaSyDoSmppg-G6gCul9QK_UMwha-oM7K5pBR8'; // API Key YouTube
        $channelId = 'UC0p7IBRCVkT6C-2Mfhn9OeA'; // ID Channel YouTube
        $maxResultsPerRequest = 50; // Maksimal per permintaan
        $totalVideosToFetch = 10; // Total video yang diambil
        $videos = [];
        $nextPageToken = null;

        do {
            $response = Http::get("https://www.googleapis.com/youtube/v3/search", [
                'key' => $apiKey,
                'channelId' => $channelId,
                'part' => 'snippet',
                'order' => 'date',
                'maxResults' => $maxResultsPerRequest,
                'type' => 'video', // Hanya mengambil video reguler
                'pageToken' => $nextPageToken,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data['items'] as $item) {
                    if (isset($item['id']['videoId']) && count($videos) < $totalVideosToFetch) {
                        $videos[] = [
                            'id' => $item['id']['videoId'],
                            'title' => $item['snippet']['title'],
                            'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
                            'url' => "https://www.youtube.com/embed/" . $item['id']['videoId'],
                        ];
                    }
                }

                // Hentikan loop jika sudah cukup video
                if (count($videos) >= $totalVideosToFetch) {
                    break;
                }

                // Update token untuk mengambil halaman berikutnya
                $nextPageToken = $data['nextPageToken'] ?? null;
            } else {
                break; // Keluar jika ada masalah dengan response
            }
        } while ($nextPageToken);

        return view('sekolah', compact('sekolahFoto', 'sekolahVideo', 'videos'));
    }

    public function fasilitas()
    {
        $fasilitas = Fasilitas::latest()->get();
        $kategoriFasilitas = KategoriFasilitas::latest()->get();

        return view('fasilitas', compact('fasilitas', 'kategoriFasilitas'));
    }

    public function visi_misi()
    {
        $visi_misi = Visi::get();
        return view('visi_misi', compact('visi_misi'));
    }

    public function struktural()
    {
        $kepalaSekolah = Struktural::where('id_jabatan', '1')->first();
        $struktural = Struktural::latest()->paginate(8);

        return view('guru', compact('kepalaSekolah', 'struktural'));
    }

}
