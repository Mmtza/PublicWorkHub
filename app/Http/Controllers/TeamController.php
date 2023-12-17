<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function showAllCrew()
    {
        $team = Team::all();
        $beritaFooterLine = Berita::orderBy('id', 'desc')->skip(24)->take(3)->get();
        $notification = [];
        if (Auth::check())
        {
            $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->get();
        }
        return view('users.pages.team.all_crew', compact('team', 'beritaFooterLine', 'notification'));
    }
}
