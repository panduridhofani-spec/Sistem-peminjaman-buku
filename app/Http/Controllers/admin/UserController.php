<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    // tampilkan semua user
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/user";

        $response = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $content = json_decode($response->getBody()->getContents(), true);
        $data = $content['data'];

        return view('admin.user.index', ['data' => $data]);
    }

    // form tambah user
    public function create()
    {
        return view('admin.user.create');
    }

    // simpan user
    public function store(Request $request)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/user";

        $parameter = [
            'nama_user' => $request->nama_user,
            'email'     => $request->email,
            'password'  => $request->password,
            'no_hp'     => $request->no_hp,
            'alamat'    => $request->alamat,
        ];

        $response = $client->request('POST', $url, [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'json' => $parameter
        ]);

        $content = json_decode($response->getBody()->getContents(), true);

        if ($content['status'] != true) {
            return redirect()->back()
                ->withErrors($content['data'])
                ->withInput();
        }

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    // form edit user
    public function edit($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/user/$id";

        $response = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $content = json_decode($response->getBody()->getContents(), true);
        $data = $content['data'];

        return view('admin.user.edit', compact('data'));
    }

    // update user
    public function update(Request $request, $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/user/$id";

        $parameter = [
            'nama_user' => $request->nama_user,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'alamat'    => $request->alamat,
            'password'  => $request->password, // boleh kosong
        ];

        $response = $client->request('PUT', $url, [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'json' => $parameter
        ]);

        $content = json_decode($response->getBody()->getContents(), true);

        if ($content['status'] != true) {
            return redirect()->back()
                ->withErrors($content['data'])
                ->withInput();
        }

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diupdate');
    }

    // hapus user
    public function destroy($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/user/$id";

        $client->request('DELETE', $url, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
