<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Email atau password salah'], 401);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['success' => true, 'token' => $token, 'user' => $user]);
    }

    // PROFILE
    public function profile(Request $request)
    {
        return response()->json(['success' => true, 'user' => $request->user()]);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success' => true, 'message' => 'Logout berhasil']);
    }

    // UPDATE USER
    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->only(['email', 'password']);
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return response()->json(['success' => true, 'message' => 'User berhasil diupdate', 'user' => $user]);
    }

    // DELETE USER
    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete(); // Revoke tokens
        $user->delete(); // Delete user

        return response()->json(['success' => true, 'message' => 'User berhasil dihapus']);
    }
}
