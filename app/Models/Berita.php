<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    public $fillable = ['judul', 'penulis', 'image', 'isi', 'tanggal'];
    public $visible = ['judul', 'penulis', 'image', 'isi', 'tanggal'];
    public $timestamps = true;

    // menghapus foto
    public function deleteImage(){
        if ($this->image && file_exists(public_path('image/berita/'. $this->image))) {
            return unlink(public_path('image/berita/'. $this->image));
        }
    }
}
