<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sertif_bu extends Model
{
    protected $table = 'sertif_bu'; // Nama tabel yang digunakan untuk menyimpan data perusahaan
    protected $primaryKey = 'bu_id';
    protected $fillable = [
        'nib',
        'npwp_bu',
        'akte_pend',
        'akte_peru',
        'ktp',
        'npwp_dir',
        'bukti_trf',
        'id',
        'status',
        'perusahaan_id'
    ];

    public function perusahaan () {
        return $this->belongsTo(perusahaan::class, 'perusahaan_id');
    }
}