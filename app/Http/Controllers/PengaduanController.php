<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function showAllPengaduanDashboard()
    {
        return view('admins.pages.form_pengaduan.pengaduan');
    }

    public function viewEditPengaduan() {
        return view('admins.pages.form_pengaduan.edit_pengaduan');
    }

    public function viewAddPengaduan() {
        return view('admins.pages.form_pengaduan.tambah_pengaduan');
    }

    public function editPengaduan() {

    }

    public function addPengaduan() {

    }
}
