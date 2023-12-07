<?php

namespace App\Models;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $fillable = [
        'id',
        'id_berita',
        'id_user',
        'isi_komentar',
        'waktu_komentar',
    ];

    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getBerita()
    {
        return $this->hasMany(Berita::class);
    }
}
