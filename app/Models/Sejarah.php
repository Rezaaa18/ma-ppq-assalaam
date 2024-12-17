<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

    public $fillable = ['image', 'title', 'sejarah'];
    public $visible = ['image', 'title', 'sejarah'];
    public $timestamps = true;

    public function deleteImage(){
        if ($this->image && file_exists(public_path('image/sejarah/'. $this->image))) {
            return unlink(public_path('image/sejarah/'. $this->image));
        }
    }

}
