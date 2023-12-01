<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenyediaLokerController extends Controller
{
    public function showAllLokerDashboard()
    {
        $loker = Loker::where('id_user', Auth::user()->id)->get();
        $lokerCount = Loker::where('id_user', Auth::user()->id)->count();
        return view('penyedia_loker.pages.all_loker', compact('loker', 'lokerCount'));
    }

    public function showAllApplier()
    {
        return view('penyedia_loker.pages.applier_loker');
    }

    public function viewAddLokerDashboard()
    {
        $kategori = Kategori::all();
        $publisherName = Auth::user()->name;
        return view('penyedia_loker.pages.tambah_loker', compact('kategori', 'publisherName'));
    }

    public function viewEditLokerDashboard($slug)
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
