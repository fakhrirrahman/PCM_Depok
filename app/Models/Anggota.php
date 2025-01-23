<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class Anggota extends Model
{

    use HasFactory, HasUlids;
    protected $table = 'anggota';
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'jenis_kelamin',
        'tanggal_lahir',
        'status'
    ];

    const STATUS = ['aktif', 'nonaktif'];
    const JENIS_KELAMIN = ['L', 'P'];
}
