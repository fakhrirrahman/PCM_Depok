<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{

    use HasFactory, HasUlids;
    protected $table = 'notifikasi';
    protected $fillable = [
        'id_user',
        'pesan',
        'jenis_notifikasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
