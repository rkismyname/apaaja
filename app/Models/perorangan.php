<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perorangan extends Model
{
    use HasFactory;

    protected $table = 'perorangan';
    protected $fillable = [
        'nama_perorangan', 
        'tanggal_lahir',
        'alamat',
        'email',
        'no_telepon'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];
}