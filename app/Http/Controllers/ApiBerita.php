<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiBerita extends Controller
{
    public function index()
    {
        $pengaduan = Berita::all();
        return response()->json($pengaduan, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_user' => ['required'],
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'status_berita' => ['required', 'in:menunggu,aktif,tidak aktif'],
            'image_berita' => ['required']
        ], [
            'judul_berita.required' => 'Judul tidak diperbolehkan kosong',
            'judul_berita.min' => 'Judul diperbolehkan minimal 4 karakter',
            'judul_berita.max' => 'Judul diperbolehkan maksimal 65.000 karakter',
            'isi_berita.required' => 'Isi tidak diperbolehkan kosong',
            'isi_berita.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'status_berita.required' => 'Status tidak diperbolehkan kosong',
            'image_berita.required' => 'Image tidak diperbolehkan kosong',
        ]);

        $waktu = now()->toDateTimeString();
        $dataBerita = Berita::create([
            'judul' => $data['judul_berita'],
            'isi' => $data['isi_berita'],
            'slug' => Str::slug($data['judul_berita']) . '-' . $waktu,
            'status' => $data['status_berita'],
            'id_user' => $data['id_user'],
            'waktu_publikasi' => $waktu,
            'img' => $data['image_berita']
        ]);

        // $pengaduan = Berita::create($request->all());

        return response()->json($dataBerita, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengaduan = Berita::find($id);

        if (!$pengaduan) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        return response()->json($pengaduan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'status_berita' => ['required', 'in:menunggu,aktif,tidak aktif'],
            'image_berita' => ['required']
        ], [
            'judul_berita.required' => 'Judul tidak diperbolehkan kosong',
            'judul_berita.min' => 'Judul diperbolehkan minimal 4 karakter',
            'judul_berita.max' => 'Judul diperbolehkan maksimal 65.000 karakter',
            'isi_berita.required' => 'Isi tidak diperbolehkan kosong',
            'isi_berita.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'status_berita.required' => 'Status tidak diperbolehkan kosong',
            'image_berita.required' => 'Image tidak diperbolehkan kosong',
        ]);

        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        $waktu = now()->toDateTimeString();
        $berita->update([
            'judul' => $data['judul_berita'],
            'isi' => $data['isi_berita'],
            'slug' => Str::slug($data['judul_berita']) . '-' . $waktu,
            'status' => $data['status_berita'],
            'waktu_publikasi' => $waktu,
            'img' => $data['image_berita']
        ]);

        // dd($pengaduan);

        return response()->json($berita, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        } else {
            $berita->delete();
        }


        return response()->json(['message' => 'Berita berhasil dihapus'], 200);
    }
}
