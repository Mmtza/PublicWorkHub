<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function showAllLokerDashboard()
    {
        return view('admins.pages.loker.all_loker');
    }

    public function viewAddLokerDashboard()
    {
        return view('admins.pages.loker.tambah_loker');
    }

    public function viewEditLokerDashboard()
    {
        return view('admins.pages.loker.edit_loker');
    }

    public function addLokerDashboard()
    {
        
    }

    public function editLokerDashboard()
    {
        
    }

    public function deleteLokerDashboard()
    {

    }
}
