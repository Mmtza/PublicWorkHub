<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use function PHPUnit\Framework\isNull;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {                
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'birthdate' => ['max:65000'],
            'address' => ['max:65000'],
            'deskripsi_diri_content' => ['max:4000000000'],
            'foto' => ['image', 'mimes:jpg,png,jpeg', 'max:10000']
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->name = $data['name'];
        $request->user()->email = $data['email'];
        $request->user()->tanggal_lahir = $data['birthdate'];
        $request->user()->alamat = $data['address'];
        $request->user()->deskripsi_diri = $data['deskripsi_diri_content'];
        if (isset($request->foto)) {

            $filePath = public_path('assets/users/images/'. auth()->user()->foto);
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);                
            }
            $imageName = auth()->user()->id . time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/users/images/'), $imageName);
            $request->user()->foto = $imageName;
        }
        else 
        {
            if (!$request->user()->foto)
            {
                $request->user()->foto = null;                
            }
            else
            {
                $request->user()->foto = $request->user()->foto;                
            }
        }
        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
