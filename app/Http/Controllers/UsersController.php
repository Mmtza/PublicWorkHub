<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isNull;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function showAllUsersDashboard()
    {
        $users = User::all();
        confirmDelete();
        return view('admins.pages.form_user.user', compact('users'));
    }

    public function viewEditUsers($id) 
    {
        $user = User::find($id);
        confirmDelete();
        return view('admins.pages.form_user.edit_user', compact('user'));
    }

    public function viewAddUsers() 
    {
        return view('admins.pages.form_user.tambah_users');
    }

    public function editUsers(Request $request, $id) 
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'min:8', Password::defaults()],
            'repassword' => ['required', 'min:8', 'same:password'],
            'alamat' => ['max:65000'],
            'tanggal_lahir' => ['max:65000'],
            'role' => ['required', 'in:user,penulis,penyedia_loker,admin'],
            'deskripsi_diri' => ['max:4000000000'],
            'image' => ['image', 'mimes:jpg,png,jpeg', 'max:10000']
        ],[
            'nama.required' => 'Nama tidak diperbolehkan kosong',
            'nama.string' => 'Nama harus bertipe karakter',
            'nama.min' => 'Nama diperbolehkan minimal 4 karakter',
            'nama.max' => 'Nama diperbolehkan maksimal 255 karakter',
            'email.required' => 'Email tidak diperbolehkan kosong',
            'email.string' => 'Email harus bertipe karakter',
            'email.email' => 'Email harus berdomain aktif. misalnya @gmail.com',
            'email.unique' => 'Email ini sudah digunakan oleh akun lain',
            'email.max' => 'Email diperbolehkan maksimal 255 karakter',
            'password.required' => 'Password tidak diperbolehkan kosong',
            'password.min' => 'Password diperbolehkan minimal 8 karakter',
            'repassword.required' => 'RePassword tidak diperbolehkan kosong',
            'repassword.min' => 'RePassword diperbolehkan minimal 8 karakter',
            'repassword.same' => 'RePassword tidak sama dengan password',
            'alamat.max' => 'Alamat diperbolehkan maksimal 65.000 karakter',
            'tanggal_lahir.max' => 'Tanggal lahir diperbolehkan maksimal 65.000 karakter',
            'role.required' => 'Role tidak diperbolehkan kosong',
            'role.in' => 'Role yang diperbolehkan dari user, penulis, penyedia loker, admin',
            'deskripsi_diri.max' => 'Deskripsi diri diperbolehkan maksimal 4.000.000.000 karakter',
            'image.image' => 'File yang diperbolehkan bertipe image',
            'image.mimes' => 'File yang diperbolehkan bertipe jpg, png, jpeg',
            'image.max' => 'File yang diperbolehkan maksimal 10mb'
        ]);

        $user = User::find($id);

        if (isset($request->image)) 
        {    
            $filePath = public_path('assets/users/images/'. $user->foto);

            if (file_exists($filePath) && is_file($filePath)) 
            {
                unlink($filePath);
            }
            
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/users/images/'), $imageName);
            $data['image'] = $imageName;
        }
        else
        {
            if ($user->foto)
            {
                $data['image'] = $user->foto;
            }
            else
            {
                $data['image'] = null;
            }
        }

        $user->name = $data['nama'];
        $user->email = $data['email'];
        $user->password = isset($request->password)? bcrypt($data['password']) : $user->password;
        $user->role = $data['role'];
        $user->alamat = $data['alamat'];
        $user->tanggal_lahir = $data['tanggal_lahir'];
        $user->deskripsi_diri = $data['deskripsi_diri'];
        $user->foto = $data['image'];
        $user->updated_at = now()->toDateTimeString();
        $user->save();
        alert('Notifikasi', 'Berhasil mengedit user', 'success');
    
        return redirect()->route('admin.users');
    }

    public function addUsers(Request $request) 
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'min:8', Password::defaults()],
            'repassword' => ['required', 'min:8', 'same:password'],
            'alamat' => ['max:65000'],
            'tanggal_lahir' => ['max:65000'],
            'role' => ['required', 'in:user,penulis,penyedia_loker,admin'],
            'deskripsi_diri' => ['max:4000000000'],
            'image' => ['image', 'mimes:jpg,png,jpeg', 'max:10000']
        ],[
            'nama.required' => 'Nama tidak diperbolehkan kosong',
            'nama.string' => 'Nama harus bertipe karakter',
            'nama.min' => 'Nama diperbolehkan minimal 4 karakter',
            'nama.max' => 'Nama diperbolehkan maksimal 255 karakter',
            'email.required' => 'Email tidak diperbolehkan kosong',
            'email.string' => 'Email harus bertipe karakter',
            'email.email' => 'Email harus berdomain aktif. misalnya @gmail.com',
            'email.unique' => 'Email ini sudah digunakan oleh akun lain',
            'email.max' => 'Email diperbolehkan maksimal 255 karakter',
            'password.required' => 'Password tidak diperbolehkan kosong',
            'password.min' => 'Password diperbolehkan minimal 8 karakter',
            'repassword.required' => 'RePassword tidak diperbolehkan kosong',
            'repassword.min' => 'RePassword diperbolehkan minimal 8 karakter',
            'repassword.same' => 'RePassword tidak sama dengan password',
            'alamat.max' => 'Alamat diperbolehkan maksimal 65.000 karakter',
            'tanggal_lahir.max' => 'Tanggal lahir diperbolehkan maksimal 65.000 karakter',
            'role.required' => 'Role tidak diperbolehkan kosong',
            'role.in' => 'Role yang diperbolehkan dari user, penulis, penyedia loker, admin',
            'deskripsi_diri.max' => 'Deskripsi diri diperbolehkan maksimal 4.000.000.000 karakter',
            'image.image' => 'File yang diperbolehkan bertipe image',
            'image.mimes' => 'File yang diperbolehkan bertipe jpg, png, jpeg',
            'image.max' => 'File yang diperbolehkan maksimal 10mb'
        ]);

        if (isset($request->image)) {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/users/images/'), $imageName);
            $data['image'] = $imageName;
        }
        User::insert([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'alamat' => $data['alamat'],
            'role' => $data['role'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'deskripsi_diri' => $data['deskripsi_diri'],
            'foto' => isset($request->image)? $data['image'] : null
        ]);
        alert('Notifikasi', 'Berhasil membuat user', 'success');
        return redirect()->route('admin.users');
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        
        if (!isNull($user->foto)) 
        {
            $filePath = public_path('assets/users/images/' . $user->foto);

            if (file_exists($filePath) && is_file($filePath))
            {
                unlink($filePath);
            }
        }
        User::destroy($user->id);
        alert('Notifikasi', 'Berhasil menghapus user', 'success');
        return redirect()->route('admin.users');
    }
}