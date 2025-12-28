<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // GET: semua user
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => true,
            'message' => 'Data user ditemukan',
            'data' => $users
        ], 200);
    }

    // POST: tambah user
    public function store(Request $request)
    {
        $rules = [
            'nama_user' => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'no_hp'     => 'required|string|max:20',
            'alamat'    => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 400);
        }

        $user = User::create([
            'nama_user' => $request->nama_user,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'no_hp'     => $request->no_hp,
            'alamat'    => $request->alamat,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User berhasil ditambahkan',
            'data' => $user
        ], 201);
    }

    // GET: detail user
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $user
        ], 200);
    }

    // PUT: update user
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $rules = [
            'nama_user' => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,' . $id . ',id_user',
            'no_hp'     => 'required|string|max:20',
            'alamat'    => 'required|string',
            'password'  => 'nullable|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 400);
        }

        $user->nama_user = $request->nama_user;
        $user->email     = $request->email;
        $user->no_hp     = $request->no_hp;
        $user->alamat    = $request->alamat;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User berhasil diupdate'
        ], 200);
    }

    // DELETE: hapus user
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User berhasil dihapus'
        ], 200);
    }

    // POST: login user
    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Email atau password salah'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Login berhasil',
            'data' => $user
        ], 200);
    }
}
