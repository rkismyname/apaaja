<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertif_tk extends Model
{
    protected $table = 'sertif_tk';

    protected $fillable = [
        'ktp',
        'npwp',
        'ijazah',
        'foto_terbaru'
    ];
}
