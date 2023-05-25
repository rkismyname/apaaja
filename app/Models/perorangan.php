<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perorangan extends Model
{
    use HasFactory;

    protected $table = 'perorangan';
    protected $primaryKey = 'id_individual';
    protected $fillable = [
        'nama_perorangan',
        'no_ktp',
        'tanggal_lahir',
        'alamat',
        'email',
        'no_telepon',
        'no_npwp',
        'id'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
