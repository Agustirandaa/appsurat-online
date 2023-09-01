<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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

        if ($request->hasFile('image')) {
            // Jika ada gambar baru, hapus gambar lama di folder storage
            if ($user->image) {
                Storage::delete($user->image);
            }
            $imagePath = $request->file('image')->store('user-images');
            $validateData['image'] = $imagePath;
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
