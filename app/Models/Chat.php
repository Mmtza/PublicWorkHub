<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';

    protected $fillable = [
        'isi_chat',
        'file',
        'waktu_chat'
    ];

    public function getUser() {
        return $this->hasMany(User::class);
    }

    public function getLoker() {
        return $this->hasMany(Loker::class);
    }
}
