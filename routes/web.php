<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\Frontendcontroller;
use App\Http\Controllers\KategoriFasilitasController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\StrukturalController;
use App\Http\Controllers\VisiController;

Auth::routes(
    ['register' => false]
);


// #BACKEND
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route Jabatan
    Route::get('jabatan', [JabatanController::class, 'index'])->name('backend.jabatan.index');
    Route::post('jabatan', [JabatanController::class, 'store'])->name('backend.jabatan.store');
    Route::put('jabatan/{id}', [JabatanController::class, 'update'])->name('backend.jabatan.update');
    Route::delete('jabatan/{id}', [JabatanController::class, 'destroy'])->name('backend.jabatan.destroy');

    // Route Struktural
    Route::get('struktural', [StrukturalController::class, 'index'])->name('backend.struktural.index');
    Route::post('struktural', [StrukturalController::class, 'store'])->name('backend.struktural.store');
    Route::put('struktural/{id}', [StrukturalController::class, 'update'])->name('backend.struktural.update');
    Route::delete('struktural/{id}', [StrukturalController::class, 'destroy'])->name('backend.struktural.destroy');

    // Route Sejarah
    Route::get('sejarah', [SejarahController::class, 'index'])->name('backend.sejarah.index');
    Route::get('sejarah/{id}/edit', [SejarahController::class, 'edit'])->name('backend.sejarah.edit');
    Route::put('sejarah/{id}', [SejarahController::class, 'update'])->name('backend.sejarah.update');

    // Route Visi
    Route::get('visi', [VisiController::class, 'index'])->name('backend.visi.index');
    Route::get('visi/create', [VisiController::class, 'create'])->name('backend.visi.create');
    Route::post('visi', [VisiController::class, 'store'])->name('backend.visi.store');
    Route::get('visi/{slug}/edit', [VisiController::class, 'edit'])->name('backend.visi.edit');
    Route::put('visi/{slug}', [VisiController::class, 'update'])->name('backend.visi.update');
    Route::delete('visi/{slug}', [VisiController::class, 'destroy'])->name('backend.visi.destroy');

    // Route Kategori Fasilitas
    Route::get('kategori-fasilitas', [KategoriFasilitasController::class, 'index'])->name('backend.kategori-fasilitas.index');
    Route::post('kategori-fasilitas', [KategoriFasilitasController::class, 'store'])->name('backend.kategori-fasilitas.store');
    Route::put('kategori-fasilitas/{id}', [KategoriFasilitasController::class, 'update'])->name('backend.kategori-fasilitas.update');
    Route::delete('kategori-fasilitas/{id}', [KategoriFasilitasController::class, 'destroy'])->name('backend.kategori-fasilitas.destroy');

    // Route Fasilitas
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('backend.fasilitas.index');
    Route::post('fasilitas', [FasilitasController::class, 'store'])->name('backend.fasilitas.store');
    Route::put('fasilitas/{id}', [FasilitasController::class, 'update'])->name('backend.fasilitas.update');
    Route::delete('fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('backend.fasilitas.destroy');

    // Route Galeri
    Route::get('galeri', [GaleriController::class, 'index'])->name('backend.galeri.index');
    Route::post('galeri', [GaleriController::class, 'store'])->name('backend.galeri.store');
    Route::put('galeri/{id}', [GaleriController::class, 'update'])->name('backend.galeri.update');
    Route::delete('galeri/{id}', [GaleriController::class, 'destroy'])->name('backend.galeri.destroy');

    // Route Berita
    Route::get('berita', [BeritaController::class, 'index'])->name('backend.berita.index');
    Route::get('berita/create', [BeritaController::class, 'create'])->name('backend.berita.create');
    Route::post('berita', [BeritaController::class, 'store'])->name('backend.berita.store');
    Route::get('berita/{slug}', [BeritaController::class, 'show'])->name('backend.berita.show');
    Route::get('berita/{slug}/edit', [BeritaController::class, 'edit'])->name('backend.berita.edit');
    Route::put('berita/{slug}', [BeritaController::class, 'update'])->name('backend.berita.update');
    Route::delete('berita/{id}', [BeritaController::class, 'destroy'])->name('backend.berita.destroy');

    // Route Agenda
    Route::get('agenda', [AgendaController::class, 'index'])->name('backend.agenda.index');
    Route::get('agenda/create', [AgendaController::class, 'create'])->name('backend.agenda.create');
    Route::post('agenda', [AgendaController::class, 'store'])->name('backend.agenda.store');
    Route::get('agenda/{slug}', [AgendaController::class, 'show'])->name('backend.agenda.show');
    Route::get('agenda/{slug}/edit', [AgendaController::class, 'edit'])->name('backend.agenda.edit');
    Route::put('agenda/{slug}', [AgendaController::class, 'update'])->name('backend.agenda.update');
    Route::delete('agenda/{id}', [AgendaController::class, 'destroy'])->name('backend.agenda.destroy');

    // Route Pengumuman
    Route::get('pengumuman', [PengumumanController::class, 'index'])->name('backend.pengumuman.index');
    Route::get('pengumuman/create', [PengumumanController::class, 'create'])->name('backend.pengumuman.create');
    Route::post('pengumuman', [PengumumanController::class, 'store'])->name('backend.pengumuman.store');
    Route::get('pengumuman/{slug}', [PengumumanController::class, 'show'])->name('backend.pengumuman.show');
    Route::get('pengumuman/{slug}/edit', [PengumumanController::class, 'edit'])->name('backend.pengumuman.edit');
    Route::put('pengumuman/{slug}', [PengumumanController::class, 'update'])->name('backend.pengumuman.update');
    Route::delete('pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('backend.pengumuman.destroy');

    // Route Prestasi
    Route::get('prestasi', [PrestasiController::class, 'index'])->name('backend.prestasi.index');
    Route::get('prestasi/create', [PrestasiController::class, 'create'])->name('backend.prestasi.create');
    Route::post('prestasi', [PrestasiController::class, 'store'])->name('backend.prestasi.store');
    Route::get('prestasi/{slug}', [PrestasiController::class, 'show'])->name('backend.prestasi.show');
    Route::get('prestasi/{slug}/edit', [PrestasiController::class, 'edit'])->name('backend.prestasi.edit');
    Route::put('prestasi/{slug}', [PrestasiController::class, 'update'])->name('backend.prestasi.update');
    Route::delete('prestasi/{id}', [PrestasiController::class, 'destroy'])->name('backend.prestasi.destroy');
});

