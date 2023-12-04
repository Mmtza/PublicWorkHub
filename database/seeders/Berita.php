<?php

namespace Database\Seeders;

use App\Models\Berita as ModelsBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Berita extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsBerita::factory()->count(100)->create();
    }
}
