<?php

namespace Database\Seeders;

use App\Models\Kategori as ModelsKategori;
use Illuminate\Database\Seeder;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsKategori::factory()->create([
            'nama_kategori' => 'Pendidikan',
            'keterangan' => 'Berisi tentang pendidikan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Sosial',
            'keterangan' => 'Berisi tentang sosial'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Sport',
            'keterangan' => 'Berisi tentang sport'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Ekonomi',
            'keterangan' => 'Berisi tentang ekonomi'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Teknologi',
            'keterangan' => 'Berisi tentang teknologi'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Hiburan',
            'keterangan' => 'Berisi tentang hiburan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Olahraga',
            'keterangan' => 'Berisi tentang olahraga'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Kesehatan',
            'keterangan' => 'Berisi tentang kesehatan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Fashion',
            'keterangan' => 'Berisi tentang fashion'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Web Developer',
            'keterangan' => 'Berisi tentang web developer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'UI UX Designer',
            'keterangan' => 'Berisi tentang UI UX Designer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Frontend Developer',
            'keterangan' => 'Berisi tentang frontend Designer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Backend Developer',
            'keterangan' => 'Berisi tentang backend developer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Mobile App Developer',
            'keterangan' => 'Berisi tentang mobile app developer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'IT Consultant',
            'keterangan' => 'Berisi tentang IT Consultant'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Guru',
            'keterangan' => 'Berisi tentang guru'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Keuangan',
            'keterangan' => 'Berisi tentang keuangan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Staff',
            'keterangan' => 'Berisi tentang staff'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Dokter',
            'keterangan' => 'Berisi tentang dokter'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Manajer',
            'keterangan' => 'Berisi tentang manajer'
        ]);
    }
}
