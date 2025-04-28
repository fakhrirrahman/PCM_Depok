<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;
    
    protected $table = 'profesi';

    protected $fillable = [
        'nama',
    ];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

}
