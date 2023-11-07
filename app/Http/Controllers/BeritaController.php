<?php

namespace App\Http\Controllers;

use App\Models\Berita_Model;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Berita_Model::join('kategori', 'berita.id_kategori', '=', 'kategori.id')->get();
        $data = [
            "berita" => $model,
        ];
        // dd($model);
        return view("frontend.pages.blog", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita_Model $berita_Model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita_Model $berita_Model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita_Model $berita_Model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita_Model $berita_Model)
    {
        //
    }
}
