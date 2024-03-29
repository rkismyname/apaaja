<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertif_tk extends Model
{
    protected $table = 'sertif_tk';
    protected $primaryKey = 'tk_id';

    protected $fillable = [
        'ktp',
        'npwp',
        'ijazah',
        'foto_terbaru',
        'bukti_trf',
        'id',
        'status',
        'perorangan_id'
    ];

    public function perorangan () {
        return $this->belongsTo(perorangan::class, 'perorangan_id');
    }
}

