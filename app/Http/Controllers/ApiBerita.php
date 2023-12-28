<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\ApiResource;

use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Validator;

class ApiBerita extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        if ($berita)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data semua berita', $berita);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data semua berita, tidak ada data', $berita);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_user' => ['required', Rule::exists(User::class, 'id')],
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'status_berita' => ['required', 'in:menunggu,aktif,tidak aktif'],
            'image_berita' => ['required']
        ];
        
        $messages = [
            'id_user.required' => 'Id user tidak diperbolehkan kosong',
            'judul_berita.required' => 'Judul tidak diperbolehkan kosong',
            'judul_berita.min' => 'Judul diperbolehkan minimal 4 karakter',
            'judul_berita.max' => 'Judul diperbolehkan maksimal 65.000 karakter',
            'isi_berita.required' => 'Isi tidak diperbolehkan kosong',
            'isi_berita.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'status_berita.required' => 'Status tidak diperbolehkan kosong',
            'image_berita.required' => 'Image tidak diperbolehkan kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();

        $waktu = now()->toDateTimeString();
        $berita = Berita::insertGetId([
            'judul' => $validatedData['judul_berita'],
            'isi' => $validatedData['isi_berita'],
            'slug' => Str::slug($validatedData['judul_berita']) . '-' . $waktu,
            'status' => $validatedData['status_berita'],
            'id_user' => $validatedData['id_user'],
            'waktu_publikasi' => $waktu,
        ]);
        $imageName = $berita . time() . '.' . $request->image_berita->extension();
        $request->image_berita->move(public_path('assets/berita/images/'), $imageName);
        $validatedData['image_berita'] = $imageName;
        
        $dataBerita = Berita::find($berita);
        $dataBerita->image_berita = $validatedData['foto'];
        $dataBerita->save();

        return new ApiResource(201, true, 'Berhasil membuat berita', $dataBerita);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita = Berita::find($id);

        if ($berita)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data berita', $berita);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data berita, tidak ada data', $berita);
        }    
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {        
        $berita = Berita::find($id);
    
        if (!$berita)
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data berita, tidak ada data', $berita);
        }

        $rules = [
            'id_user' => ['required', Rule::exists(User::class, 'id')],
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'status_berita' => ['required', 'in:menunggu,aktif,tidak aktif'],
            'image_berita' => ['required']
        ];
        
        $messages = [
            'id_user.required' => 'Id user tidak diperbolehkan kosong',
            'judul_berita.required' => 'Judul tidak diperbolehkan kosong',
            'judul_berita.min' => 'Judul diperbolehkan minimal 4 karakter',
            'judul_berita.max' => 'Judul diperbolehkan maksimal 65.000 karakter',
            'isi_berita.required' => 'Isi tidak diperbolehkan kosong',
            'isi_berita.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'status_berita.required' => 'Status tidak diperbolehkan kosong',
            'image_berita.required' => 'Image tidak diperbolehkan kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();
        if (isset($image_berita)) {

            $filePath = public_path('assets/berita/images/'. $berita->img);
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);                
            }
            $imageName = $berita->id . time() . '.' . $image_berita->extension();
            $image_berita->move(public_path('assets/berita/images/'), $imageName);
            $validatedData['image_berita'] = $imageName;
        }
        else 
        {
            if (!$berita->foto)
            {
                $berita->img = null;                
            }
            else
            {
                $berita->img = $berita->img;                
            }
        }        

        $waktu = now()->toDateTimeString();
        $berita->update([
            'id_user' => $validatedData['id_user'],
            'judul' => $validatedData['judul_berita'],
            'isi' => $validatedData['isi_berita'],
            'slug' => Str::slug($validatedData['judul_berita']) . '-' . $waktu,
            'status' => $validatedData['status_berita'],
            'waktu_publikasi' => $waktu,
            'img' => $validatedData['image_berita']
        ]);

        // dd($pengaduan);

        return new ApiResource(200, true, 'Berhasil mengubah data berita', $berita);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        if (!$berita)
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data berita, tidak ada data', $berita);            
        }

        if ($berita->img) {
            $filePath = public_path('assets/berita/images/' . $berita->img);
            
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }
        }        
        $beritaDump = $berita;
        $berita->delete();
        return new ApiResource(200, true, 'Berhasil menghapus berita', $beritaDump);
    }
}
