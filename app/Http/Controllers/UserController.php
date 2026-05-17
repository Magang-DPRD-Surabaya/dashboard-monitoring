<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan semua user
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    /**
     * Form tambah user
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Simpan user baru
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',

            'role' => 'required',
        ]);

        // Simpan user
        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => $request->role,
        ]);

        return redirect('/users')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Form edit user
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validasi
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'role' => 'required',
        ]);

        // Update data
        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'role' => $request->role,
        ]);

        return redirect('/users')
            ->with('success', 'User berhasil diupdate');
    }

    /**
     * Hapus user
     */
    public function destroy(string $id){
        $user = User::findOrFail($id);

        /**
         * Mencegah admin
         * menghapus dirinya sendiri
         */
        if (auth()->id() == $user->id) {

            return redirect('/users')
                ->with('error', 'Anda tidak dapat menghapus akun sendiri');
        }

        $user->delete();

        return redirect('/users')
            ->with('success', 'User berhasil dihapus');
    }
}