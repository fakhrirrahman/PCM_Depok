<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StrukturOrganisasi extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'struktur_organisasi';
    protected $fillable = [
        'nama',
        'jabatan',

    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::ulid(); // Auto-generate ULID
        });
    }
}
