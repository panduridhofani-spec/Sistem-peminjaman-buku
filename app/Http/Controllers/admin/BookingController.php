<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BookingController extends Controller
{
    protected $client;
    protected $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'http://127.0.0.1:8000/api/booking';
    }

    public function index()
    {
        $response = $this->client->request('GET', $this->apiUrl);
        $result = json_decode($response->getBody(), true);

        $data = $result['data'];

        return view('admin.booking.index', compact('data'));
    }

    public function create()
    {
        return view('admin.booking.create');
    }

    public function store(Request $request)
    {
        try {
            $response = $this->client->request('POST', $this->apiUrl, [
                'headers' => ['Accept' => 'application/json'],
                'json' => [
                    'id_user'        => $request->id_user,
                    'id_buku'        => $request->id_buku,
                    'id_admin'       => $request->id_admin,
                    'jumlah_buku'    => $request->jumlah_buku,
                    'tanggal'        => $request->tanggal,
                    'status_booking' => $request->status_booking
                ]
            ]);

            return redirect()->route('admin.booking.index')
                ->with('success', 'Booking berhasil ditambahkan');

        } catch (\Exception $e) {
            return back()->withErrors('Gagal menyimpan booking')->withInput();
        }
    }

    public function edit($id)
    {
        $response = $this->client->request('GET', $this->apiUrl . '/' . $id);
        $result = json_decode($response->getBody(), true);

        $data = $result['data'];

        return view('admin.booking.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->client->request('PUT', $this->apiUrl . '/' . $id, [
                'headers' => ['Accept' => 'application/json'],
                'json' => [
                    'id_user'        => $request->id_user,
                    'id_buku'        => $request->id_buku,
                    'id_admin'       => $request->id_admin,
                    'jumlah_buku'    => $request->jumlah_buku,
                    'tanggal'        => $request->tanggal,
                    'status_booking' => $request->status_booking
                ]
            ]);

            return redirect()->route('admin.booking.index')
                ->with('success', 'Booking berhasil diperbarui');

        } catch (\Exception $e) {
            return back()->withErrors('Gagal update booking')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->client->request('DELETE', $this->apiUrl . '/' . $id);

            return redirect()->route('admin.booking.index')
                ->with('success', 'Booking berhasil dihapus');

        } catch (\Exception $e) {
            return back()->withErrors('Gagal menghapus booking');
        }
    }
}
