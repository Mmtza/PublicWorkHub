<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function showAllPengaduanDashboard()
    {
        return view('admins.pages.form_pengaduan.pengaduan');
    }

    public function viewEditPengaduan()
    {
        return view('admins.pages.form_pengaduan.edit_pengaduan');
    }

    public function viewAddPengaduan()
    {
        return view('admins.pages.form_pengaduan.tambah_pengaduan');
    }

    public function showPengaduanUser()
    {
        $user_id = auth()->user()->id;

        $data = [
            'pengaduan' => Pengaduan::where('id', $user_id)->get()
        ];

        // dd($data);
        return view('users.pages.form_pengaduan.pengaduan', $data);
    }

    public function addPengaduan(Request $request)
    {
        $data = $request->validate([
            'isi_pengaduan' => ['required', 'min:4', 'max:65000'],
            'file_pengaduan' => ['file', 'mimes:jpg,png,jpeg,pdf,doc,docx', 'max:70000']
        ]);

        if (isset($data['file_pengaduan'])) {

            $fileName = time() . '.' . $request->file_pengaduan->extension();
            $request->file_pengaduan->move(public_path('assets/pengaduan/files/'), $fileName);
            $data['file_pengaduan'] = $fileName;
        }
        $waktu = now()->toDateTimeString();

        $dataPengaduan = Pengaduan::insert([
            'id_user' => auth()->user()->id,
            'isi_pengaduan' => $data['isi_pengaduan'],
            'waktu_pengaduan' => $waktu,
            'file' => isset($data['file_pengaduan']) ? $data['file_pengaduan'] : null
        ]);
        alert('Notifikasi', 'Berhasil membuat pengaduan', 'success');
        return redirect()->route('users.pengaduan');
    }

    public function editPengaduan()
    {

    }
}
