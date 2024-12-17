<?php

namespace App\Http\Controllers;

use App\Models\Struktural;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $struktural = Struktural::orderBy('id', 'asc')->get();
        $jabatan = Jabatan::all();

        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.struktural', compact('struktural', 'jabatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'id_jabatan' => 'required',
        ], [
            'foto.required' => 'Gambar harus diisi',
            'foto.mimes' => 'Format gambar tidak sesuai',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'nama.required' => 'Nama harus diisi',
            'id_jabatan.required' => 'Jabatan harus diisi',
        ]);

        $path = $request->file('foto')->store('struktural', 'public');

        $struktural = new Struktural();
        $struktural->nama = $request->nama;
        $struktural->id_jabatan = $request->id_jabatan;
        $struktural->foto = $path;
        $struktural->save();

        toast('Data berhasil ditambahkan!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.struktural.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'id_jabatan' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'id_jabatan.required' => 'Jabatan harus diisi',
        ]);

        $struktural = Struktural::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (Storage::disk('public')->exists($struktural->foto)) {
                Storage::disk('public')->delete($struktural->foto);
            }
            $path = $request->file('foto')->store('struktural', 'public');
            $struktural->foto = $path;
        }

        $struktural->nama = $request->nama;
        $struktural->id_jabatan = $request->id_jabatan;
        $struktural->save();

        toast('Data berhasil diubah!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.struktural.index');
    }

    public function destroy($id)
    {
        $struktural = Struktural::findOrFail($id);
        if (Storage::disk('public')->exists($struktural->image)) {
            Storage::disk('public')->delete($struktural->image);
        }
        $struktural->delete();
        toast('Data berhasil dihapus!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.struktural.index');
    }
}
