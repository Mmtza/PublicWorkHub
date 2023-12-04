<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Berita_Has_Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenulisBeritaController extends Controller
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
        $berita = Berita::where('id_user', Auth::user()->id)->get();
        $beritaCount = Berita::where('id_user', Auth::user()->id)->count();
        confirmDelete();
        return view('penulis.pages.all_berita', compact('berita', 'beritaCount'));
    }

    public function viewEditBeritaDashboard($slug)
    {
        $berita = Berita::findSlug($slug);
        $publisher = Berita::with('getUser')->find($berita->id);
        $publisherName = $publisher->getUser()->first()->name;
        $kategori = Kategori::all();
        confirmDelete();
        return view('penulis.pages.edit_berita', compact('berita', 'publisherName', 'kategori'));
    }

    public function previewBeritaDashboard($slug)
    {
        $berita = Berita::findSlug($slug);
        $publisher = Berita::with('getUser')->find($berita->id);
        $publisherName = $publisher->getUser()->first()->name;
        return view('penulis.pages.detail_berita', compact('berita', 'publisherName'));
    }

    public function viewAddBeritaDashboard()
    {
        $kategori = Kategori::all();
        return view('penulis.pages.tambah_berita', compact('kategori'));
    }

    public function addBeritaDashboard(Request $request)
    {
        $data = $request->validate([
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'image_berita' => ['image', 'mimes:jpg,png,jpeg', 'max:70000']
        ]);
        
        if (isset($data['image_berita'])) {

            $imageName = time() . '.' . $request->image_berita->extension();
            $request->image_berita->move(public_path('assets/berita/images/'), $imageName);
            $data['image_berita'] = $imageName;
        }
        $waktu = now()->toDateTimeString();

        $dataBerita = Berita::insertGetId([
            'judul' => $data['judul_berita'],
            'isi' => $data['isi_berita'],
            'slug' => Str::slug($data['judul_berita']),
            'id_user' => Auth::user()->id,
            'waktu_publikasi' => $waktu,
            'img' => isset($data['image_berita'])? $data['image_berita'] : null
        ]);
        
        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori']))
        {
            $kategori = $_POST['nama_kategori'];

            foreach ($kategori as $i)
            {
                $dataKategori = Kategori::where('nama_kategori', $i)->get();

                foreach ($dataKategori as $j)
                {
                    Berita_Has_Kategori::create([
                        'id_berita' => $dataBerita,
                        'id_kategori' => $j->id
                    ]);
                }
            }
        }
        alert('Notifikasi', 'Berhasil membuat berita', 'success');
        return redirect()->route('penulis.berita');
    }

    public function editBeritaDashboard(Request $request, $slug)
    {
        $data = $request->validate([
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'image_berita' => ['image', 'mimes:jpg,png,jpeg', 'max:70000']
        ]);

        $berita = Berita::findSlug($slug);

        if (isset($_POST['nama_kategori']) && is_array($_POST['nama_kategori']))
        {
            Berita_Has_Kategori::where('id_berita', $berita->id)->delete();
            $kategori = $_POST['nama_kategori'];
            foreach ($kategori as $i)
            {
                $dataKategori = Kategori::where('nama_kategori', $i)->get();

                foreach ($dataKategori as $j)
                {
                    Berita_Has_Kategori::create([
                        'id_berita' => $berita->id,
                        'id_kategori' => $j->id
                    ]);
                }
            }
        }

        
        if (isset($request->image_berita)) 
        {    
            $filePath = public_path('assets/berita/images/'. $berita->img);

            if (file_exists($filePath) && is_file($filePath)) 
            {
                unlink($filePath);
            }
            
            $imageName = time() . '.' . $request->image_berita->extension();
            $request->image_berita->move(public_path('assets/berita/images/'), $imageName);
            $data['image_berita'] = $imageName;
        }
        else
        {
            if ($berita->img)
            {
                $data['image_berita'] = $berita->img;
            }
            else 
            {
                $data['image_berita'] = null;
            }
        }

        $berita->judul = $data['judul_berita'];
        $berita->isi = $data['isi_berita'];
        $berita->id_user = Auth::user()->id;
        $berita->img = $data['image_berita'];
        $berita->waktu_publikasi = now()->toDateTimeString();
        $berita->save();
        alert('Notifikasi', 'Berhasil mengedit berita', 'success');
    
        return redirect()->route('penulis.berita');
    }

    public function deleteBeritaDashboard($slug)
    {
        $berita = Berita::findSlug($slug);
        
        if ($berita->img) 
        {
            $filePath = public_path('assets/berita/images/' . $berita->img);

            if (file_exists($filePath) && is_file($filePath))
            {
                unlink($filePath);
            }
        }
        Berita::destroy($berita->id);
        alert('Notifikasi', 'Berhasil menghapus berita', 'success');
        return redirect()->route('penulis.berita');
    }
}
