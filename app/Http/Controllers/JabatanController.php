<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Exception;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if (session()->has('errors')) {
            toast('Jabatan sudah ada!', 'warning')->position('top-end')->autoClose(3000);
        }
        $search = $request->get('search');
        $jabatan = Jabatan::latest()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_jabatan', 'like', "%{$search}%");
                // ->orWhere('slug', 'like', "%{$search}%");
            })
            ->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.jabatan', compact('jabatan'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|unique:jabatans,nama_jabatan',
        ], [
            'nama_jabatan.required' => 'Jabatan harus diisi.',
            'nama_jabatan.unique' => 'Jabatan sudah ada. Silakan masukkan jabatan yang berbeda.',
        ]);
        $jabatan = new Jabatan();
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();
        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.jabatan.index');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|unique:jabatans,nama_jabatan',
        ], [
            'nama_jabatan.required' => 'Jabatan harus diisi.',
            'nama_jabatan.unique' => 'Jabatan sudah ada. Silakan masukkan jabatan yang berbeda.',
        ]);
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();
        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.jabatan.index');
    }
    public function destroy($id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->delete();
            toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        } catch (Exception $e) {
            toast($e->getMessage(), 'error')->position('top-end')->autoClose(3000);
        }
        return redirect()->route('backend.jabatan.index');
    }
}
