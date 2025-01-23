<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'struktur_organisasi';
    protected $fillable = [
        'nama',         // Nama pimpinan atau anggota
        'jabatan',      // Jabatan (Ketua, Wakil, dll)
        'id_induk',     // Relasi dengan atasan (Induk)
        'tingkat',      // Level dalam organisasi
    ];

    // Relasi dengan atasan (parent)
    public function parent()
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'id_induk');
    }

    // Relasi ke bawahan (children)
    public function children()
    {
        return $this->hasMany(StrukturOrganisasi::class, 'id_induk');
    }
}
