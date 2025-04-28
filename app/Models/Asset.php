<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;

class Asset extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'aset';

    const MEDIA_COLLECTION = 'gambar';
    const STATUS = [
       'wakaf' => 'Wakaf',
       'hibah' => 'Hibah',
       'pembelian aset' => 'Pembelian Aset',
    ];

    const TYPE = [
        'Sekolah' => 'Sekolah',
        'Masjid' => 'Masjid',
        'Tanah' => 'Tanah',
        'Rumah Sakit' => 'Rumah Sakit',
        'Klinik' => 'Klinik',
        'Panti Asuhan' => 'Panti Asuhan',
        'Perguruan Tinggi' => 'Perguruan Tinggi',
        'Gedung Serba Guna' => 'Gedung Serba Guna',
        'Kendaraan' => 'Kendaraan',
        'Lainnya' => 'Lainnya',
    ];

    protected $fillable = [
        'nama',
        'tipe',
        'alamat',
        'status',
    ];

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
}
