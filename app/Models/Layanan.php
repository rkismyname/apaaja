<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $primaryKey = 'layanan_id';
    protected $fillable = [
        'kategori',
        'layanan',
        'tipe',
        'hrg_jual',
        'hrg_produksi',
        'hrg_pokok',
        'id'
    ];

    public function perorangan() {
        return $this->hasMany(perorangan::class);
    }
    public function perusahaan() {
        return $this->hasMany(perusahaan::class);
    }
}