<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'dokumen';
    protected $fillable = [
        'judul_dokumen',
        'file',
        'diupload_oleh',
        'diupdate_oleh'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'diupload_oleh')->select('id', 'name');
    }
    public function editor()
    {
        return $this->belongsTo(User::class, 'diupdate_oleh')->select('id', 'name');
    }
}
