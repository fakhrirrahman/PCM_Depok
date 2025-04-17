<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    const MEDIA_COLLECTION = 'galeri';

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
