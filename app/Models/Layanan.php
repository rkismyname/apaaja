<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable = [
        'kategori',
        'layanan',
        'tipe',
        'hrg_jual',
        'hrg_produksi',
        'hrg_pokok'
    ];
}
