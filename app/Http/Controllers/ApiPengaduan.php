<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\ApiResource;

use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Validator;

class ApiPengaduan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        if ($pengaduan)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data semua pengaduan', $pengaduan);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data semua pengaduan, tidak ada data', $pengaduan);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $rules = [
            'id_user' => ['required', Rule::exists(User::class, 'id')],
            'isi_pengaduan' => ['required', 'min:4', 'max:65000'],
            'file' => ['file', 'mimes:jpg,png,jpeg,pdf,doc,docx', 'max:70000']
        ];

        $messages = [
            'id_user.required' => 'Id user tidak diperbolehkan kosong',
            'isi_pengaduan.required' => 'Isi tidak diperbolehkan kosong',
            'file.max' => 'Isi diperbolehkan maksimal 65.000 karakter',
            'file.mimes' => 'File yang diperbolehkan type jpg,png,jpeg,pdf,doc,docx',
            'file.max' => 'File yang diperbolehkan maksimal 70mb'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();

        $pengaduan = Pengaduan::insertGetId([
            'id_user' => $validatedData['id_user'],
            'isi_pengaduan' => $validatedData['isi_pengaduan'],
            'file' => $validatedData['file'],
        ]);
        $imageName = $pengaduan . time() . '.' . $request->file->extension();
        $request->file->move(public_path('assets/pengaduan/files/'), $imageName);
        $validatedData['file'] = $imageName;
        
        $dataPengaduan = Pengaduan::find($pengaduan);
        $dataPengaduan->file = $validatedData['file'];
        $dataPengaduan->save();

        return new ApiResource(201, true, 'Berhasil membuat pengaduan', $dataPengaduan);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);

        if ($pengaduan)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data pengaduan', $pengaduan);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data pengaduan, tidak ada data', $pengaduan);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
    
        if (!$pengaduan)
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data pengaduan, tidak ada data', $pengaduan);
        }

        $rules = [
            'id_user' => ['required', Rule::exists(User::class, 'id')],
            'isi_pengaduan' => ['required', 'min:4', 'max:65000'],
            'file' => ['file', 'mimes:jpg,png,jpeg,pdf,doc,docx', 'max:70000']
        ];

        $messages = [
            'id_user.required' => 'Id user tidak diperbolehkan kosong',
            'isi_pengaduan.required' => 'Isi tidak diperbolehkan kosong',
            'file.max' => 'Isi diperbolehkan maksimal 65.000 karakter',
            'file.mimes' => 'File yang diperbolehkan type jpg,png,jpeg,pdf,doc,docx',
            'file.max' => 'File yang diperbolehkan maksimal 70mb'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }

        $validatedData = $validator->validated();

        if (isset($file)) {

            $filePath = public_path('assets/pengaduan/files/'. $pengaduan->file);
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);                
            }
            $imageName = $pengaduan->id . time() . '.' . $file->extension();
            $file->move(public_path('assets/pengaduan/files/'), $imageName);
            $validatedData['file'] = $imageName;
        }
        else 
        {
            if (!$pengaduan->file)
            {
                $pengaduan->file = null;                
            }
            else
            {
                $pengaduan->file = $pengaduan->file;                
            }
        }        

        $pengaduan->update([
            'isi_pengaduan' => $validatedData['isi_pengaduan'],
            'file' => $validatedData['file']
        ]);

        // dd($pengaduan);

        return new ApiResource(200, true, 'Berhasil mengubah data pengaduan', $pengaduan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan)
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data pengaduan, tidak ada data', $pengaduan);
        }
        
        $pengaduanDump = $pengaduan;
        $pengaduan->delete();

        return new ApiResource(200, true, 'Berhasil menghapus pengaduan', $pengaduanDump);
    }
}
