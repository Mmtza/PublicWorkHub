<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        
        Kategori::factory()->create([
            'nama_kategori' => 'Pendidikan',
            'keterangan' => 'Berisi tentang pendidikan'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Sosial',
            'keterangan' => 'Berisi tentang sosial'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Sport',
            'keterangan' => 'Berisi tentang sport'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Ekonomi',
            'keterangan' => 'Berisi tentang ekonomi'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Teknologi',
            'keterangan' => 'Berisi tentang teknologi'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Hiburan',
            'keterangan' => 'Berisi tentang hiburan'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Olahraga',
            'keterangan' => 'Berisi tentang olahraga'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Kesehatan',
            'keterangan' => 'Berisi tentang kesehatan'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Fashion',
            'keterangan' => 'Berisi tentang fashion'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Web Developer',
            'keterangan' => 'Berisi tentang web developer'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'UI UX Designer',
            'keterangan' => 'Berisi tentang UI UX Designer'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Frontend Developer',
            'keterangan' => 'Berisi tentang frontend Designer'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Backend Developer',
            'keterangan' => 'Berisi tentang backend developer'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Mobile App Developer',
            'keterangan' => 'Berisi tentang mobile app developer'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'IT Consultant',
            'keterangan' => 'Berisi tentang IT Consultant'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Guru',
            'keterangan' => 'Berisi tentang guru'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Keuangan',
            'keterangan' => 'Berisi tentang keuangan'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Staff',
            'keterangan' => 'Berisi tentang staff'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Dokter',
            'keterangan' => 'Berisi tentang dokter'
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Manajer',
            'keterangan' => 'Berisi tentang manajer'
        ]);
        
    }
}
