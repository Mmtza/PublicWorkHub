<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Kategori;
use Illuminate\Support\Str;
use App\Exports\LokerExport;
use Illuminate\Http\Request;
use App\Models\Loker_Has_Kategori;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LokerController extends Controller
{
    public function showAllLokerDashboard()
    {
        $loker = Loker::orderBy('id', 'desc')->get();
        $lokerCount = Loker::count();
        $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->with('getUser')->get();
        confirmDelete();
        return view('admins.pages.loker.all_loker', compact('loker', 'lokerCount', 'notification'));
    }

    public function viewAddLokerDashboard()
    {
        $kategori = Kategori::where('type', 'loker')->get();
        $publisherName = Auth::user()->name;
        $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->with('getUser')->get();
        return view('admins.pages.loker.tambah_loker', compact('kategori', 'publisherName', 'notification'));
    }

    public function viewEditLokerDashboard($slug)
    {
        $lokerSlug = Loker::findSlugFirst($slug);
        $publisher = Loker::with('getUser')->find($lokerSlug->id);
        $publisherName = $publisher->getUser()->first()->name;
        $kategori = Kategori::where('type', 'loker')->get();
        $loker = Loker::where('id', $lokerSlug->id)->with('getKategori')->first();
        $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->with('getUser')->get();
        confirmDelete();
        return view('admins.pages.loker.edit_loker', compact('kategori', 'loker', 'publisherName', 'notification'));
    }

    public function previewLokerDashboard($slug)
    {
        $loker = Loker::findSlugFirst($slug);
        $publisher = Loker::with('getUser')->find($loker->id);
        $publisherData = $publisher->getUser()->first();
        $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->with('getUser')->get();
        return view('admins.pages.loker.detail_loker', compact('loker', 'publisherData', 'notification'));
    }

    public function addLokerDashboard(Request $request)
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

        $waktu = now()->toDateTimeString();

        $dataLoker = Loker::insertGetId([
            'nama_loker' => $data['nama_loker'],
            'deskripsi_loker' => $data['deskripsi_loker'],
            'slug' => Str::slug($data['nama_loker']) . '-' . $waktu,
            'alamat' => $data['alamat_loker'],
            'id_user' => Auth::user()->id,
            'waktu_publikasi' => $waktu,
        ]);

        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori'])) {
            $kategori = $_POST['nama_kategori'];

            foreach ($kategori as $i) {
                $dataKategori = Kategori::where('nama_kategori', $i)->where('type', 'loker')->get();

                foreach ($dataKategori as $j) {
                    Loker_Has_Kategori::create([
                        'id_loker' => $dataLoker,
                        'id_kategori' => $j->id
                    ]);
                }
            }
        }
        alert('Notifikasi', 'Berhasil membuat loker', 'success');
        return redirect()->route('admin.loker');
    }

    public function editLokerDashboard(Request $request, $slug)
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

        $loker = Loker::findSlugFirst($slug);

        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori'])) {
            Loker_Has_Kategori::where('id_loker', $loker->id)->delete();
            $kategori = $_POST['nama_kategori'];
            foreach ($kategori as $i) {
                $dataKategori = Kategori::where('nama_kategori', $i)->where('type', 'loker')->get();

                foreach ($dataKategori as $j) {
                    Loker_Has_Kategori::create([
                        'id_loker' => $loker->id,
                        'id_kategori' => $j->id
                    ]);
                }
            }
        }

        $loker->nama_loker = $data['nama_loker'];
        $loker->deskripsi_loker = $data['deskripsi_loker'];
        $loker->alamat = $data['alamat_loker'];
        $loker->slug = $data['nama_loker'] . '-' . $loker->id . $loker->waktu_publikasi;
        $loker->save();
        alert('Notifikasi', 'Berhasil mengedit loker', 'success');

        return redirect()->route('admin.loker');
    }

    public function deleteLokerDashboard($slug)
    {
        $loker = Loker::findSlugFirst($slug);
        $notification = new NotificationController;
        $notification->storeNotification("🏢 loker kamu telah dihapus oleh admin", now(), "unread", Auth::user()->id, $loker->id_user);
        Loker::destroy($loker->id);
        alert('Notifikasi', 'Berhasil menghapus loker', 'success');
        return redirect()->route('admin.loker');
    }

    public function excelLokerDashboard(Request $request)
    {
        if (isset($request->start_date) && isset($request->end_date)) {
            return Excel::download(new LokerExport($request->start_date, $request->end_date, false), 'data_loker_' . $request->start_date . '-' . $request->end_date . '.xlsx');
        } else {
            return Excel::download(new LokerExport($request->start_date, $request->end_date, true), 'data_loker_' . date('d-m-Y') . '_all.xlsx');
        }
    }
}
