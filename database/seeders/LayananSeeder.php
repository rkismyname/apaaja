<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;
use App\Models\User;

class LayananSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        if ($user) {
            Layanan::create([
                'kategori' => 'Akuntan Publik',
                'layanan' => 'Asset 0-1 Milyar',
                'tipe' => 'Perusahaan',
                'hrg_jual' => 'Rp10.000.000',
                'hrg_produksi' => 'Rp5.600.000',
                'hrg_pokok' => 'Rp7.800.000',
            ]);
        } else {
        }
    }
}

