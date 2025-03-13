<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
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
