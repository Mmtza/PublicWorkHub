<?php

namespace App\Models;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    protected $table = 'like';

    protected $fillable = ['id_berita', 'id_user'];

    public $timestamps = false;

    public function getUser()
    {
        return $this->hasOne(User::class);
    }

    public function getBerita()
    {
        return $this->hasMany(Berita::class);
    }
}
