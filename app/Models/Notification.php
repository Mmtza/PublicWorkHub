<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'isi',
        'waktu_notifikasi',
        'status',
        'id_user',
        'id_has_user',
    ];

    public $timestamps = false;

    public function getUser() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getHasUser() {
        return $this->belongsTo(User::class, 'id_has_user');
    }
}
