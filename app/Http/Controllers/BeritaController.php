<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input pencarian dari query string
        $search = $request->get('search');

        // Query berita
        $berita = Berita::query();

        // Jika ada input pencarian, filter berita
        if ($search) {
            $berita->where('judul', 'like', "%{$search}%")
                ->orWhere('isi', 'like', "%{$search}%");
        }

        // Ambil berita terbaru dengan pagination
        $berita = $berita->latest()->paginate(10);

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');

        return view('backend.berita.berita', compact('berita'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $berita = Berita::all();
        return view('backend.berita.create', compact('berita'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'isi' => 'required',
            'tanggal' => 'required',
        ],[
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'isi.required' => 'Bagian isi tidak boleh kosong',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;

        $slug = Str::slug($request->judul);
        $randomString = Str::random(5);
        $uniqueSlug = $slug . '-' . $randomString;
        $berita->slug = $uniqueSlug;

        $berita->penulis = $request->penulis;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal;
        // upload foto
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/berita/', $name);
            $berita->image = $name;
        }
        $berita->save();

        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.berita.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('backend.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('backend.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,webp|max:2048',
            'isi' => 'required',
            'tanggal' => 'required',
        ],[
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'isi.required' => 'Bagian isi tidak boleh kosong',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);

        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita->judul = $request->judul;

        $slug = Str::slug($request->judul);
        $randomString = Str::random(5);
        $uniqueSlug = $slug . '-' . $randomString;
        $berita->slug = $uniqueSlug;

        $berita->penulis = $request->penulis;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal;
        if ($request->hasFile('image')) {
            $berita->deleteImage(); //untuk hapus gambarr sebelum diganti gambar baru
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/berita/', $name);
            $berita->image = $name;
        }
        $berita->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.berita.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->deleteImage();
        $berita->delete();

        toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.berita.index')->with('success', 'data berhasil dihapus!');
    }
}
