<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showAllUsersDashboard()
    {
        return view('admins.pages.form_user.user');
    }
}
