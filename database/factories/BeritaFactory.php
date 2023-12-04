<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul = fake()->sentence();
        return [
            'judul' => $judul,
            'isi' => fake()->paragraph(),
            'slug' => Str::slug($judul, '-'),
            'status' => fake()->randomElement(['menunggu', 'aktif', 'tidak aktif']),
            'id_user' => User::first()->id,
            'waktu_publikasi' => now(),
        ];
    }
}
