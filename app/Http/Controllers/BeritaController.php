<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Berita_Has_Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        return view('admins.pages.berita.all_berita', compact('berita'));
    }

    public function viewEditBeritaDashboard($id)
    {
        $berita = Berita::find($id);
        $publisher = Berita::with('getUser')->find($id);
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
            'status' => $data['status_berita'],
            'id_user' => Auth::user()->id,
            'waktu_publikasi' => $waktu,
            'img' => isset($request->image_berita)? $data['image_berita'] : null
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
        return redirect()->route('admin.berita');
    }
    
    public function editBeritaDashboard(Request $request, $id)
    {
        $data = $request->validate([
            'judul_berita' => ['required', 'min:4', 'max:65000'],
            'isi_berita' => ['required', 'max:4000000000'],
            'nama_kategori' => ['required'],
            'status_berita' => ['required', 'in:menunggu,aktif,tidak aktif'],
            'image_berita' => ['image', 'mimes:jpg,png,jpeg', 'max:70000']
        ]);

        $berita = Berita::find($id);

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

        if ($berita->img)
        {
            $data['image_berita'] = $berita->img;
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

        $berita->judul = $data['judul_berita'];
        $berita->isi = $data['isi_berita'];
        $berita->status = $data['status_berita'];
        $berita->id_user = Auth::user()->id;
        $berita->img = $data['image_berita'];
        $berita->waktu_publikasi = now()->toDateTimeString();
        $berita->save();
        alert('Notifikasi', 'Berhasil mengedit berita', 'success');
    
        return redirect()->route('admin.berita');
    }

    public function deleteBeritaDashboard($id)
    {
        $berita = Berita::find($id);
        
        if ($berita->img) 
        {
            $filePath = public_path('assets/berita/images' . $berita->img);

            if (file_exists($filePath) && is_file($filePath))
            {
                unlink($filePath);
            }
        }
        Berita::destroy($id);
        alert('Notifikasi', 'Berhasil menghapus berita', 'success');
        return redirect()->route('admin.berita');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita_Model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita_Model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita_Model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita_Model)
    {
        //
    }
}
