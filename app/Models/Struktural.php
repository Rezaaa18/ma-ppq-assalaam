<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktural extends Model
{
    use HasFactory;

    public $fillable = ['foto', 'nama', 'id_jabatan'];
    public $visible = ['foto', 'nama', 'id_jabatan'];
    public $timestamps = true;

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
