<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\KategoriFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FasilitasController extends Controller
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
        $search = $request->get('search');

        // Mengambil data fasilitas dengan pencarian
        $fasilitas = Fasilitas::latest()
            ->when($search, function($query) use ($search) {
                return $query->where('keterangan', 'like', "%{$search}%")
                            ->orWhere('slug', 'like', "%{$search}%")
                            ->orWhereHas('kategoriFasilitas', function($q) use ($search) {
                                $q->where('nama_kategori', 'like', "%{$search}%");
                            });
            })
            ->get();

        $kategoriFasilitas = KategoriFasilitas::all();

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.fasilitas', compact('fasilitas', 'kategoriFasilitas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'keterangan' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp,mp4|max:2048',
            'id_kategori' => 'required',
        ],[
            'image.required' => 'Gambar harus diisi',
            'image.mimes' => 'Format gambar tidak sesuai',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'keterangan.required' => 'Keterangan harus diisi',
            'id_kategori.required' => 'Kategori harus diisi',
        ]);

        $fasilitas = new Fasilitas();
        $fasilitas->keterangan = $request->keterangan;

        $slug = Str::slug($request->judul);
        $randomString = Str::random(5);
        $uniqueSlug = $slug . '-' . $randomString;
        $fasilitas->slug = $uniqueSlug;

        $fasilitas->id_kategori = $request->id_kategori;
        // upload foto
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/fasilitas/', $name);
            $fasilitas->image = $name;
        }
        $fasilitas->save();

        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.fasilitas.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'keterangan' => 'required',
            'id_kategori' => 'required',
        ],[
            'keterangan.required' => 'Keterangan harus diisi',
            'id_kategori.required' => 'Kategori harus diisi',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->keterangan = $request->keterangan;

        $slug = Str::slug($request->judul);
        $randomString = Str::random(5);
        $uniqueSlug = $slug . '-' . $randomString;
        $fasilitas->slug = $uniqueSlug;

        $fasilitas->id_kategori = $request->id_kategori;
        if ($request->hasFile('image')) {
            $fasilitas->deleteImage(); //untuk hapus gambarr sebelum diganti gambar baru
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('image/fasilitas/', $name);
            $fasilitas->image = $name;
        }
        $fasilitas->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.fasilitas.index')->with('success', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->deleteImage();
        $fasilitas->delete();

        toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.fasilitas.index')->with('success', 'data berhasil dihapus!');
    }
}
