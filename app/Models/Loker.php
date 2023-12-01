<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\User;
use App\Models\Apply_Loker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loker extends Model
{
    use HasFactory;

    protected $table = 'loker';

    protected $fillable = [
        'nama_loker',
        'slug',
        'deskripsi_loker',
        'alamat',
        'waktu_publikasi',
        'status'
    ];

    public $timestamps = false;

    public function getSlug() {
        return $this->slug;
    }

    public static function findSlug($slug) {
        $loker = static::all();
        return $loker->where('slug', $slug)->first();
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getApplyLoker()
    {
        return $this->belongsTo(Apply_Loker::class);
    }

    public function getChat()
    {
        return $this->belongsTo(Chat::class);
    }
}