// #FRONTEND
Route::get('/fasilitas', function () {
    return view('fasilitas');
});
Route::get('/ppdb', function () {
    return view('ppdb');
});

//galeri
Route::get('/kepesantrenan', function () {
    return view('kepesantrenan');
});
Route::get('/sekolah', function () {
    return view('sekolah');
});

//informasi
Route::get('/prestasi', function () {
    return view('prestasi');
});
Route::get('/agenda', function () {
    return view('agenda');
});

Route::get('/pengumuman', function () {
    return view('pengumuman');
});

//Profile
Route::get('/visi_misi', function () {
    return view('visi_misi');
});
Route::get('/kurikulum', function () {
    return view('kurikulum');
});
Route::get('/guru', function () {
    return view('guru');
});
Route::get('/show', function () {
    return view('artikel.show');
});

// sejarah
Route::get('/',[Frontendcontroller::class,'welcome']);


Route::get('/',[Frontendcontroller::class ,'berita'])->name('berita.index');
Route::get('/berita',[Frontendcontroller::class,'berita'])->name('berita.index');
Route::get('berita/{slug}',[Frontendcontroller::class,'showBerita'])->name('berita.show');


// Agenda
Route::get('/agenda',[Frontendcontroller::class,'agenda'])->name('agenda');

// Pengumuman
Route::get('/pengumuman',[Frontendcontroller::class,'pengumuman'])->name('pengumuman');

// Prestasi
Route::get('/prestasi',[Frontendcontroller::class,'prestasi'])->name('prestasi');

// Kepesantrenan
Route::get('/kepesantrenan',[Frontendcontroller::class,'galeriKepesantrenan']);
Route::get('/sekolah', [FrontendController::class, 'getVideo']);

// Sekolah
Route::get('/sekolah',[Frontendcontroller::class,'galeriSekolah']);

// Fasilitas
Route::get('/fasilitas',[Frontendcontroller::class,'fasilitas']);

// Visi
Route::get('/visi_misi',[Frontendcontroller::class,'visi_misi']);

// Struktural
Route::get('/guru',[Frontendcontroller::class,'struktural']);

// berita Welcome
Route::get('/',[Frontendcontroller::class,'welcome']);

// pengumuman Welcome
Route::get('/',[Frontendcontroller::class,'welcome']);



Route::get('/agenda/update-statuses', [AgendaController::class, 'updateStatuses']);
