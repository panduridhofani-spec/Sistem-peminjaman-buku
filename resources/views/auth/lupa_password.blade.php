@extends('layouts.login')

@section('title', 'Lupa Password | BukuBareng')

@section('content')
    <a href="{{ url('/') }}" class="flex flex-col items-center mb-6">
        <img src="{{ asset('img/logo.png') }}" alt="Logo BukuBareng" 
             class="w-24 h-24 rounded-full bg-white p-1 shadow-md">
        <h1 class="text-white text-xl font-semibold mt-2">BukuBareng</h1>
    </a>

    <div class="bg-white/10 backdrop-blur-md text-white rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
        {{-- Tombol Kembali --}}
        <div class="flex items-center mb-4">
            <a href="{{ url('/masuk') }}" 
               class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-400 text-gray-300 hover:text-yellow-300 hover:border-yellow-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="text-center text-2xl font-semibold flex-1 -ml-4">Lupa Password?</h2>
        </div>

        <form method="POST" action="{{ url('/lupa-password') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm mb-1 text-gray-200">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 rounded-md bg-purple-800/50 border border-purple-400 
                           focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                    placeholder="Masukkan email kamu">
            </div>

            <p class="text-gray-300 text-sm mb-6 leading-relaxed">
                Kami akan mengirimkan kode verifikasi ke email anda untuk reset password.
            </p>

            <button type="submit"
                class="w-full bg-yellow-400 text-purple-900 font-semibold py-2 rounded-md 
                       hover:bg-yellow-300 transition transform hover:scale-[1.02]">
                Kirim Kode Verifikasi
            </button>
        </form>
    </div>
@endsection