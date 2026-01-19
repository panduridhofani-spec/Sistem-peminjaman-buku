<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();

        $keranjang = Keranjang::where('id_user',$user->id_user)
            ->where('status','cart')
            ->get();

        if($keranjang->count() == 0){
            return response()->json([
                'status' => false,
                'message' => 'Keranjang kosong'
            ],400);
        }

        DB::beginTransaction();

        try{

            $total = 0;

            foreach($keranjang as $item){

                $total += $item->harga_total;

                // 🔒 LOCK BUKU
                $buku = Buku::where('id_buku',$item->id_buku)
                            ->lockForUpdate()
                            ->first();

                if(!$buku){
                    throw new \Exception('Buku tidak ditemukan');
                }

                if($buku->stok < $item->jumlah_buku){
                    throw new \Exception(
                        'Stok buku '.$buku->judul.' tidak mencukupi'
                    );
                }

                // ⬇️ KURANGI STOK
                $buku->stok -= $item->jumlah_buku;
                $buku->save();
            }

            // 🧾 SIMPAN TRANSAKSI
            $trx = Transaksi::create([
                'id_user' => $user->id_user,
                'total'   => $total + 2500,
                'status'  => 'pending'
            ]);

            // 🔄 UPDATE KERANJANG
            Keranjang::where('id_user',$user->id_user)
                ->where('status','cart')
                ->update([
                    'status' => 'checkout',
                    'id_transaksi' => $trx->id
                ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Checkout berhasil',
                'transaksi' => $trx
            ]);

        }catch(\Exception $e){

            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ],500);
        }
    }
}
