<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function storeNotificationToAll($isi, $waktu, $status, $id_user) 
    {
        $users = User::all();

        foreach ($users as $u)
        {
            Notification::create([
                'isi' => $isi,
                'waktu_notifikasi' => $waktu,
                'status' => $status,
                'id_user' => $id_user,
                'id_has_user' => $u->id
            ]);
        }
    }

    public function storeNotification($isi, $waktu, $status, $id_user, $id_has_user) 
    {
        Notification::create([
            'isi' => $isi,
            'waktu_notifikasi' => $waktu,
            'status' => $status,
            'id_user' => $id_user,
            'id_has_user' => $id_has_user
        ]);
    }

    public function markAsReadNotification($id, $id_has_user) 
    {
        $notification = Notification::where('id', $id)->where('id_has_user', $id_has_user);
        $notification->status = 'read';
        $notification->save(); 
    }

    public function markAsReadAllNotification($id_has_user)
    {
        Notification::where('id_has_user', $id_has_user)->update(['status' => 'read']);
    }
}
