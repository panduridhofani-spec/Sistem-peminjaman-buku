<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

class ProfileController extends Controller
{
    // 🔹 Ambil data profil user
    public function show(Request $request)
    {
        $request->validate([
            'id_user' => 'required'
        ]);

        $user = User::where('id_user', $request->id_user)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'user' => $user
        ]);
    }

    // 🔹 Simpan alamat baru (tidak menimpa yang lama)
    public function storeAddress(Request $request)
    {
        $request->validate([
            'id_user'    => 'required',
            'alamat'     => 'required|string',
            'is_default' => 'boolean'
        ]);

        // kalau diset sebagai default, reset alamat lain
        if ($request->is_default) {
            Address::where('id_user', $request->id_user)
                ->update(['is_default' => false]);
        }

        $address = Address::create([
            'id_user'    => $request->id_user,
            'alamat'     => $request->alamat,
            'is_default' => $request->is_default ?? false
        ]);

        return response()->json([
            'message' => 'Alamat berhasil ditambahkan',
            'address' => $address
        ]);
    }

    // 🔹 Ambil semua alamat milik user
    public function listAddress(Request $request)
    {
        $request->validate([
            'id_user' => 'required'
        ]);

        $addresses = Address::where('id_user', $request->id_user)->get();

        return response()->json([
            'addresses' => $addresses
        ]);
    }


    // 🔹 Update alamat
    public function updateName(Request $request)
    {
        $request->validate([
            'id_user'   => 'required',
            'nama_user' => 'required|string|max:255'
        ]);

        $user = User::where('id_user', $request->id_user)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        // ✅ update kolom yang benar
        $user->nama_user = $request->nama_user;
        $user->save();

        return response()->json([
            'message' => 'Nama berhasil diperbarui',
            'user'    => $user
        ]);
    }


    // 🔹 Set alamat utama
    public function setDefault($id)
    {
        $address = Address::find($id);

        if (!$address) {
            return response()->json(['message' => 'Alamat tidak ditemukan'], 404);
        }

        // reset semua alamat user jadi bukan default
        Address::where('id_user', $address->id_user)
            ->update(['is_default' => false]);

        // set yang dipilih jadi default
        $address->update(['is_default' => true]);

        return response()->json([
            'message' => 'Alamat utama berhasil diubah'
        ]);
    }



    public function showAddress($id)
    {
        $addr = Address::findOrFail($id);
        return response()->json(['address' => $addr]);
    }

    public function updateAddressById(Request $request, $id)
    {
        $request->validate([
            'penerima' => 'required',
            'telepon' => 'required',
            'alamat_lengkap' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos' => 'required'
        ]);

        $addr = Address::findOrFail($id);

        $addr->update([
            'penerima' => $request->penerima,
            'telepon' => $request->telepon,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'is_default' => $request->is_default ? 1 : 0,
        ]);

        // kalau diset default → lainnya dimatikan
        if ($request->is_default) {
            Address::where('id_user', $addr->id_user)
                ->where('id', '!=', $id)
                ->update(['is_default' => 0]);
        }

        return response()->json(['message' => 'Alamat berhasil diperbarui']);
    }
}
