<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Kegiatan extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const MEDIA_COLLECTION = 'gambar_kegiatan';
    
    protected $table = 'kegiatan';
    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'deskripsi',
        'lokasi',
    ];

    public function anggotaKegiatans()
    {
        return $this->hasMany(AnggotaKegiatan::class, 'kegiatan_id', 'id');
    }
    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'anggota_kegiatan', 'kegiatan_id', 'anggota_id');
    }

    public function getFirstMediaUrlAttribute(): string
    {
        return $this->getFirstMediaUrl(self::MEDIA_COLLECTION);
    }

    public function getMediaUrlsAttribute(): array
    {
        return $this->getMedia(self::MEDIA_COLLECTION)->map(function ($media) {
            return $media->getUrl();
        })->toArray();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION);
    }

    public function user()
    {
        return $this->belongsTo(User::class,);
    }
}
