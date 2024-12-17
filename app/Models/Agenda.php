<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'image', 'tanggal_mulai', 'tanggal_selesai', 'tempat', 'status'];
    public $timestamps = true;

    public function deleteImage()
    {
        if ($this->image && file_exists(public_path('image/agenda/' . $this->image))) {
            return unlink(public_path('image/agenda/' . $this->image));
        }
    }

    public function getStatusAttribute()
    {
        $currentDate = Carbon::now()->startOfDay();
        $tanggalMulai = Carbon::parse($this->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($this->tanggal_selesai);

        if ($tanggalMulai > $currentDate) {
            return 'akan datang';
        } elseif ($tanggalMulai <= $currentDate && $tanggalSelesai >= $currentDate) {
            return 'sedang dilaksanakan';
        } else {
            return 'selesai dilaksanakan';
        }
    }

    public static function updateStatuses()
    {
        $currentDate = Carbon::now()->startOfDay();

        // Update status menjadi 'akan datang'
        self::where('tanggal_mulai', '>', $currentDate)->update(['status' => 'akan datang']);

        // Update status menjadi 'sedang dilaksanakan'
        self::where('tanggal_mulai', '<=', $currentDate)
            ->where('tanggal_selesai', '>=', $currentDate)
            ->update(['status' => 'sedang dilaksanakan']);

        // Update status menjadi 'selesai dilaksanakan'
        self::where('tanggal_selesai', '<', $currentDate)->update(['status' => 'selesai dilaksanakan']);
    }
}
