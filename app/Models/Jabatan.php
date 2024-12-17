<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = ['nama_jabatan', 'slug'];
    public $timestamps = true;
    public function struktural()
    {
        return $this->hasMany(Struktural::class, 'id_jabatan');
    }
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($jabatan) {
            if ($jabatan->struktural()->count() > 0) {
                throw new ModelNotFoundException('Jabatan ini terkait dengan data ditabel struktural dan tidak dapat dihapus.');
            }
        });
    }
}
