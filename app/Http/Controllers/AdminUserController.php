<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // Menampilkan daftar users
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    // Menampilkan form create
    public function create()
{
    $roles = Role::all(); // Ambil semua role
    return view('admin.user.create', compact('roles'));
}

    // Menyimpan data user baru
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'role_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'bio' => 'nullable',
        ]);

        User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    // Menampilkan detail user
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    // Menampilkan form edit
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'bio' => 'nullable',
        ]);

        $user->update([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'bio' => $request->bio,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    // Menghapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
