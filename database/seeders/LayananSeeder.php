<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;
use App\Models\User;

class LayananSeeder extends Seeder
{
    public function run()
    {
        // Retrieve a user ID from the users table
        $user = User::first(); // Retrieve the first user, you can modify this according to your logic
        
        // Check if a user exists
        if ($user) {
            Layanan::create([
                'kategori' => 'Akuntan Publik',
                'layanan' => 'Asset 0-1 Milyar',
                'tipe' => 'Perusahaan',
                'hrg_jual' => 'Rp10.000.000,00',
                'hrg_produksi' => 'Rp5.600.000,00',
                'hrg_pokok' => 'Rp7.800.000',
                'id' => $user->id,
            ]);
        } else {
            // Handle the case when there are no users in the users table
            // You can throw an exception, log an error, or handle it based on your application's requirements
        }
    }
}

