<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function showAllPengaduanDashboard()
    {
        return view('admins.pages.form_pengaduan.pengaduan');
    }
}
