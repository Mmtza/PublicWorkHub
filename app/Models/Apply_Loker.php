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
        'id_user',
        'id_loker',
        'status',
        'waktu_apply'
    ];

    public $timestamps = false;

    public function getUser() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getLoker() {
        return $this->belongsTo(Loker::class, 'id_loker');
    }
}
