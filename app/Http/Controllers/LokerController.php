<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Loker_Has_Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    public function showAllLokerDashboard()
    {
        $loker = Loker::all();
        return view('admins.pages.loker.all_loker', compact('loker'));
    }

    public function viewAddLokerDashboard()
    {
        $kategori = Kategori::all();
        $publisherName = Auth::user()->name;
        return view('admins.pages.loker.tambah_loker', compact('kategori', 'publisherName'));
    }

    public function viewEditLokerDashboard($slug)
    {
        $loker = Loker::findSlug($slug);
        $publisher = Loker::with('getUser')->find($loker->id);
        $publisherName = $publisher->getUser()->first()->name;
        $kategori = Kategori::all();
        confirmDelete();
        return view('admins.pages.loker.edit_loker', compact('kategori', 'loker', 'publisherName'));
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

        $lastID = Loker::orderBy('id', 'desc')->first();
        $dataLoker = Loker::insertGetId([
            'nama_loker' => $data['nama_loker'],
            'deskripsi_loker' => $data['deskripsi_loker'],
            'slug' => Str::slug($data['nama_loker']) . '-'. $lastID->id+1 . $waktu,
            'alamat' => $data['alamat_loker'],
            'id_user' => Auth::user()->id,
            'waktu_publikasi' => $waktu,
        ]);

        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori'])) {
            $kategori = $_POST['nama_kategori'];

            foreach ($kategori as $i) {
                $dataKategori = Kategori::where('nama_kategori', $i)->get();

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

        $loker = Loker::findSlug($slug);

        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori'])) {
            Loker_Has_Kategori::where('id_loker', $loker->id)->delete();
            $kategori = $_POST['nama_kategori'];
            foreach ($kategori as $i) {
                $dataKategori = Kategori::where('nama_kategori', $i)->get();

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
        $loker->slug = $data['nama_loker'].'-'.$loker->id . $loker->waktu_publikasi;
        $loker->id_user = Auth::user()->id;
        $loker->waktu_publikasi = now()->toDateTimeString();
        $loker->save();
        alert('Notifikasi', 'Berhasil mengedit loker', 'success');

        return redirect()->route('admin.loker');
    }

    public function deleteLokerDashboard($slug)
    {
        $loker = Loker::findSlug($slug);
        Loker::destroy($loker->id);
        alert('Notifikasi', 'Berhasil menghapus loker', 'success');
        return redirect()->route('admin.loker');
    }
}
