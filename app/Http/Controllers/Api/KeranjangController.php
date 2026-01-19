<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    private function unauthorized()
    {
        return response()->json([
            'status' => false,
            'message' => 'Unauthorized'
        ], 401);
    }

    /* ================== LIST CART ================== */
    public function index()
    {
        if (!Auth::check()) return $this->unauthorized();

        $data = Keranjang::with('buku')
            ->where('id_user', Auth::id())
            ->where('status', 'cart')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Data keranjang',
            'data' => $data
        ]);
    }

    /* ================== TAMBAH CART ================== */
    public function store(Request $request)
    {
        if (!Auth::check()) return $this->unauthorized();

        $request->validate([
            'id_buku' => 'required|exists:buku,id_buku',
            'durasi'  => 'required|in:7,14',
            'tanggal_mulai' => 'required|date'
        ]);

        $buku = Buku::findOrFail($request->id_buku);

        if ($buku->stok < 1) {
            return response()->json([
                'status' => false,
                'message' => 'Stok habis'
            ], 400);
        }

        $harga = $buku->harga * $request->durasi;
        if ($request->durasi == 14) $harga *= 0.9;

        $tanggal_selesai = date(
            'Y-m-d',
            strtotime("+{$request->durasi} days", strtotime($request->tanggal_mulai))
        );

        $cart = Keranjang::where([
            'id_user' => Auth::id(),
            'id_buku' => $request->id_buku,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status' => 'cart'
        ])->first();

        if ($cart) {

            if ($cart->jumlah_buku + 1 > $buku->stok) {
                return response()->json([
                    'status' => false,
                    'message' => 'Stok tidak cukup'
                ], 400);
            }

            $cart->jumlah_buku++;
            $cart->harga_total = $harga * $cart->jumlah_buku;
            $cart->save();

            return response()->json([
                'status' => true,
                'message' => 'Jumlah buku ditambahkan',
                'data' => $cart
            ]);
        }

        $data = Keranjang::create([
            'id_user' => Auth::id(),
            'id_buku' => $request->id_buku,
            'jumlah_buku' => 1,
            'durasi' => $request->durasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'harga_total' => $harga,
            'status' => 'cart'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil ditambahkan ke keranjang',
            'data' => $data
        ], 201);
    }

    /* ================== UPDATE JUMLAH ================== */
public function update(Request $request, $id)
{
    if (!Auth::check()) return $this->unauthorized();

    $item = Keranjang::where('id_user', Auth::id())
        ->where('id_keranjang', $id)
        ->firstOrFail();

    $buku = Buku::findOrFail($item->id_buku);

    $jumlah = (int) $request->input('jumlah', 1);

    // 👉 JIKA NAMAU NAMBAH TAPI SUDAH MELEBIHI STOK
    if ($jumlah > 0 && $item->jumlah_buku >= $buku->stok) {
        return response()->json([
            'status' => false,
            'message' =>
                'Stok buku "' . $buku->judul . "\"\n" .
                'Maksimal: ' . $buku->stok . " buah"
        ], 400);
    }

    // update jumlah
    $item->jumlah_buku += $jumlah;

    // kalau 0 → hapus
    if ($item->jumlah_buku <= 0) {
        $item->delete();

        return response()->json([
            'status' => true,
            'message' => 'Item dihapus'
        ]);
    }

    // hitung harga
    $harga = $buku->harga * $item->durasi;
    if ($item->durasi == 14) $harga *= 0.9;

    $item->harga_total = $harga * $item->jumlah_buku;
    $item->save();

    return response()->json([
        'status' => true,
        'message' => 'Jumlah berhasil diupdate',
        'data' => $item
    ]);
}





    /* ================== HAPUS ================== */
    public function destroy($id)
    {
        if (!Auth::check()) return $this->unauthorized();

        Keranjang::where('id_user', Auth::id())
            ->where('id_keranjang', $id)
            ->delete();

        return response()->json([
            'status' => true,
            'message' => 'Item berhasil dihapus'
        ]);
    }

    /* ================== CHECKOUT ================== */
    public function checkout()
    {
        if (!Auth::check()) return $this->unauthorized();

        $userId = Auth::id();

        if (!Keranjang::where('id_user', $userId)->where('status', 'cart')->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Keranjang kosong'
            ], 400);
        }

        Keranjang::where('id_user', $userId)
            ->where('status', 'cart')
            ->update(['status' => 'checkout']);

        return response()->json([
            'status' => true,
            'message' => 'Checkout berhasil'
        ]);
    }

    /* ================== CEK STOK ================== */
    public function cekStok()
    {
        if (!Auth::check()) return $this->unauthorized();

        $cart = Keranjang::with('buku')
            ->where('id_user', Auth::id())
            ->where('status', 'cart')
            ->get();

        if ($cart->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Keranjang kosong'
            ]);
        }

        foreach ($cart as $c) {

            if ($c->jumlah_buku > $c->buku->stok) {

                return response()->json([
                    'status' => false,
                    'message' =>
                    'Stok buku "' . $c->buku->judul . "\"\n" .
                        'Tersisa: ' . $c->buku->stok . " buah\n" .
                        'Mohon kurangi pesanan.'
                ], 400);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Stok aman'
        ]);
    }
}
