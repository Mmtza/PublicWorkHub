<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiLoker extends Controller
{
    public function index()
    {
        $loker = Loker::all();
        return response()->json($loker, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_user' => ['required'],
            'nama_loker' => ['required', 'min:4', 'max:65000'],
            'deskripsi_loker' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'alamat_loker' => ['required', 'max:65000'],
        ], [
            'nama_loker.required' => 'Nama loker tidak diperbolehkan kosong',
            'nama_loker.min' => 'Nama loker diperbolehkan minimal 4 karakter',
            'nama_loker.max' => 'Nama loker diperbolehkan maksimal 65.000 karakter',
            'deskripsi_loker.required' => 'Deskripsi loker tidak diperbolehkan kosong',
            'deskripsi_loker.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'alamat_loker.required' => 'Alamat loker tidak diperbolehkan kosong',
            'alamat_loker.max' => 'Alamat loker diperbolehkan maksimal 65.000 karakter',
        ]);

        $waktu = now()->toDateTimeString();

        $dataLoker = Loker::create([
            'nama_loker' => $data['nama_loker'],
            'deskripsi_loker' => $data['deskripsi_loker'],
            'slug' => Str::slug($data['nama_loker']) . '-' . $waktu,
            'alamat' => $data['alamat_loker'],
            'id_user' => $data['id_user'],
            'waktu_publikasi' => $waktu,
        ]);

        return response()->json($dataLoker, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loker = Loker::find($id);

        if (!$loker) {
            return response()->json(['message' => 'Loker tidak ditemukan'], 404);
        }

        return response()->json($loker, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'nama_loker' => ['required', 'min:4', 'max:65000'],
            'deskripsi_loker' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'alamat_loker' => ['required', 'max:65000'],
        ], [
            'nama_loker.required' => 'Nama loker tidak diperbolehkan kosong',
            'nama_loker.min' => 'Nama loker diperbolehkan minimal 4 karakter',
            'nama_loker.max' => 'Nama loker diperbolehkan maksimal 65.000 karakter',
            'deskripsi_loker.required' => 'Deskripsi loker tidak diperbolehkan kosong',
            'deskripsi_loker.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'alamat_loker.required' => 'Alamat loker tidak diperbolehkan kosong',
            'alamat_loker.max' => 'Alamat loker diperbolehkan maksimal 65.000 karakter',
        ]);

        $loker = Loker::find($id);

        if (!$loker) {
            return response()->json(['message' => 'Loker tidak ditemukan'], 404);
        }

        $waktu = now()->toDateTimeString();
        $loker->update([
            'nama_loker' => $data['nama_loker'],
            'nama_kategori' => $data['nama_kategori'],
            'alamat_loker' => $data['alamat_loker'],
            'slug' => Str::slug($data['nama_loker']) . '-' . $loker->id . $waktu,
            'waktu_publikasi' => $waktu,
        ]);

        return response()->json($loker, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loker = Loker::find($id);

        if (!$loker) {
            return response()->json(['message' => 'Loker tidak ditemukan'], 404);
        } else {
            $loker->delete();
        }


        return response()->json(['message' => 'Loker berhasil dihapus'], 200);
    }
}
