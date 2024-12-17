<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    public $fillable = ['judul', 'keterangan', 'image', 'tanggal'];
    public $visible = ['judul', 'keterangan', 'image', 'tanggal'];
    public $timestamps = true;

    // menghapus foto
    public function deleteImage(){
        if ($this->image && file_exists(public_path('image/prestasi/'. $this->image))) {
            return unlink(public_path('image/prestasi/'. $this->image));
        }
    }
}
