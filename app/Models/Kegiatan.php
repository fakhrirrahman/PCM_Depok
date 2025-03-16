<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'kegiatan';
    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'deskripsi',
        'lokasi',
    ];

    public function anggotaKegiatans()
    {
        return $this->hasMany(AnggotaKegiatan::class, 'kegiatan_id', 'id');
    }
    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'anggota_kegiatan', 'kegiatan_id', 'anggota_id');
    }
}
