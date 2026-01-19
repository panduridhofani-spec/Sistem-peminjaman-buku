<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /* GET ALL USER */
    public function index(Request $r)
    {
        $search = $r->search;

        $users = User::with(['addresses' => function ($q) {
            $q->orderByDesc('is_default');
        }])
        ->when($search, function ($q) use ($search) {
            $q->where('nama_user', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('no_hp', 'like', "%$search%");
        })
        ->latest()
        ->paginate(5);

        return response()->json([
            'data' => $users
        ]);
    }

    /* GET SINGLE */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json($user);
    }

    /* UPDATE */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_user' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id . ',id_user',
            'password' => 'sometimes|string|min:8',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'role' => 'sometimes|in:admin,user',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = $request->only(['nama_user', 'email', 'no_hp', 'alamat', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'message' => 'User updated',
            'data' => $user
        ]);
    }

    /* DELETE */
    public function destroy($id)
    {
        User::where('id_user', $id)->delete();

        return response()->json([
            'message' => 'User berhasil dihapus'
        ]);
    }
}
