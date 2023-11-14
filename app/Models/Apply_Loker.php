<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apply_Loker extends Model
{
    use HasFactory;

    protected $table = 'apply_loker';

    protected $fillable = [
        'status',
        'waktu_apply'
    ];

    public function getUser() {
        return $this->hasMany(User::class);
    }

    public function getLoker() {
        return $this->hasOne(Loker::class);
    }
}
