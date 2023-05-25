<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $primaryKey = 'id_company';
    protected $fillable = [
        'nama_perusahaan', 
        'nama_pj', 
        'bidang',
        'tlp_perusahaan',
        'email_perusahaan',
        'tlp_pj',
        'alamat',
        'id'
    ];
}