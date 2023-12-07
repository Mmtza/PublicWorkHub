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
            $lokerPublisherSide[] = User::where('id', $lokerside->id_user)->first();
        }
        $loker_applier = [];
        $user_loker_applier = [];
        $user_loker = [];
        $user_apply_loker = null;
        if (Auth::check()) 
        {
            $user_loker_applier = Apply_Loker::where('id_user', Auth::user()->id)->get();
            
            $no_loker_applier = 0;
            foreach ($user_loker_applier as $userapply)
            {
                $loker_applier[] = Loker::where('id', $userapply->id_loker)->first();
                $user_loker[] = User::where('id', $loker_applier[$no_loker_applier]->id_user)->first();
                $no_loker_applier++;
            }                                    
            $user_apply_loker = Apply_Loker::where('id_loker', $loker->id)->where('id_user', Auth::user()->id)->first();
        }
        confirmDelete();
        return view('users.pages.form_loker.loker', compact(
            'loker', 'lokerPublisher', 'loker_side', 'lokerPublisherSide', 
            'loker_applier', 'user_apply_loker', 'user_loker_applier', 'user_loker'
        ));
    }


    public function showLokerBySlug($slug)
    {
        $loker = Loker::findSlugGet($slug)->first();
        $lokerPublisher = User::where('id', $loker->id_user)->first()->name;
        $loker_side = Loker::orderBy('id', 'desc')->where('id', '!=', $loker->id)->get();
        $lokerPublisherSide = [];
        foreach ($loker_side as $lokerside)
        {
            $lokerPublisherSide[] = User::where('id', $lokerside->id_user)->first();
        }
        $loker_applier = [];
        $user_loker_applier = [];
        $user_loker = [];
        $user_apply_loker = null;
        if (Auth::check()) 
        {
            $user_loker_applier = Apply_Loker::where('id_user', Auth::user()->id)->get();
            
            $no_loker_applier = 0;
            foreach ($user_loker_applier as $userapply)
            {
                $loker_applier[] = Loker::where('id', $userapply->id_loker)->first();
                $user_loker[] = User::where('id', $loker_applier[$no_loker_applier]->id_user)->first();
                $no_loker_applier++;
            }                                    
            $user_apply_loker = Apply_Loker::where('id_loker', $loker->id)->where('id_user', Auth::user()->id)->first();
        }
        confirmDelete();
        return view('users.pages.form_loker.loker', compact(
            'loker', 'lokerPublisher', 'loker_side', 'lokerPublisherSide', 
            'loker_applier', 'user_apply_loker', 'user_loker_applier', 'user_loker'
        ));
    }

    public function applyLoker($slug)
    {
        if (Auth::check())
        {
            $loker = Loker::findSlugGet($slug)->first();
            Apply_Loker::insertGetId([
                'id_user' => Auth::user()->id,
                'id_loker' => $loker->id,
                'status' => 'menunggu',
                'waktu_apply' => now()
            ]);
            alert('Notifikasi', 'Berhasil mendaftar di lowongan pekerjaan', 'success');
            return redirect()->back();
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    public function cancelApplyLoker($slug)
    {        
        if (Auth::check())
        {
            $loker = Loker::findSlugGet($slug)->first();
            $applyLoker = Apply_Loker::where('id_user', Auth::user()->id)->where('id_loker', $loker->id)->first();
            Apply_Loker::destroy($applyLoker->id);
            alert('Notifikasi', 'Kamu batal mendaftar di lowongan pekerjaan', 'success');
            return redirect()->back();
        }
        else
        {
            return redirect()->route('login');
        }
    }
}
