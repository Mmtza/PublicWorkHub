<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'nama_kategori' => fake()->randomElement(['Pendidikan', 'Sosial', 'Politik', 'Olahraga', 'Hiburan', 'Frontend Developer', 'Backend Developer', 'Software Enginer', 'Database Analyst']),
            'keterangan' => Str::random()
        ];
    }
}
