<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriOlahraga extends Model
{
    use HasFactory;

    protected $table = 'kategori_olahraga';

    protected $fillable = [
        'nama_olahraga',
        'deskripsi',
    ];
}
