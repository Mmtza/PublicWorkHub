<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Berita_Has_Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Berita::join('kategori', 'berita.id_kategori', '=', 'id.kategori')->get();
        $data = [
            "berita" => $model,
        ];
        // dd($model);
        return view("users.pages.blog", $data);
    }

    public function showAllBeritaDashboard()
    {
        $berita = Berita::all();
        $beritaCount = Berita::count();
        confirmDelete();
        return view('admins.pages.berita.all_berita', compact('berita', 'beritaCount'));
    }

    public function showAllBerita()
    {
        $beritaHasKategori = new Berita();

        $beritaHeadline = Berita::take(4)->get();
        $BeritaHasKategori = Berita_Has_Kategori::with('getKategori')->get();
        $allCategories = [];
        foreach ($BeritaHasKategori as $bk)
        {            
            $bk_array = $bk->getKategori()->get();
            $allCategories = array_merge($allCategories, $bk_array->toArray());        
        }
        $beritaMidLineCol = Berita::orderBy('id', 'desc')->skip(4)->take(2)->get();
        $beritaMidLineRow = Berita::orderBy('id', 'desc')->skip(8)->take(3)->get();
        $beritaMidLineCol2 = Berita::orderBy('id', 'desc')->skip(16)->take(4)->get();
        $beritaBotLineRow = Berita::orderBy('id', 'desc')->skip(32)->take(4)->get();
        $beritaBotLineCol = Berita::orderBy('id', 'desc')->skip(36)->take(1)->get();
        $beritaEndLine = Berita::orderBy('id', 'desc')->skip(32)->take(4)->get();
        return view('users.pages.berita.all_berita', compact(
            'beritaHeadline', 'allCategories', 
            'beritaMidLineRow', 'beritaMidLineCol', 'beritaMidLineCol2', 
            'beritaBotLineRow', 'beritaBotLineCol'
        ));
    }

    public function showBeritaBySlug(Request $request, $slug)
    {
        $berita = Berita::findSlug($slug);
        $berita_side = Berita::where('id', '!=', $berita->id)->take(5)->get();
        $publisher = Berita::with('getUser')->find($berita->id);
        $publisherName = $publisher->getUser()->first()->name;
        return view('users.pages.berita.detail_berita', compact('berita', 'berita_side', 'publisherName'));
    }

    public function previewBeritaDashboard($slug)
    {
        $berita = Berita::findSlug($slug);
        $publisher = Berita::with('getUser')->find($berita->id);
        $publisherName = $publisher->getUser()->first()->name;
        return view('admins.pages.berita.detail_berita', compact('berita', 'publisherName'));
    }

    public function viewEditBeritaDashboard($slug)
    {
        $berita = Berita::findSlug($slug);
        $publisher = Berita::with('getUser')->find($berita->id);
        $publisherName = $publisher->getUser()->first()->name;
        $kategori = Kategori::all();
        confirmDelete();
        return view('admins.pages.berita.edit_berita', compact('berita', 'publisherName', 'kategori'));
    }

    public function viewAddBeritaDashboard()
    {
        $kategori = Kategori::all();
        $publisherName = Auth::user()->name;
        return view('admins.pages.berita.tambah_berita', compact('kategori', 'publisherName'));
    }

    public function addBeritaDashboard(Request $request)
    {
        $data = $request->validate([
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'status_berita' => ['required', 'in:menunggu,aktif,tidak aktif'],
            'image_berita' => ['image', 'mimes:jpg,png,jpeg', 'max:70000']
        ], [
            'judul_berita.required' => 'Judul tidak diperbolehkan kosong',
            'judul_berita.min' => 'Judul diperbolehkan minimal 4 karakter',
            'judul_berita.max' => 'Judul diperbolehkan maksimal 65.000 karakter',
            'isi_berita.required' => 'Isi tidak diperbolehkan kosong',
            'isi_berita.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'status_berita.required' => 'Status tidak diperbolehkan kosong',
            'image_berita.mimes' => 'Image yang diperbolehkan type jpg,png,jpeg',
            'image_berita.max' => 'Image yang diperbolehkan maksimal 70mb',
        ]);

        if (isset($request->image_berita)) {

            $imageName = time() . '.' . $request->image_berita->extension();
            $request->image_berita->move(public_path('assets/berita/images/'), $imageName);
            $data['image_berita'] = $imageName;
        }
        $waktu = now()->toDateTimeString();
        $dataBerita = Berita::insertGetId([
            'judul' => $data['judul_berita'],
            'isi' => $data['isi_berita'],
            'slug' => Str::slug($data['judul_berita']) . '-' . $waktu,
            'status' => $data['status_berita'],
            'id_user' => Auth::user()->id,
            'waktu_publikasi' => $waktu,
            'img' => isset($request->image_berita) ? $data['image_berita'] : null
        ]);

        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori'])) {
            $kategori = $_POST['nama_kategori'];

            foreach ($kategori as $i) {
                $dataKategori = Kategori::where('nama_kategori', $i)->get();

                foreach ($dataKategori as $j) {
                    Berita_Has_Kategori::create([
                        'id_berita' => $dataBerita,
                        'id_kategori' => $j->id
                    ]);
                }
            }
        }
        alert('Notifikasi', 'Berhasil membuat berita', 'success');
        return redirect()->route('admin.berita');
    }

    public function editBeritaDashboard(Request $request, $slug)
    {
        $data = $request->validate([
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'status_berita' => ['required', 'in:menunggu,aktif,tidak aktif'],
            'image_berita' => ['image', 'mimes:jpg,png,jpeg', 'max:70000']
        ], [
            'judul_berita.required' => 'Judul tidak diperbolehkan kosong',
            'judul_berita.min' => 'Judul diperbolehkan minimal 4 karakter',
            'judul_berita.max' => 'Judul diperbolehkan maksimal 65.000 karakter',
            'isi_berita.required' => 'Isi tidak diperbolehkan kosong',
            'isi_berita.max' => 'Isi diperbolehkan maksimal 4.000.000.000 karakter',
            'nama_kategori.required' => 'Kategori tidak diperbolehkan kosong',
            'status_berita.required' => 'Status tidak diperbolehkan kosong',
            'image_berita.mimes' => 'Image yang diperbolehkan type jpg,png,jpeg',
            'image_berita.max' => 'Image yang diperbolehkan maksimal 70mb',
        ]);

        $berita = Berita::findSlug($slug);

        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori'])) {
            Berita_Has_Kategori::where('id_berita', $berita->id)->delete();
            $kategori = $_POST['nama_kategori'];
            foreach ($kategori as $i) {
                $dataKategori = Kategori::where('nama_kategori', $i)->get();

                foreach ($dataKategori as $j) {
                    Berita_Has_Kategori::create([
                        'id_berita' => $berita->id,
                        'id_kategori' => $j->id
                    ]);
                }
            }
        }


        if (isset($request->image_berita)) {
            $filePath = public_path('assets/berita/images/' . $berita->img);

            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }

            $imageName = time() . '.' . $request->image_berita->extension();
            $request->image_berita->move(public_path('assets/berita/images/'), $imageName);
            $data['image_berita'] = $imageName;
        } else {
            if (!isNull($berita->img)) {
                $data['image_berita'] = $berita->img;
            } else {
                $data['image_berita'] = null;
            }
        }

        $berita->judul = $data['judul_berita'];
        $berita->isi = $data['isi_berita'];
        $berita->status = $data['status_berita'];
        $berita->slug = Str::slug($data['judul_berita']) . $berita->id . $berita->waktu_publikasi;
        $berita->id_user = Auth::user()->id;
        $berita->img = $data['image_berita'];
        $berita->waktu_publikasi = now()->toDateTimeString();
        $berita->save();
        alert('Notifikasi', 'Berhasil mengedit berita', 'success');

        return redirect()->route('admin.berita');
    }

    public function deleteBeritaDashboard($slug)
    {
        $berita = Berita::findSlug($slug);

        if (!isNull($berita->img)) {
            $filePath = public_path('assets/berita/images/' . $berita->img);

            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }
        }
        Berita::destroy($berita->id);
        alert('Notifikasi', 'Berhasil menghapus berita', 'success');
        return redirect()->route('admin.berita');
    }
}
