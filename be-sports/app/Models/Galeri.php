<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute; // ✅ import Attribute yang benar!

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'url_media',
        'tipe_media',
    ];

    protected function url_media(): Attribute
    {
        return Attribute::make(
            get: fn ($url_media) => url('/storage/galeri/app/public/' . $url_media),
        );
    }
}
