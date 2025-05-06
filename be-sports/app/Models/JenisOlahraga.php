<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class JenisOlahraga extends Model 
{
    use HasFactory;
    
=======
class KategoriOlahraga extends Model
{
    use HasFactory;

>>>>>>> bff8b2e3290e9841cf2b540a4d68247efae57636
    protected $table = 'jenis_olahraga';

    protected $fillable = [
        'name',
        'description'
    ];

}
