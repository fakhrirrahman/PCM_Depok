<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Keuangan extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'keuangan';

    protected $fillable = [
        'tanggal_transaksi',
        'tipe',
        'kategori',
        'jumlah',
        'saldo_awal',
        'saldo_akhir',
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date',
    ];
}
