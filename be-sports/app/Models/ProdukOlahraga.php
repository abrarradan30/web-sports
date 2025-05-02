<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukOlahraga extends Model
{
    use HasFactory;

    protected $table = 'produk_olahraga';

    protected $fillable = [
        'nama_produk',
        'gambar',
        'deskripsi',
        'harga',
        'stok',
        'warna',
        'ukuran',
        'jenis_kelamin',
    ];
    
    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar) => url('/storage/produk_olahraga/' . $gambar),
        );
    }
}
