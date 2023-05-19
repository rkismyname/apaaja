<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perorangan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_perorangan', 'nama_perusahaan', 'no_telepon'];
}
