<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
    protected $table = 'ranting';
    protected $fillable = ['nama'];

    public function notulensi()
    {
        return $this->hasMany(Notulensi::class);
    }
    
}
