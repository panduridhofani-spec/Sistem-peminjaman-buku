<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BukuuController extends Controller
{
    public function detail($id)
    {
        $buku = \App\Models\Buku::find($id);

        if(!$buku){
            abort(404);
        }

        return view('detail_buku', compact('buku'));
    }
}
