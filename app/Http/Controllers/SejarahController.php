<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sejarah = Sejarah::first();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('backend.sejarah.index', compact('sejarah'));
    }

    public function edit($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('backend.sejarah.edit', compact('sejarah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'sejarah' => 'required',
        ],[
            'title.required' => 'Judul harus diisi',
            'sejarah.required' => 'Sejarah harus diisi',
        ]);

        $sejarah = Sejarah::findOrFail($id);
        $sejarah->title = $request->title;
        $sejarah->sejarah = $request->sejarah;
        if ($request->hasFile('image')) {
                Storage::delete($sejarah->image);
                $path = $request->file('image')->store('sejarah', 'public');
                $sejarah->image = $path;
            }
        $sejarah->save();

        toast('Data Berhasil!', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('backend.sejarah.index');
    }

}
