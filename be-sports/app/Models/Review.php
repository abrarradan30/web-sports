<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'tgl_kirim',
    ];
}
