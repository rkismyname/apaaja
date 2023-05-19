<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sertif_bu extends Model
{
    protected $table = 'sertif_bu'; // Nama tabel yang digunakan untuk menyimpan data perusahaan

    protected $fillable = [
        'nib',
        'npwp_bu',
        'akte_pend',
        'akte_peru',
        'ktp',
        'npwp_dir',
    ];
}
