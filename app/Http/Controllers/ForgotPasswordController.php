<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // 1️⃣ Kirim OTP ke email
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'Email tidak ditemukan'], 404);
        }

        $otp = rand(100000, 999999);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $otp,
                'created_at' => Carbon::now()
            ]
        );

        // kirim OTP ke email (sementara ke log)
        Mail::raw("Kode OTP reset password kamu: $otp", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Kode OTP Reset Password');
        });

        return response()->json(['message' => 'Kode OTP berhasil dikirim ke email']);
    }

    // 2️⃣ Verifikasi OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required'
        ]);

        $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->otp)
            ->first();

        if (!$record) {
            return response()->json(['message' => 'OTP tidak valid'], 400);
        }

        return response()->json(['message' => 'OTP valid']);
    }

    // 3️⃣ Reset password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->otp)
            ->first();

        if (!$record) {
            return response()->json(['message' => 'OTP tidak valid'], 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        // 🔥 CEK: password baru tidak boleh sama dengan lama
        if (Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Password baru tidak boleh sama dengan password lama'
            ], 422);
        }

        // update password
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // hapus OTP
        DB::table('password_resets')->where('email', $request->email)->delete();

        return response()->json([
            'message' => 'Password berhasil direset'
        ]);
    }
}
