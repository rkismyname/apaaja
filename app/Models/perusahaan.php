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
        'id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
        return $this->hasMany(User::class);
    }
}

