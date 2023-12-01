<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function showAllCrew()
    {
        $team = Team::all();
        return view('users.pages.team.all_crew', compact('team'));
    }
}
