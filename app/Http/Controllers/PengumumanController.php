<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        // Mengambil dan memfilter pengumuman
        $pengumuman = Pengumuman::when($search, function($query) use ($search) {
                return $query->where('judul', 'like', "%{$search}%")
                            ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'tanggal' => 'nullable|date',
        ],[
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ]);

        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->judul;
        $pengumuman->slug = Str::slug($request->judul);
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->tanggal = $request->tanggal;
        // upload foto
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/pengumuman/', $name);
            $pengumuman->image = $name;
        }
        $pengumuman->save();

        toast('Data berhasil diupdate!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.pengumuman.index');
    }

    public function edit($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)->firstOrFail();
        return view('backend.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'tanggal' => 'nullable|date',
        ],[
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'image.mimes' => 'Format gambar harus png,jpg,jpeg,webp',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        $pengumuman = Pengumuman::where('slug', $slug)->firstOrFail();
        $pengumuman->judul = $request->judul;
        $pengumuman->slug = Str::slug($request->judul);
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->tanggal = $request->tanggal;
        // upload foto
        if ($request->hasFile('image')) {
            $pengumuman->deleteImage(); //untuk hapus gambarr sebelum diganti gambar baru
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/pengumuman/', $name);
            $pengumuman->image = $name;
        }
        $pengumuman->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.pengumuman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->deleteImage();
        $pengumuman->delete();
        toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.pengumuman.index');
    }
}
