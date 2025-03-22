<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Str;

class AnggotaKegiatan extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'anggota_kegiatan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'anggota_id',
        'kegiatan_id',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }
}
