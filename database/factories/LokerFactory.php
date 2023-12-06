<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loker>
 */
class LokerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama_loker = fake()->sentence();
        return [
            'nama_loker' => $nama_loker,
            'slug' => Str::slug($nama_loker, '-'),
            'id_user' => User::first()->id,
            'deskripsi_loker' => fake()->paragraph(),
            'alamat' => fake()->address(),
            'waktu_publikasi' => now()
        ];
    }
}
