<?php

namespace App\Models;

use App\Models\User;
use App\Models\Apply_Loker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loker extends Model
{
    use HasFactory;

    protected $table = 'loker';

    protected $fillable = [
        'id_user',
        'nama_loker',
        'slug',
        'deskripsi_loker',
        'alamat',
        'waktu_publikasi',
    ];

    public $timestamps = false;

    public function getSlug()
    {
        return $this->slug;
    }

    public static function findSlugFirst($slug)
    {
        return static::where('slug', $slug)->first();
    }

    public static function findSlugGet($slug)
    {
        return static::where('slug', $slug)->get();
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getApplyLoker()
    {
        return $this->belongsTo(Apply_Loker::class);
    }

    public function getKategori()
    {
        return $this->belongsToMany(Kategori::class, 'loker_has_kategori', 'id_loker', 'id_kategori', 'id');
    }
}
