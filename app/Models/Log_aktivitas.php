<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Log_aktivitas extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'log_aktivitas';
    protected $fillable = [
        'id_user',
        'aktivitas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->select('id', 'name');
    }
}
