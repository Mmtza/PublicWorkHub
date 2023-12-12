<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function showAllCrew()
    {
        $team = Team::all();
        $beritaFooterLine = Berita::orderBy('id', 'desc')->skip(24)->take(3)->get();
        return view('users.pages.team.all_crew', compact('team', 'beritaFooterLine'));
    }
}
