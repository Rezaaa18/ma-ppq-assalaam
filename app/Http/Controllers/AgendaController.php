<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        // Mengambil dan memfilter agenda
        $agenda = Agenda::when($search, function($query) use ($search) {
                return $query->where('judul', 'like', "%{$search}%")
                            ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->orderBy('tanggal_mulai')
            ->latest()
            ->get()
            ->map(function($item) {
                // Status dinamis sudah ada di model
                return $item;
            });

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.agenda.agenda', compact('agenda'));
    }

    public function create()
    {
        $agenda = Agenda::all();
        return view('backend.agenda.create', compact('agenda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tempat' => 'nullable|string|max:255',
        ], [
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'tempat.max' => 'Ukuran tempat acara tidak boleh lebih dari 255 karakter',
            'deskripsi.max' => 'Ukuran deskripsi tidak boleh lebih dari 255 karakter',
            'judul.required' => 'Judul harus diisi',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi',
        ]);
        $this->updateStatuses();
        $agenda = new Agenda();
        $agenda->judul = $request->judul;

        $slug = Str::slug($request->judul);
        $randomString = Str::random(5);
        $uniqueSlug = $slug . '-' . $randomString;
        $agenda->slug = $uniqueSlug;

        $agenda->deskripsi = $request->deskripsi;
        $agenda->tanggal_mulai = $request->tanggal_mulai;
        $agenda->tanggal_selesai = $request->tanggal_selesai;
        $agenda->tempat = $request->tempat;

        $currentDate = now()->startOfDay();
        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);

        if ($tanggalMulai > $currentDate) {
            $agenda->status = 'akan datang';
            $agenda->save();
        } elseif ($tanggalMulai <= $currentDate && $tanggalSelesai >= $currentDate) {
            $agenda->status = 'sedang dilaksanakan';
            $agenda->save();
        } else {
            $agenda->status = 'selesai dilaksanakan';
            $agenda->save();
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/agenda/', $name);
            $agenda->image = $name;
        }

        $agenda->save();

        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.agenda.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $agenda = Agenda::where('slug', $slug)->firstOrFail();
        return view('backend.agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $agenda = Agenda::where('slug', $slug)->firstOrFail();
        return view('backend.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tempat' => 'nullable|string|max:255',
        ],[
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'tempat.max' => 'Ukuran tempat acara tidak boleh lebih dari 255 karakter',
            'deskripsi.max' => 'Ukuran deskripsi tidak boleh lebih dari 255 karakter',
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'image.required' => 'Gambar harus diisi',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi',
            'tempat.max' => 'Ukuran tempat acara tidak boleh lebih dari 255 karakter',
        ]);

        $agenda = Agenda::where('slug', $slug)->firstOrFail();
        $agenda->judul = $request->judul;

        $slug = Str::slug($request->judul);
        $randomString = Str::random(5);
        $uniqueSlug = $slug . '-' . $randomString;
        $agenda->slug = $uniqueSlug;

        $agenda->deskripsi = $request->deskripsi;
        $agenda->tanggal_mulai = $request->tanggal_mulai;
        $agenda->tanggal_selesai = $request->tanggal_selesai;
        $agenda->tempat = $request->tempat;
        if ($request->hasFile('image')) {
            $agenda->deleteImage();
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/agenda/', $name);
            $agenda->image = $name;
        }
        $agenda->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->deleteImage();
        $agenda->delete();
        toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.agenda.index');
    }


    public function updateStatuses()
    {
        $currentDate = Carbon::now()->startOfDay();

        // Ambil semua agenda
        Agenda::where('tanggal_mulai', '>', now()->startOfDay())->update(['status' => 'akan datang']);
        Agenda::where('tanggal_mulai', '<=', now()->startOfDay())
              ->where('tanggal_selesai', '>=', now()->startOfDay())
              ->update(['status' => 'sedang dilaksanakan']);
        Agenda::where('tanggal_selesai', '<', now()->startOfDay())->update(['status' => 'selesai dilaksanakan']);

        return response()->json(['message' => 'Status agenda berhasil diperbarui.']);
    }
}
