<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiLoker extends Controller
{
    public function index()
    {
        $loker = Loker::all();
        if ($loker)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data semua loker', $loker);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data semua loker, tidak ada data', $loker);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_user' => ['required'],
            'nama_loker' => ['required', 'min:4', 'max:65000'],
            'deskripsi_loker' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'alamat_loker' => ['required', 'max:65000'],
        ];
        
        $messages = [
            'nama_loker.required' => 'Nama loker tidak diperbolehkan kosong',
            'nama_loker.min' => 'Nama loker diperbolehkan minimal 4 karakter',
            'nama_loker.max' => 'Nama loker diperbolehkan maksimal 65.000 karakter',
            'deskripsi_loker.required' => 'Deskripsi loker tidak diperbolehkan kosong',
            'deskripsi_loker.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'alamat_loker.required' => 'Alamat loker tidak diperbolehkan kosong',
            'alamat_loker.max' => 'Alamat loker diperbolehkan maksimal 65.000 karakter',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();

        $waktu = now()->toDateTimeString();

        $dataLoker = Loker::create([
            'nama_loker' => $validatedData['nama_loker'],
            'deskripsi_loker' => $validatedData['deskripsi_loker'],
            'slug' => Str::slug($validatedData['nama_loker']) . '-' . $waktu,
            'alamat' => $validatedData['alamat_loker'],
            'id_user' => $validatedData['id_user'],
            'waktu_publikasi' => $waktu,
        ]);

        return new ApiResource(201, true, 'Berhasil membuat loker', $dataLoker);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loker = Loker::find($id);

        if ($loker)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data loker', $loker);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data loker, tidak ada data', $loker);
        }    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'nama_loker' => ['required', 'min:4', 'max:65000'],
            'deskripsi_loker' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'alamat_loker' => ['required', 'max:65000'],
        ];
        
        $messages = [
            'nama_loker.required' => 'Nama loker tidak diperbolehkan kosong',
            'nama_loker.min' => 'Nama loker diperbolehkan minimal 4 karakter',
            'nama_loker.max' => 'Nama loker diperbolehkan maksimal 65.000 karakter',
            'deskripsi_loker.required' => 'Deskripsi loker tidak diperbolehkan kosong',
            'deskripsi_loker.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'alamat_loker.required' => 'Alamat loker tidak diperbolehkan kosong',
            'alamat_loker.max' => 'Alamat loker diperbolehkan maksimal 65.000 karakter',
        ];

        $loker = Loker::find($id);

        if (!$loker)
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data loker, tidak ada data', $loker);
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();

        $waktu = now()->toDateTimeString();
        $loker->update([
            'nama_loker' => $validatedData['nama_loker'],
            'nama_kategori' => $validatedData['nama_kategori'],
            'alamat_loker' => $validatedData['alamat_loker'],
            'slug' => Str::slug($validatedData['nama_loker']) . '-' . $loker->id . $waktu,
            'waktu_publikasi' => $waktu,
        ]);

        return new ApiResource(200, true, 'Berhasil mengubah data berita', $loker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loker = Loker::find($id);

        if (!$loker)
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data loker, tidak ada data', $loker);            
        }

        $lokerDump = $loker;
        $loker->delete();
        return new ApiResource(200, true, 'Berhasil menghapus berita', $lokerDump);
    }
}
