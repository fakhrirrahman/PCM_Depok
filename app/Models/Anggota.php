<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'tahun_pembuatan',
        'nbm',
        'nbm_depan',
        'cabang',
        'pdm',
        'pwm',
        'ranting',
        'alamat',
        'kabupaten_tinggal',
        'provinsi_tinggal',
        'kelurahan',
        'profesi',
        'no_hp',
        'email',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($anggota) {
            if (Anggota::where('nbm', $anggota->nbm)->exists()) {
                return false;
            }
        });
    }
    public function profesi()
    {
        return $this->belongsTo(Profesi::class);
    }
    public function ranting()
    {
        return $this->belongsTo(Ranting::class);
    }
}
