<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Pesanan;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{

    /* USER CHECKOUT */
    public function store(Request $request)
    {
        $user = Auth::user();

        DB::beginTransaction();

        try {

            $cart = Keranjang::where('id_user', $user->id_user)
                ->where('status', 'checkout')
                ->get();

            if ($cart->count() == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart kosong'
                ]);
            }

            // VALIDASI STOK
            foreach ($cart as $c) {

                $buku = Buku::find($c->id_buku);

                if (!$buku) {
                    DB::rollBack();
                    return response()->json([
                        'status' => false,
                        'message' => 'Buku tidak ditemukan'
                    ]);
                }

                if ($buku->stok < $c->jumlah_buku) {
                    DB::rollBack();
                    return response()->json([
                        'status' => false,
                        'message' => 'Stok ' . $buku->judul . ' tidak cukup'
                    ]);
                }
            }

            // BUAT PESANAN
            $pesanan = Pesanan::create([
                'id_user'     => $user->id_user,
                'id_address'  => $request->id_address,
                'total_harga' => $cart->sum('harga_total'),
                'status'      => 'tertunda',
                'expired_at' => Carbon::now()->addMinute(30) // test
                // 🔥 TEST 10 DETIK

                // ganti 30 ke 1440 kalau mau 24 jam
            ]);





            // KURANGI STOK
            foreach ($cart as $c) {

                $buku = Buku::find($c->id_buku);

                $buku->stok -= $c->jumlah_buku;
                $buku->save();

                $pesanan->detail()->create([
                    'id_buku' => $c->id_buku,
                    'jumlah'  => $c->jumlah_buku,
                    'harga'   => $c->harga_total
                ]);
            }

            // HAPUS CART
            Keranjang::where('id_user', $user->id_user)
                ->where('status', 'checkout')
                ->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Pesanan berhasil dibuat'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Gagal: ' . $e->getMessage()
            ]);
        }
    }

    // PesananController
    public function latestPending()
    {
        $user = Auth::user();

        $pesanan = Pesanan::with([
            'detail.buku',
            'user'
        ])
            ->where('id_user', $user->id_user)
            ->where('status', 'tertunda')
            ->latest('id_pesanan')
            ->first();

        if (!$pesanan) {
            return response()->json(null);
        }

        return response()->json($pesanan);
    }




    /* USER LIST PESANAN */
    public function myOrder()
    {
        return response()->json(
            Pesanan::with('detail.buku')
                ->where('id_user', Auth::id())
                ->latest()
                ->get()
        );
    }

    /* USER BATAL */
    public function cancel($id)
    {
        $p = Pesanan::where('id_pesanan', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        $p->delete();

        return response()->json([
            'message' => 'Pesanan dibatalkan'
        ]);
    }

    /* ADMIN */
    public function all()
    {
        return response()->json(
            Pesanan::with(['detail.buku', 'user'])
                ->latest()
                ->get()
        );
    }


    /* ADMIN UPDATE STATUS */
    public function updateStatus(Request $r, $id)
    {
        DB::beginTransaction();

        try {
            $pesanan = Pesanan::with('detail')->findOrFail($id);
            $statusLama = $pesanan->status;
            $statusBaru = $r->status;

            // ===============================
            // JIKA ADMIN SET SELESAI
            // ===============================
            if ($statusBaru === 'selesai' && $statusLama !== 'selesai') {

                // 🔁 KEMBALIKAN STOK BUKU
                foreach ($pesanan->detail as $d) {
                    Buku::where('id_buku', $d->id_buku)
                        ->increment('stok', $d->jumlah);
                }
            }

            // ===============================
            // UPDATE STATUS PESANAN
            // ===============================
            $pesanan->update([
                'status' => $statusBaru,
                'expired_at' => in_array($statusBaru, ['diproses', 'selesai'])
                    ? null
                    : $pesanan->expired_at
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Status berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Gagal update status',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function latestStatus()
    {
        $pesanan = Pesanan::where('id_user', Auth::id())
            ->latest()
            ->first();

        if (!$pesanan) {
            return response()->json(['status' => 'none']);
        }

        return response()->json([
            'status' => $pesanan->status,
            'expired_at' => $pesanan->expired_at
        ]);
    }
}
