<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pesanan;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ExpirePesanan extends Command
{
    protected $signature = 'pesanan:expire';
    protected $description = 'Hapus pesanan expired dan kembalikan stok buku';

    public function handle()
    {
        DB::beginTransaction();

        try {
            $expiredOrders = Pesanan::with('detail')
                ->where('status', 'tertunda')
                ->whereNotNull('expired_at')
                ->where('expired_at', '<', now())
                ->get();


            foreach ($expiredOrders as $order) {

                // 🔁 Balikin stok buku
                foreach ($order->detail as $d) {
                    Buku::where('id_buku', $d->id_buku)
                        ->increment('stok', $d->jumlah);
                }

                // ❌ Hapus pesanan
                $order->delete();
            }

            DB::commit();

            $this->info('Pesanan expired berhasil dibersihkan');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
