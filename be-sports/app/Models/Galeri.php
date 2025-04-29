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

    protected function urlMedia(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/app/public/' . $value),
        );
    }
}
