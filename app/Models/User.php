<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Chat;
use App\Models\Like;
use App\Models\Loker;
use App\Models\Berita;
use App\Models\Komentar;
use App\Models\Pengaduan;
use App\Models\Apply_Loker;
use App\Models\Notification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'tanggal_lahir',
        'alamat',
        'deskripsi_diri',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getBerita() {
        return $this->belongsTo(Berita::class);
    }

    public function getLike() {
        return $this->belongsTo(Like::class);
    }

    public function getKomentar() {
        return $this->belongsTo(Komentar::class);
    }

    public function getLoker() {
        return $this->belongsTo(Loker::class);
    }

    public function getApplyLoker() {
        return $this->belongsTo(Apply_Loker::class);
    }

    public function getPengaduan() {
        return $this->belongsTo(Pengaduan::class);
    }

    public function getChat() {
        return $this->belongsTo(Chat::class);
    }

    public function getNotification() {
        return $this->belongsTo(Notification::class);
    }
}
