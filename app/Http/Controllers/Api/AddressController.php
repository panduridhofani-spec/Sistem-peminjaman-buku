<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json([
            'addresses' => Address::where('id_user', Auth::user()->id_user)
                ->orderByDesc('is_default')
                ->latest()
                ->get()
        ]);
    }

    public function defaultByUser()
    {
        return response()->json([
            'address' => Address::where('id_user', Auth::user()->id_user)
                ->where('is_default',1)
                ->first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima' => 'required',
            'telepon' => 'required',
            'alamat_lengkap' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos' => 'required'
        ]);

        if ($request->is_default) {
            Address::where('id_user', Auth::user()->id_user)
                ->update(['is_default' => 0]);
        }

        $addr = Address::create([
            'id_user' => Auth::user()->id_user,
            'penerima' => $request->penerima,
            'telepon' => $request->telepon,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'is_default' => $request->is_default ? 1 : 0
        ]);

        return response()->json([
            'message' => 'Alamat berhasil ditambahkan',
            'address' => $addr
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'address' => Address::where('id',$id)
                ->where('id_user',Auth::user()->id_user)
                ->firstOrFail()
        ]);
    }

    public function update(Request $request,$id)
    {
        $addr = Address::where('id',$id)
            ->where('id_user',Auth::user()->id_user)
            ->firstOrFail();

        if ($request->is_default) {
            Address::where('id_user', Auth::user()->id_user)
                ->where('id','!=',$id)
                ->update(['is_default' => 0]);
        }

        $addr->update([
            'penerima' => $request->penerima,
            'telepon' => $request->telepon,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'is_default' => $request->is_default ? 1 : 0
        ]);

        return response()->json([
            'message' => 'Alamat berhasil diperbarui'
        ]);
    }

    public function setDefault($id)
    {
        $userId = Auth::user()->id_user;

        $addr = Address::where('id', $id)
            ->where('id_user', $userId)
            ->firstOrFail();

        Address::where('id_user', $userId)
            ->update(['is_default' => 0]);

        $addr->update(['is_default' => 1]);

        return response()->json([
            'message' => 'Alamat utama berhasil diubah'
        ]);
    }

    public function destroy($id)
    {
        $addr = Address::where('id',$id)
            ->where('id_user',Auth::user()->id_user)
            ->firstOrFail();

        $addr->delete();

        return response()->json([
            'message'=>'Alamat berhasil dihapus'
        ]);
    }
}
