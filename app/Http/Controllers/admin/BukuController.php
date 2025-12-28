<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class BukuController extends Controller
{
    const API_URL = 'http://127.0.0.1:8000/api/buku';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $curent_url = url()->current();

        $client = new Client();
        $url = static::API_URL;

        if ($request->input('page') != null) {
            $url .= '?page=' . $request->query('page');
        }

        $response = $client->request('GET', $url);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        foreach ($data['links'] as $key => $value) {
            $data['links'][$key]['url2'] = str_replace(static::API_URL, $curent_url, $value['url']);
        }

        return view('admin.buku.index', compact('data'));
    }

    public function create()
    {
        return view('admin.buku.create');
    }

    public function store(Request $request)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/buku";

        $multipart = [
            ['name' => 'judul', 'contents' => $request->judul],
            ['name' => 'penulis', 'contents' => $request->penulis],
            ['name' => 'penerbit', 'contents' => $request->penerbit],
            ['name' => 'kategori', 'contents' => $request->kategori],
            ['name' => 'stok', 'contents' => $request->stok],
        ];

        if ($request->hasFile('gambar')) {
            $multipart[] = [
                'name' => 'gambar',
                'contents' => fopen($request->file('gambar')->getPathname(), 'r'),
                'filename' => $request->file('gambar')->getClientOriginalName(),
            ];
        }

        $response = $client->request('POST', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'multipart' => $multipart,
        ]);

        $contentArray = json_decode($response->getBody()->getContents(), true);

        if ($contentArray['status'] != true) {
            return redirect()->back()
                ->withErrors($contentArray['data'])
                ->withInput();
        }

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/buku/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('admin.buku.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/buku/$id";

        $multipart = [
            [
                'name' => 'judul',
                'contents' => $request->judul
            ],
            [
                'name' => 'penulis',
                'contents' => $request->penulis
            ],
            [
                'name' => 'penerbit',
                'contents' => $request->penerbit
            ],
            [
                'name' => 'kategori',
                'contents' => $request->kategori
            ],
            [
                'name' => 'stok',
                'contents' => $request->stok
            ],
        ];

        // kirim gambar HANYA jika upload baru
        if ($request->hasFile('gambar')) {
            $multipart[] = [
                'name' => 'gambar',
                'contents' => fopen($request->file('gambar')->getPathname(), 'r'),
                'filename' => $request->file('gambar')->getClientOriginalName(),
            ];
        }

        $response = $client->request('POST', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'multipart' => $multipart,
            'query' => ['_method' => 'PUT'], // method spoofing
        ]);

        $contentArray = json_decode($response->getBody()->getContents(), true);

        if ($contentArray['status'] != true) {
            return redirect()->back()
                ->withErrors($contentArray['data'])
                ->withInput();
        }

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/buku/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['data'];
            return redirect()->to(route('buku.index'))->withErrors($error)->withInput();
        } else {
            return redirect()->to(route('buku.index'))->with('success', 'Buku berhasil dihapus!');
        }
    }
}