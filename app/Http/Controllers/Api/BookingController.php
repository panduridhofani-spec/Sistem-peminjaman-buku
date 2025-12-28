<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    // GET: semua booking
    public function index()
    {
        $bookings = Booking::with(['user', 'buku', 'admin'])->get();

        return response()->json([
            'status' => true,
            'message' => 'Data booking ditemukan',
            'data' => $bookings
        ], 200);
    }

    // POST: tambah booking
    public function store(Request $request)
    {
        $rules = [
            'id_user'        => 'required|exists:users,id_user',
            'id_buku'        => 'required|exists:bukus,id_buku',
            'id_admin'       => 'nullable|exists:admins,id_admin',
            'jumlah_buku'    => 'required|integer|min:1',
            'tanggal'        => 'required|date',
            'status_booking' => 'required|in:dipinjam,selesai,dibatalkan'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 400);
        }

        $booking = Booking::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Booking berhasil ditambahkan',
            'data' => $booking
        ], 201);
    }

    // GET: detail booking
    public function show($id)
    {
        $booking = Booking::with(['user', 'buku', 'admin'])
            ->where('id_booking', $id)
            ->first();

        if (!$booking) {
            return response()->json([
                'status' => false,
                'message' => 'Booking tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $booking
        ], 200);
    }

    // PUT: update booking
    public function update(Request $request, $id)
    {
        $booking = Booking::where('id_booking', $id)->first();

        if (!$booking) {
            return response()->json([
                'status' => false,
                'message' => 'Booking tidak ditemukan'
            ], 404);
        }

        $rules = [
            'id_user'        => 'required|exists:users,id_user',
            'id_buku'        => 'required|exists:bukus,id_buku',
            'id_admin'       => 'nullable|exists:admins,id_admin',
            'jumlah_buku'    => 'required|integer|min:1',
            'tanggal'        => 'required|date',
            'status_booking' => 'required|in:dipinjam,selesai,dibatalkan'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 400);
        }

        $booking->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Booking berhasil diupdate'
        ], 200);
    }

    // DELETE: hapus booking
    public function destroy($id)
    {
        $booking = Booking::where('id_booking', $id)->first();

        if (!$booking) {
            return response()->json([
                'status' => false,
                'message' => 'Booking tidak ditemukan'
            ], 404);
        }

        $booking->delete();

        return response()->json([
            'status' => true,
            'message' => 'Booking berhasil dihapus'
        ], 200);
    }
}
