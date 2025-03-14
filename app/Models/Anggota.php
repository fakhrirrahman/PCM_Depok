<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Anggota extends Model
{
    use HasFactory, HasUlids;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'tahun_pembuatan',
        'nbm',
        'cabang',
        'pdm',
        'pwm',
        'alamat',
        'kabupaten_tinggal',
        'provinsi_tinggal',
        'kelurahan',
        'profesi',
        'no_hp',
        'email',
    ];
}
