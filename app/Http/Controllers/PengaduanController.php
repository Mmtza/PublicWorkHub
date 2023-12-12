<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;


class PengaduanController extends Controller {
    public function showAllPengaduanDashboard() {
        $pengaduan = Pengaduan::all();
        confirmDelete();
        return view('admins.pages.form_pengaduan.all_pengaduan', compact('pengaduan'));
    }

    public function viewEditPengaduanDashboard(Request $request, $id) {
        $pengaduan = Pengaduan::find($id);

        return view('admins.pages.form_pengaduan.edit_pengaduan', compact('pengaduan'));
    }

    public function viewAddPengaduan() {
        return view('admins.pages.form_pengaduan.tambah_pengaduan');
    }

    public function showPengaduanUser() {
        if (Auth::check())
        {
            $pengaduan = Pengaduan::where('id_user', Auth::user()->id)->get();
            $beritaFooterLine = Berita::orderBy('id', 'desc')->skip(24)->take(3)->get();
        
            // dd($data);
            return view('users.pages.form_pengaduan.pengaduan', compact('pengaduan', 'beritaFooterLine'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function addPengaduan(Request $request) {
        $data = $request->validate([
            'isi_pengaduan' => ['required', 'min:4', 'max:65000'],
            'file_pengaduan' => ['file', 'mimes:jpg,png,jpeg,pdf,doc,docx', 'max:70000']
        ], [
            'isi_pengaduan.required' => 'Isi tidak diperbolehkan kosong',
            'isi_pengaduan.max' => 'Isi diperbolehkan maksimal 65.000 karakter',
            'file_pengaduan.mimes' => 'File yang diperbolehkan type jpg,png,jpeg,pdf,doc,docx',
            'file_pengaduan.max' => 'File yang diperbolehkan maksimal 70mb'
        ]);

        if(isset($request->file_pengaduan)) {

            $fileName = time().'.'.$request->file_pengaduan->extension();
            $request->file_pengaduan->move(public_path('assets/pengaduan/files/'), $fileName);
            $data['file_pengaduan'] = $fileName;
        }
        $waktu = now()->toDateTimeString();

        $dataPengaduan = Pengaduan::insert([
            'id_user' => auth()->user()->id,
            'isi_pengaduan' => $data['isi_pengaduan'],
            'waktu_pengaduan' => $waktu,
            'file' => isset($request->file_pengaduan) ? $data['file_pengaduan'] : null
        ]);

        // dd($dataPengaduan);
        alert('Notifikasi', 'Berhasil membuat pengaduan', 'success');
        return redirect()->route('users.pengaduan');
    }

    public function addPengaduanDashboard(Request $request) {
        $data = $request->validate([
            'isi_pengaduan' => ['required', 'min:4', 'max:65000'],
            'status' => ['required'],
            'file_pengaduan' => ['file', 'mimes:jpg,png,jpeg,pdf,doc,docx', 'max:70000']
        ], [
            'isi_pengaduan.required' => 'Isi tidak diperbolehkan kosong',
            'isi_pengaduan.max' => 'Isi diperbolehkan maksimal 65.000 karakter',
            'file_pengaduan.mimes' => 'File yang diperbolehkan type jpg,png,jpeg,pdf,doc,docx',
            'file_pengaduan.max' => 'File yang diperbolehkan maksimal 70mb'
        ]);

        if(isset($request->file_pengaduan)) {

            $fileName = time().'.'.$request->file_pengaduan->extension();
            $request->file_pengaduan->move(public_path('assets/pengaduan/files/'), $fileName);
            $data['file_pengaduan'] = $fileName;
        }
        $waktu = now()->toDateTimeString();

        $dataPengaduan = Pengaduan::insert([
            'id_user' => auth()->user()->id,
            'isi_pengaduan' => $data['isi_pengaduan'],
            'waktu_pengaduan' => $waktu,
            'status' => $data['status'],
            'file' => isset($request->file_pengaduan) ? $data['file_pengaduan'] : null
        ]);

        // dd($dataPengaduan);
        alert('Notifikasi', 'Berhasil membuat pengaduan', 'success');
        return redirect()->route('admin.pengaduan');
    }

    public function editPengaduanDashboard(Request $request, $id) {
        $data = $request->validate([
            'isi_pengaduan' => ['required', 'min:4', 'max:65000'],
            'status' => ['required'],
            'file_pengaduan' => ['file', 'mimes:jpg,png,jpeg,pdf,doc,docx', 'max:70000']
        ], [
            'isi_pengaduan.required' => 'Isi tidak diperbolehkan kosong',
            'isi_pengaduan.max' => 'Isi diperbolehkan maksimal 65.000 karakter',
            'file_pengaduan.mimes' => 'File yang diperbolehkan type jpg,png,jpeg,pdf,doc,docx',
            'file_pengaduan.max' => 'File yang diperbolehkan maksimal 70mb'
        ]);

        $pengaduan = Pengaduan::find($id);


        if(isset($request->file_berita)) {
            $filePath = public_path('assets/pengaduan/files/'.$pengaduan->file);

            if(file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }

            $fileName = time().'.'.$request->file_pengaduan->extension();
            $request->file_pengaduan->move(public_path('assets/pengaduan/files/'), $fileName);
            $data['file_pengaduan'] = $fileName;
        } else {
            if($pengaduan->file) {
                $data['file_pengaduan'] = $pengaduan->file;
            } else {
                $data['file_pengaduan'] = null;
            }

        }
        $waktu = now()->toDateTimeString();

        $pengaduan->update([
            'isi_pengaduan' => $data['isi_pengaduan'],
            'waktu_pengaduan' => $waktu,
            'status' => $data['status'],
            'file' => $data['file_pengaduan']
        ]);

        alert('Notifikasi', 'Berhasil mengedit pengaduan', 'success');
        // Tambahkan redir ke tampilan admin/pengaduan
        return redirect()->route('admin.pengaduan');
    }

    public function downloadFiles(Request $request, $file) {
        $pengaduan = Pengaduan::where('file', $file)->first();
        $filePengaduan = $pengaduan->file;
        $filePath = public_path('assets/pengaduan/files/'.$filePengaduan);
        // Set the Content-Disposition header
        $headers = [
            'Content-Disposition' => 'attachment; filename="'.$filePengaduan.'"',
        ];


        if(file_exists($filePath) && is_file($filePath)) {
            return response()->download($filePath, 'File-pengaduan-'.$filePengaduan, $headers);
        }
        return redirect()->back();
    }

    public function deletePengaduanDashboard($id) {
        $pengaduan = Pengaduan::find($id);

        if(!isNull($pengaduan->file)) {
            $filePath = public_path('assets/pengaduan/files/'.$pengaduan->file);

            if(file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }
            Pengaduan::destroy($pengaduan->id);
        }

        Pengaduan::destroy($pengaduan->id);
        alert('Notifikasi', 'Berhasil menghapus data pengaduan', 'success');
        return redirect()->route('admin.pengaduan');

    }

    public function cetakLaporanPdf() {
        $pengaduan = Pengaduan::all(); //eloquent
        $data = [
            'pengaduan' => $pengaduan
        ];
        $pdf = Pdf::loadView(
            'admins.pages.form_pengaduan.pengaduan_pdf',
            $data
        );
        // dd($pdf);
        // return $pdf->download('data_pengaduan_' . date('d-m-Y') . '.pdf');
        return $pdf->download('data_pengaduan_'.date('d-m-Y').'.pdf');
    }

}
