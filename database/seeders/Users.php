<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12345'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'penyedialoker',
            'email' => 'penyedialoker@gmail.com',
            'password' => bcrypt('penyedialoker12345'),
            'role' => 'penyedia_loker',
        ]);

        User::factory()->create([
            'name' => 'penulis',
            'email' => 'penulis@gmail.com',
            'password' => bcrypt('penulis12345'),
            'role' => 'penulis',
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user12345'),
            'role' => 'user',
        ]);
    }
}
