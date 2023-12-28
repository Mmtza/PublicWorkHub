<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

use function PHPUnit\Framework\isNull;

class ApiUser extends Controller
{
    public function getAllUser()
    {
        $users = User::all();
        if ($users)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data semua user', $users);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data semua user, tidak ada data', $users);
        }
    }

    public function getUserById($id)
    {
        $user = User::find($id);
        if ($user)
        {
            return new ApiResource(200, true, 'Berhasil mendapatkan data user', $user);
        }
        else
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data user, tidak ada data', $user);
        }
    }

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Password::defaults()],
            'birthdate' => ['max:65000'],
            'address' => ['max:65000'],
            'deskripsi_diri_content' => ['max:4000000000'],
            'foto' => ['image', 'mimes:jpg,png,jpeg', 'max:10000']
        ]);

        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();
        
        $user = User::insertGetId([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'tanggal_lahir' => $validatedData['birthdate'],
            'alamat' => $validatedData['address'],
            'deskripsi_diri' => $validatedData['deskripsi_diri_content'],
        ]);
        $imageName = $user . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/users/images/'), $imageName);
        $validatedData['foto'] = $imageName;

        $userEdit = User::find($user);
        $userEdit->foto = $validatedData['foto'];
        $userEdit->save();
        return new ApiResource(201, true, 'Berhasil membuat user', $userEdit);
    }

    public function updateUserById(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user)
        {
            return new ApiResource(404, false, 'Gagal mengubah data user, tidak ada data', $user);
        }
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'birthdate' => ['max:65000'],
            'address' => ['max:65000'],
            'deskripsi_diri_content' => ['max:4000000000'],
            'foto' => ['image', 'mimes:jpg,png,jpeg', 'max:10000']
        ]);
        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();
        if (isset($request->foto)) {

            $filePath = public_path('assets/users/images/'. $user->foto);
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);                
            }
            $imageName = $user->id . time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/users/images/'), $imageName);
            $validatedData['foto'] = $imageName;
        }
        else 
        {
            if (!$user->foto)
            {
                $user->foto = null;                
            }
            else
            {
                $user->foto = $user->foto;                
            }
        }        
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->tanggal_lahir = $validatedData['birthdate'];
        $user->alamat = $validatedData['address'];
        $user->deskripsi_diri = $validatedData['deskripsi_diri_content'];
        $user->save();
        return new ApiResource(200, true, 'Berhasil mengubah data user', $user);
    }

    public function deleteUserById($id)
    {
        $user = User::find($id);
        if (!$user)
        {
            return new ApiResource(404, false, 'Gagal mendapatkan data user, tidak ada data', $user);            
        }
        if ($user->foto) {
            $filePath = public_path('assets/users/images/' . $user->foto);
            
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }
        }        
        $userDump = $user;
        $user->delete();
        return new ApiResource(200, true, 'Berhasil menghapus user', $userDump);
    }
}
