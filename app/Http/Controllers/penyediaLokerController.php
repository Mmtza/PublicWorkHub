<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class penyediaLokerController extends Controller
{
    public function showAllLokerDashboard()
    {
        return view('penyedia_loker.pages.all_loker');
    }

    public function viewAddLokerDashboard()
    {
        return view('penyedia_loker.pages.tambah_loker');
    }

    public function viewEditLokerDashboard()
    {
        return view('penyedia_loker.pages.edit_loker');
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
