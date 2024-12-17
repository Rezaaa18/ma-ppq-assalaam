<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriFasilitas extends Model
{
    use HasFactory;

    public $fillable = ['nama_kategori', 'slug'];
    public $visible = ['nama_kategori', 'slug'];
    public $timestamps = true;

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'id_kategori');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($kategoriFasilitas) {
            if ($kategoriFasilitas->fasilitas()->count() > 0) {
                throw new ModelNotFoundException('Kategori fasilitas ini terkait dengan data ditabel fasilitas dan tidak dapat dihapus.');
            }
        });
    }
}
