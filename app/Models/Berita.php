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
        'slug',
        'waktu_publikasi',
        'img',
        'status',
        'id_user'
    ];
    public $timestamps = false;

    public function getUser() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getSlug() {
        return $this->slug;
    }

    public static function findSlug($slug) {
        return static::where('slug', $slug)->get();
    }

    public function getKomentar() {
        return $this->belongsTo(Komentar::class);
    }

    public function getLike() {
        return $this->belongsTo(Like::class);
    }

    public function getKategori() {
        return $this->belongsToMany(Kategori::class, 'berita_has_kategori', 'id_berita', 'id_kategori', 'id');
    }
}
