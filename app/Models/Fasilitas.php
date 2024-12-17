<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    public $fillable = ['image', 'slug', 'keterangan', 'id_kategori'];
    public $visible = ['image', 'slug', 'keterangan', 'id_kategori'];
    public $timestamps = true;

    // menghapus foto
    public function deleteImage(){
        if ($this->image && file_exists(public_path('image/fasilitas/'. $this->image))) {
            return unlink(public_path('image/fasilitas/'. $this->image));
        }
    }

    public function kategoriFasilitas()
    {
        return $this->belongsTo(KategoriFasilitas::class, 'id_kategori');
    }
}
