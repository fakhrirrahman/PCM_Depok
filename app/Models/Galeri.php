<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Galeri extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'galeri';

    const MEDIA_COLLECTION = 'galeri';

    protected $fillable = [];

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
