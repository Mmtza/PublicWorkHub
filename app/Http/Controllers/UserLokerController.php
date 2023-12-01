<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Berita_Has_Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class UserLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Berita::join('kategori', 'berita.id_kategori', '=', 'id.kategori')->get();
        $data = [
            "berita" => $model,
        ];
        // dd($model);
        return view("users.pages.blog", $data);
    }

    public function showAllLoker()
    {
        return view('users.pages.form_loker.loker');
    }

}
