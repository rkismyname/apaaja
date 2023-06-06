<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $primaryKey = 'perusahaan_id';
    protected $fillable = [
        'nama_perusahaan',
        'nama_pj',
        'bidang',
        'tlp_perusahaan',
        'email_perusahaan',
        'tlp_pj',
        'alamat',
        'id',
        'layanan_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id');
        // return $this->hasMany(User::class);
    }

    public function layanan() {
        return $this->belongsTo(layanan::class, 'layanan_id');
    }

    public function sertif_bu()
    {
        return $this->hasOne(sertif_bu::class, 'perusahaan_id');
    }
}

