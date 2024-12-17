<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        // Mengambil dan memfilter prestasi
        $prestasi = Prestasi::when($search, function($query) use ($search) {
                return $query->where('judul', 'like', "%{$search}%")
                            ->orWhere('keterangan', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('backend.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'tanggal' => 'required|date',
        ],[
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'judul.required' => 'Judul harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'image.required' => 'Gambar harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);

        $prestasi = new Prestasi();
        $prestasi->judul = $request->judul;
        $prestasi->slug = Str::slug($request->judul);
        $prestasi->keterangan = $request->keterangan;
        $prestasi->tanggal = $request->tanggal;
        // upload foto
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/prestasi/', $name);
            $prestasi->image = $name;
        }
        $prestasi->save();

        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.prestasi.index');
    }

    public function edit($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->firstOrFail();
        return view('backend.prestasi.edit', compact('prestasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ],[
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'judul.required' => 'Judul harus diisi',
            'image.required' => 'Gambar harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);

        $prestasi = Prestasi::where('slug', $slug)->firstOrFail();
        $prestasi->judul = $request->judul;
        $prestasi->slug = Str::slug($request->judul);
        $prestasi->keterangan = $request->keterangan;
        $prestasi->tanggal = $request->tanggal;
        if ($request->hasFile('image')) {
            $prestasi->deleteImage(); //untuk hapus gambarr sebelum diganti gambar baru
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/prestasi/', $name);
            $prestasi->image = $name;
        }
        $prestasi->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.prestasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->deleteImage();
        $prestasi->delete();
        toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.prestasi.index');
    }
}
