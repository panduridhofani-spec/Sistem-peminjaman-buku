<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class BukuController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 20;

        $query = Buku::orderByDesc('created_at');

        // 🔍 search judul
        if ($request->filled('search')) {
            $query->where('judul', 'LIKE', '%' . $request->search . '%');
        }

        // 📚 filter kategori
        if ($request->filled('kategori') && $request->kategori != 'ALL') {
            $query->where('kategori', $request->kategori);
        }

        $books = $query->paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $books
        ], 200);
    }


    /* =========================
       DETAIL BUKU - PUBLIC
    ========================= */
    public function detailPublic($id)
    {
        $buku = Buku::findOrFail($id);

        return view('detail_buku', compact('buku'));
    }


    /* =========================
       DETAIL BUKU - AFTER LOGIN
    ========================= */
    public function detailAfterLogin($id)
    {
        $buku = Buku::findOrFail($id);

        return view('after-login.detail_buku_after_login', compact('buku'));
    }

    public function store(Request $request)
    {
        $rules = [
            'judul'     => 'required|string|max:255',
            'penulis'   => 'required|string|max:150',
            'penerbit'  => 'required|string|max:150',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = new Buku();
        $data->judul     = $request->judul;
        $data->penulis   = $request->penulis;
        $data->penerbit  = $request->penerbit;
        $data->kategori  = $request->kategori;
        $data->harga     = $request->harga;
        $data->stok      = $request->stok;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/buku'), $nama);
            $data->gambar = $nama;
        }

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }


    public function show(string $id)
    {
        $data = Buku::find($id); // pakai PK id_buku otomatis

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $data = Buku::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'judul'     => 'required|string|max:255',
            'penulis'   => 'required|string|max:150',
            'penerbit'  => 'required|string|max:150',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data->judul     = $request->judul;
        $data->penulis   = $request->penulis;
        $data->penerbit  = $request->penerbit;
        $data->kategori  = $request->kategori;
        $data->harga     = $request->harga;
        $data->stok      = $request->stok;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {

            if ($data->gambar) {
                $old = public_path('uploads/buku/' . $data->gambar);
                if (file_exists($old)) unlink($old);
            }

            $file = $request->file('gambar');
            $nama = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/buku'), $nama);
            $data->gambar = $nama;
        }

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $data
        ], 200);
    }


    public function destroy(string $id)
    {
        $data = Buku::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        if ($data->gambar) {
            $path = public_path('uploads/buku/' . $data->gambar);
            if (file_exists($path)) unlink($path);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
