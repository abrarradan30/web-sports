<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukOlahraga extends Model
{
    use HasFactory;

    protected $table = 'produk_olahraga';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'warna',
        'ukuran',
        'jenis_kelamin',
    ];
}
