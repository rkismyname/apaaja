<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        \App\Models\User::factory()->create([
            'name' => 'Admin JS 1',
            'email' => 'adm1@admin.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name','admin')->first('id'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mark Ryden',
            'email' => 'markryden1@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name','user')->first('id'),
        ]);
    }
}
