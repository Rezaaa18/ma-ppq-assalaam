<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $visi = Visi::all();
        return view('backend.visi.index', compact('visi'));
    }

    public function create()
    {
        return view('backend.visi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:visis,title|string|max:255',
            'isi' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'title.unique' => 'Judul sudah ada',
            'isi.required' => 'Bagian isi tidak boleh kosong',
        ]);

        $visi = new Visi();
        $visi->title = $request->title;
        $visi->slug = Str::slug($request->title);
        $visi->isi = $request->isi;
        $visi->save();

        toast('Data Berhasil!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.visi.index');
    }

    public function edit($slug)
    {
        $visi = Visi::where('slug', $slug)->firstOrFail();
        return view('backend.visi.edit', compact('visi'));
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'isi' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'isi.required' => 'Bagian isi tidak boleh kosong',
        ]);

        $visi = Visi::where('slug', $slug)->firstOrFail();
        $visi->title = $request->title;
        $visi->slug = Str::slug($request->title);
        $visi->isi = $request->isi;
        $visi->save();

        toast('Data Berhasil!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.visi.index');
    }

    public function destroy($id)
    {
        $visi = Visi::findOrFail($id);
        $visi->delete();
        toast('Data Berhasil!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.visi.index');
    }
}
