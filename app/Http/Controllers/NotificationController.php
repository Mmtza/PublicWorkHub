<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function storeNotificationToAllAdmin($isi, $waktu, $status, $id_user) 
    {
        $users = User::where('role', 'admin')->get();

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

    public function storeNotificationToAll($isi, $waktu, $status, $id_user) 
    {
        $users = User::where('role', 'user')->get();

        foreach($users as $user)
        {
            Notification::create([
                'isi' => $isi,
                'waktu_notifikasi' => $waktu,
                'status' => $status,
                'id_user' => $id_user,
                'id_has_user' => $user->id
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

    public function markAsReadNotification($id) 
    {
        $notification = Notification::where('id', $id)->where('id_has_user', Auth::user()->id)->first();
        $notification->status = 'read';
        $notification->save(); 
        return redirect()->back();
    }

    public function markAsReadAllNotification()
    {
        Notification::where('id_has_user', Auth::user()->id)->update(['status' => 'read']);
        return redirect()->back();
    }
}
