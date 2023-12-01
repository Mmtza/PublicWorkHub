<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
        'nama_anggota',
        'nim',
        'role',
        'program_studi',
        'asal_kampus',
        'foto'
    ];

    public $timestamps = false;
}
