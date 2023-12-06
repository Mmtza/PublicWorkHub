<?php

namespace Database\Seeders;

use App\Models\Loker as ModelsLoker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Loker extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsLoker::factory()->count(20)->create();
    }
}
