<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'pengaturan role user',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Add User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Cek apakah sudah ada user dengan level "user"
        $existingUser = User::where('level', 'is_user')->first();

        if ($existingUser) {
            return redirect('/dashboard/pengaturan/create')
                ->with('error', 'User dengan level "user" sudah ada, tidak bisa menambahkan lagi.');
        }


        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|max:255|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'image' =>  'image|file|max:2048',
            'level' => 'required',
            'nip' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        $validateData['image'] = $request->file('image')->store('user-images');
        User::create($validateData);
        return redirect('/dashboard/pengaturan')
            ->with('success', 'New user has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {

        $user = User::findOrFail($id);
        return view('dashboard.user.edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $validateData = $request->validate([
            'level' => 'required',
            'nip' => ''
        ]);

        User::where('id', $id)
            ->update($validateData);

        return redirect('/dashboard/pengaturan')
            ->with('success', 'Role user has been update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            Storage::delete($user->image);
        }
        User::destroy($user->id);
        return redirect('/dashboard/pengaturan')
            ->with('success', 'User been deleted!');
    }
}
