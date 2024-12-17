<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
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

        $galeri = Galeri::latest()
            ->when($search, function ($query) use ($search) {
                return $query->where('description', 'like', "%{$search}%")
                    ->orWhere('jenis_kegiatan', 'like', "%{$search}%");
            })
            ->get();

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.galeri', compact('galeri'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|string',
            'media' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
        ], [
            'media.required' => 'Media harus diisi',
            'media.mimes' => 'Format media tidak sesuai',
            'media.max' => 'Ukuran media tidak boleh lebih dari 2MB',
            'description.required' => 'keterangan harus diisi',
            'jenis_kegiatan.required' => 'Jenis kegiatan harus diisi',
        ]);

        $media = $request->file('media')->store('galeri', 'public');

        $galeri = new Galeri();
        $galeri->description = $request->description;
        $galeri->jenis_kegiatan = $request->jenis_kegiatan;
        $galeri->media = $media;

        $galeri->save();

        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.galeri.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|string',
        ], [
            'description.required' => 'keterangan harus diisi',
            'jenis_kegiatan.required' => 'Jenis kegiatan harus diisi',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->description = $request->description;
        $galeri->jenis_kegiatan = $request->jenis_kegiatan;

        if ($request->hasFile('media')) {
            if ($galeri->media && Storage::disk('public')->exists($galeri->media)) {
                Storage::disk('public')->delete($galeri->media);
            }
            $request->validate([
                'media' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            ], [
                'media.mimes' => 'Format media tidak sesuai',
                'media.max' => 'Ukuran media tidak boleh lebih dari 2MB',
            ]);

            $media = $request->file('media')->store('galeri', 'public');
        } else {
            $media = $galeri->media;
        }

        $galeri->media = $media;
        $galeri->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.galeri.index');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if (Storage::disk('public')->exists($galeri->media)) {
            Storage::disk('public')->delete($galeri->media);
        }

        $galeri->delete();

        toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.galeri.index')->with('success', 'Data berhasil dihapus!');
    }
}
