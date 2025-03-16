<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Str;

class AnggotaKegiatan extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'anggota_kegiatan';
    public $incrementing = false; // ULID harus non-increment
    protected $keyType = 'string'; // ULID adalah string

    protected $fillable = [
        'anggota_id',
        'kegiatan_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::ulid(); // Generate ULID untuk id
            }
        });
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }
}
