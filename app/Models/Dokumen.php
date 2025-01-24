<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Dokumen extends Model implements HasMedia
{
    use HasFactory,  InteractsWithMedia;
    protected $table = 'dokumen';
    protected $fillable = [
        'judul_dokumen',
        'diupload_oleh',
        'diupdate_oleh'
    ];

    public const MEDIA_COLLECTION = 'dokumen_files';

    public function creator()
    {
        return $this->belongsTo(User::class, 'diupload_oleh')->select('id', 'name');
    }
    public function editor()
    {
        return $this->belongsTo(User::class, 'diupdate_oleh')->select('id', 'name');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit('contain', 300, 300)
            ->nonQueued(); // Untuk membuat konversi file seperti thumbnail
    }
}
