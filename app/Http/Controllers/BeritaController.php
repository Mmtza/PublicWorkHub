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
        return view('admins.pages.berita.all_berita', compact('berita', 'beritaCount'));
    }

    public function showAllBerita()
    {
        $beritaHasKategori = new Berita();

        // get all berita, but limit 4
        $berita = Berita::take(4)->get();

        // get all berita in kategori Pendidikan
        // $beritaByKategori = $beritaHasKategori->getKategori()->where('nama_kategori', 'Pendidikan')->take(2)->get();
        // $showBeritaByKategori = Berita_Has_Kategori::join('kategori', 'berita_has_kategori.id_kategori', '=', 'kategori.id')->where('nama_kategori', 'Pendidikan')->get();
        // $beritaByKategori = Kategori::where('nama_kategori', 'Pendidikan')->get();

        // if ($beritaByKategori) {
        //     $beritaByKategori = $beritaByKategori->berita()->get();
        //     dd($beritaByKategori);
        // }
        // dd($showBeritaByKategori);

        return view('users.pages.berita.all_berita', compact('berita'));
    }

    public function showBeritaById(Request $request, $id)
    {

        // get berita by id
        $berita = Berita::find($id);

        $berita_side = Berita::take(5)->get();

        // dd($berita);
        return view('users.pages.berita.berita_detail', compact('berita', 'berita_side'));
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
<<<<<<< HEAD

=======
        
        $lastID = Berita::orderBy('id', 'desc')->first();
>>>>>>> 788b80807b2660d884a84aa141dc146952c74863
        $dataBerita = Berita::insertGetId([
            'judul' => $data['judul_berita'],
            'isi' => $data['isi_berita'],
            'slug' => Str::slug($data['judul_berita']) . '-' . $lastID+1 . $waktu,
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

        if (!IsNull($berita->img)) {
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
