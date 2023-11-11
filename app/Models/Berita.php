<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Komentar;
use App\Models\Berita_Has_Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'waktu_publikasi',
        'img',
        'status'
    ];

    public function getUser() {
        return $this->hasMany(User::class);
    }

    public function getKomentar() {
        return $this->belongsTo(Komentar::class);
    }

    public function getLike() {
        return $this->belongsTo(Like::class);
    }
}
