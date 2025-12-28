<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::with(['user', 'buku', 'admin'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_buku' => 'required|exists:buku,id_buku',
            'jumlah_buku' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $booking = Booking::create([
            ...$validated,
            'status_booking' => 'pending',
        ]);

        return response()->json(['message' => 'Booking berhasil dibuat', 'data' => $booking]);
    }

    public function validateBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status_booking' => 'validated']);

        return response()->json(['message' => 'Booking divalidasi']);
    }
}
