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
            'type' => 'berita',
            'keterangan' => 'Berisi tentang pendidikan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Sosial',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang sosial'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Sport',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang sport'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Ekonomi',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang ekonomi'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Teknologi',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang teknologi'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Hiburan',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang hiburan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Olahraga',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang olahraga'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Kesehatan',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang kesehatan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Fashion',
            'type' => 'berita',
            'keterangan' => 'Berisi tentang fashion'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Web Developer',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang web developer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'UI UX Designer',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang UI UX Designer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Frontend Developer',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang frontend Designer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Backend Developer',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang backend developer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Mobile App Developer',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang mobile app developer'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'IT Consultant',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang IT Consultant'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Guru',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang guru'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Keuangan',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang keuangan'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Staff',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang staff'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Dokter',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang dokter'
        ]);

        ModelsKategori::factory()->create([
            'nama_kategori' => 'Manajer',
            'type' => 'loker',
            'keterangan' => 'Berisi tentang manajer'
        ]);
    }
}
