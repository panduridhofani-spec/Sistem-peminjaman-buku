<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // =========================
        // STATISTIK
        // =========================
        $totalBuku = Buku::count();

        $totalUser = User::where('role','user')->count();

        $totalPesanan = Pesanan::count();

        $revenue = Pesanan::sum('total_harga');


        // =========================
        // DATA CHART (per bulan)
        // =========================
        $chart = Pesanan::select(
                    DB::raw('MONTH(created_at) as bulan'),
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();

        $bulanMap = [
            1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',
            5=>'Mei',6=>'Jun',7=>'Jul',8=>'Agu',
            9=>'Sep',10=>'Okt',11=>'Nov',12=>'Des'
        ];

        $labels = [];
        $values = [];

        foreach($chart as $c){
            $labels[] = $bulanMap[$c->bulan];
            $values[] = $c->total;
        }


        // =========================
        // TABEL RIWAYAT
        // =========================
        $riwayat = Pesanan::with(['user','detail.buku'])
                    ->latest()
                    ->limit(5)
                    ->get()
                    ->map(function($p){

                        return [
                            'user'   => $p->user->nama_user ?? '-',
                            'buku'   => $p->detail[0]->buku->judul ?? '-',
                            'tanggal'=> $p->created_at,
                            'status' => $p->status
                        ];
                    });


        return response()->json([
            'total_buku'    => $totalBuku,
            'total_user'    => $totalUser,
            'total_pesanan' => $totalPesanan,
            'revenue'       => $revenue,

            'chart' => [
                'labels' => $labels,
                'values' => $values
            ],

            'riwayat' => $riwayat
        ]);
    }
}
