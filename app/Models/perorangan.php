<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perorangan extends Model
{
    use HasFactory;
    protected $table = 'perorangan';
    protected $primaryKey = 'perorangan_id';
    protected $fillable = [
        'nama_perorangan',
        'alamat',
        'tanggal_lahir',
        'no_telepon',
        'no_ktp',
        'no_npwp',
        'id',
        'layanan_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
        return $this->hasMany(User::class);
    }

    public function layanan() {
        return $this->belongsTo(Layanan::class);
    }
}
