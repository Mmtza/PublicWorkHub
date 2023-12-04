<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use App\Models\Berita_Has_Kategori;

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

        Team::factory()->create([
            'nama_anggota' => 'Bagus Muhammad Mumtaza',
            'nim' => '21.230.0173',
            'role' => 'Project Manager',
            'program_studi' => 'Sistem Informasi',
            'asal_kampus' => 'STMIK Widya Pratama',
            'foto' => 'Bagus_Muhammad_Mumtaza.jpg',
            'github' => 'Mmtza',
            'instagram' => 'mmtza.mm/',
            'whatsapp' => '6285875282178',
        ]);

        Team::factory()->create([
            'nama_anggota' => 'Muhammad Anwar Fauzan',
            'nim' => '1101211032',
            'role' => 'Backend Developer',
            'program_studi' => 'Teknik Informatika',
            'asal_kampus' => 'Universitas Banten Jaya',
            'foto' => 'Muhammad_Anwar_Fauzan.jpg',
            'github' => 'Anuraaaa',
            'instagram' => 'anwarfz__/',
            'whatsapp' => '6285939410330',
        ]);

        Team::factory()->create([
            'nama_anggota' => 'Erick Darmawan Boeniarto',
            'nim' => '1101211023',
            'role' => 'Frontend Developer',
            'program_studi' => 'Teknik Informatika',
            'asal_kampus' => 'Universitas Banten Jaya',
            'foto' => 'Erick_Darmawan_Boeniarto.jpg',
            'github' => 'Erickdb',
            'instagram' => 'erick.db13/',
            'whatsapp' => '6285282568210',
        ]);

        Berita::factory()->count(100)->create();
    }
}
