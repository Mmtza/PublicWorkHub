<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Apply_Loker;
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
        $loker = Loker::orderBy('id', 'desc')->first();
        $lokerPublisher = User::where('id', $loker->id_user)->first()->name;
        $loker_side = Loker::orderBy('id', 'desc')->where('id', '!=', $loker->id)->get();
        $lokerPublisherSide = [];
        foreach ($loker_side as $lokerside)
        {
            $loker_user = User::where('id', $lokerside->id_user)->first()->name;
            $lokerPublisherSide[] = $loker_user;
        }
        $loker_applier = [];
        if (Auth::check()) 
        {
            $loker_applier = Apply_Loker::where('id_user', Auth::user()->id)->get();
        }
        return view('users.pages.form_loker.loker', compact('loker', 'lokerPublisher', 'loker_side', 'lokerPublisherSide', 'loker_applier'));
    }


    public function showLokerBySlug($slug)
    {
        $loker = Loker::findSlug($slug)->first();
        $loker_side = Loker::orderBy('id', 'desc')->where('id', '!=', $loker->id)->get();
        $loker_applier = [];
        if (Auth::check()) 
        {
            $loker_applier = Apply_Loker::where('id_user', Auth::user()->id)->get();
        }
        return view('users.pages.form_loker.loker', compact('loker', 'loker_side', 'loker_applier'));
    }
}
