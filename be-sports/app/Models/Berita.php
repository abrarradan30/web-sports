<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar_sampul',
        'tgl_dibuat',
    ];

    protected function gambarSampul(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar_sampul) => url('/storage/berita/' . $$gambar_sampul),
        );
    }
}
