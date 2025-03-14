<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notulensi extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'notulensi';
    protected $fillable = ['judul', 'notulensi'];
}
