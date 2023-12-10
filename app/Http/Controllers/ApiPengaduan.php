<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class ApiPengaduan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return response()->json($pengaduan, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'isi_pengaduan' => 'required|string',
            'file' => 'required|string',
        ]);

        $pengaduan = Pengaduan::create($request->all());

        return response()->json($pengaduan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return response()->json(['message' => 'Pengaduan not found'], 404);
        }

        return response()->json($pengaduan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'isi_pengaduan' => ['required', 'min:4', 'max:65000'],
            'file' => ['required']
        ], [
            'isi_pengaduan.required' => 'Isi tidak diperbolehkan kosong',
            'isi_pengaduan.max' => 'Isi diperbolehkan maksimal 65.000 karakter',
            'file.required' => 'File yang tidak diperbolehkan kosong'
        ]);

        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return response()->json(['message' => 'Pengaduan not found'], 404);
        }

        $pengaduan->update([
            'isi_pengaduan' => $data['isi_pengaduan'],
            'file' => $data['file']
        ]);

        // dd($pengaduan);

        return response()->json($pengaduan, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return response()->json(['message' => 'Pengaduan not found'], 404);
        } else {
            $pengaduan->delete();
        }


        return response()->json(['message' => 'Pengaduan deleted'], 200);
    }
}
