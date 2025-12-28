<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::orderBy('judul', 'asc')->paginate(10);
        return response()->json([
            'status' => true,
            'massage' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataBuku = new Buku();

        $rules = [
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:150',
            'penerbit' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok'     => 'required|integer|min:0',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal menambahkan data',
                'data' => $validator->errors()
            ], 200);
        }

        $dataBuku->judul = $request->judul;
        $dataBuku->penulis = $request->penulis;
        $dataBuku->penerbit = $request->penerbit;
        $dataBuku->kategori = $request->kategori;
        $dataBuku->stok = $request->stok;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/buku'), $filename);
            $dataBuku->gambar = $filename;
        }



        $post = $dataBuku->save();

        return response()->json([
            'status' => true,
            'massage' => 'Data berhasil ditambahkan',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Buku::find($id);

        if ($data) {
            return response()->json([
                'status' => true,
                'massage' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBuku = Buku::find($id);
        if (!$dataBuku) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',
            ], 404);
        }

        $rules = [
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:150',
            'penerbit' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok'     => 'required|integer|min:0',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'massage' => 'gagal update data',
                'data' => $validator->errors()
            ], 400);
        }

        $dataBuku->judul = $request->judul;
        $dataBuku->penulis = $request->penulis;
        $dataBuku->penerbit = $request->penerbit;
        $dataBuku->kategori = $request->kategori;
        $dataBuku->stok = $request->stok;
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/buku'), $namaFile);
            $dataBuku->gambar = $namaFile;
        }

        $post = $dataBuku->save();

        return response()->json([
            'status' => true,
            'massage' => 'Data berhasil diupdate',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataBuku = Buku::find($id);
        $filePath = public_path('uploads/buku/' . $dataBuku->gambar);

        if (file_exists($filePath) && $dataBuku->gambar) {
            unlink($filePath);
        }


        if (!$dataBuku) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',
            ], 404);
        }

        $dataBuku->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Data berhasil dihapus',
        ], 200);
    }
}
