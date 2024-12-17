<?php

namespace App\Http\Controllers;

use App\Models\KategoriFasilitas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriFasilitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (session()->has('errors')) {
        toast('Kategori sudah ada!', 'warning')->position('top-end')->autoClose(3000);
        }
        $search = $request->get('search');

        // Menggunakan query builder untuk pencarian
        $fasilitas = KategoriFasilitas::latest()
            ->when($search, function($query) use ($search) {
                return $query->where('nama_kategori', 'like', "%{$search}%")
                            ->orWhere('slug', 'like', "%{$search}%");
            })
            ->get();

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.kategori_fasilitas', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategori_fasilitas,nama_kategori',
    ], [
        'nama_kategori.required' => 'Kategori harus diisi.',
        'nama_kategori.unique' => 'Kategori sudah ada. Silakan masukkan kategori yang berbeda.',
    ]);

        $kategoriFasilitas = new KategoriFasilitas();
        $kategoriFasilitas->nama_kategori = $request->nama_kategori;
        $kategoriFasilitas->slug = Str::slug($request->nama_kategori);
        $kategoriFasilitas->save();

        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.kategori-fasilitas.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategori_fasilitas,nama_kategori',
        ], [
            'nama_kategori.required' => 'Kategori harus diisi.',
            'nama_kategori.unique' => 'Kategori sudah ada. Silakan masukkan kategori yang berbeda.',
        ]);

        $fasilitas = KategoriFasilitas::findOrFail($id);
        $fasilitas->nama_kategori = $request->nama_kategori;
        $fasilitas->slug = Str::slug($request->nama_kategori);
        $fasilitas->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.kategori-fasilitas.index');
    }

    public function destroy($id)
    {
        try {
            $kategoriFasilitas = KategoriFasilitas::findOrFail($id);
            $kategoriFasilitas->delete();
            toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        } catch (Exception $e) {
            toast($e->getMessage(), 'error')->position('top-end')->autoClose(3000);
        }

        return redirect()->route('backend.kategori-fasilitas.index');
    }

}
