<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    public $fillable = ['judul', 'deskripsi', 'image', 'tanggal'];
    public $visible = ['judul', 'deskripsi', 'image', 'tanggal'];
    public $timestamps = true;

    // menghapus foto
    public function deleteImage(){
        if ($this->image && file_exists(public_path('image/pengumuman/'. $this->image))) {
            return unlink(public_path('image/pengumuman/'. $this->image));
        }
    }
}
