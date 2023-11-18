<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showAllUsersDashboard()
    {
        return view('admins.pages.form_user.user');
    }

    public function viewEditUsers() {
        return view('admins.pages.form_user.edit_user');
    }

    public function viewAddUsers() {
        return view('admins.pages.form_user.tambah_users');
    }

    public function editUsers() {

    }

    public function addUsers() {

    }
}