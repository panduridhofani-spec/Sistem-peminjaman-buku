<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // URL API
        $apiBuku = 'http://127.0.0.1:8000/api/buku';
        $apiUser = 'http://127.0.0.1:8000/api/user';

        // Request ke API
        $responseBuku = Http::get($apiBuku);
        $responseUser = Http::get($apiUser);

        // Hitung jumlah
        $jumlahBuku = $responseBuku->successful()
            ? count($responseBuku->json('data'))
            : 0;

        $jumlahUser = $responseUser->successful()
            ? count($responseUser->json('data'))
            : 0;

        return view('admin.dashboard', compact(
            'jumlahBuku',
            'jumlahUser'
        ));
    }
}
