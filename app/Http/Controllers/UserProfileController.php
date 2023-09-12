<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.user_profile.index', [
            'title' => 'User profile'
        ]);
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.user_profile.edit', [
            'title' => 'Edit profile',
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'image' =>  'image|file|max:2048',
            'email' => 'required|email:dns'
        ]);

        $user = User::findOrFail($id); // Mencari user berdasarkan ID

        // Cek image
        if ($request->file('image')) {
            // jika ada image baru, hapus image lama di folder storage
            if ($user->image) {
                File::delete(public_path() . '/user-images/' . $user->image);
            }
            $image = Str::random(100) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/user-images/', $image);
            $validateData['image'] = $image;
        }

        $user->update($validateData);

        return redirect('/dashboard/userprofile')
            ->with('success', 'Profil telah diperbarui!');
    }


    public function setPassword()
    {
        return view('dashboard.user_profile.setpassword', [
            'title' => 'Ubah Password'
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $validateData = $request->validate([
            'passwordlama' => 'required',
            'passwordbaru' => 'required|min:5',
            'konfirmasipassword' => 'required|same:passwordbaru|min:5',
        ]);

        $user = User::findOrFail($id);

        // Validasi password lama
        if (!Hash::check($request->passwordlama, $user->password)) {
            return redirect('/dashboard/setpassword')
                ->with('error', 'Password lama salah!');
        }

        // Jika validasi password lama berhasil, ganti password baru
        $user->update([
            'password' => Hash::make($request->passwordbaru)
        ]);

        return redirect('/dashboard/userprofile')
            ->with('success', 'Password telah di ganti!');
    }
}
