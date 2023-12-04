<?php

namespace Database\Seeders;

use App\Models\Team as TeamModel;
use Illuminate\Database\Seeder;

class Team extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamModel::factory()->create([
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

        TeamModel::factory()->create([
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

        TeamModel::factory()->create([
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


    }
}
