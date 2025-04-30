<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\PostResource;


class UserController extends Controller
{
    // ✅ List semua user
    public function index()
    {
        $users = User::all();
        return new PostResource(true, 'List Data users', $users);
        // return view('users.index', compact('users'));
    }

    // ✅ Tampilkan form tambah user
    public function create()
    {
        return view('users.create');
    }

    // ✅ Simpan user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // ✅ Tampilkan detail user
    public function show($id)
    {
        $user= User::find($id);
        return new PostResource(true, 'Detail Data User!', $user);
    }

    // ✅ Tampilkan form edit
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // ✅ Update user
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'sometimes|string|max:255',
        'email' => 'sometimes|email|unique:users,email,' . $id,
        'password' => 'sometimes|min:6',
    ]);

    if ($request->has('name')) {
        $user->name = $request->name;
    }

    if ($request->has('email')) {
        $user->email = $request->email;
    }

    if ($request->has('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return response()->json([
        'message' => 'User updated successfully',
        'data' => $user
    ]);
}

    // ✅ Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }
}
