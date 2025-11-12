@extends('layouts.login')

@section('title', 'Masuk | BukuBareng')

@section('content')

<div class="w-[500px] max-w-sm bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-4">

    {{-- Logo --}}
    <div class="flex justify-center mb-4">
        <a href="/">
            <div class="w-20 h-20 rounded-full overflow-hidden border-1 border-yellow-400 shadow-md">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
        </a>
    </div>

    {{-- Judul --}}
    <h2 class="text-2xl font-bold text-center text-white mb-6">
        Buat Akun BukuBareng
    </h2>

    {{-- Form --}}
    <form method="POST" action="/register">
        @csrf

        {{-- Nama --}}
        <div class="mb-3">
            <label for="name" class="block text-sm font-medium text-white mb-1">Nama Lengkap</label>
            <input type="text" id="name" name="name" required
                class="w-full px-3 py-2 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                placeholder="Masukkan nama lengkap kamu">
        </div>

        {{-- Nomor Telepon --}}
        <div class="mb-3">
            <label for="phone" class="block text-sm font-medium text-white mb-1">Nomor Telepon</label>
            <input type="tel" id="phone" name="phone" required
                class="w-full px-3 py-2 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                placeholder="Masukkan nomor telepon kamu">
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="block text-sm font-medium text-white mb-1">Alamat Email</label>
            <input type="email" id="email" name="email" required
                class="w-full px-3 py-2 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                placeholder="Masukkan email kamu">
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="block text-sm font-medium text-white mb-1">Kata Sandi</label>
            <div class="relative">
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 pr-10 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Masukkan kata sandi">
                <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 cursor-pointer hover:text-yellow-400" onclick="togglePassword('password')"></i>
            </div>
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-3">
            <label for="password_confirmation" class="block text-sm font-medium text-white mb-1">Konfirmasi Kata Sandi</label>
            <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-3 py-2 pr-10 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Konfirmasi kata sandi">
                <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 cursor-pointer hover:text-yellow-400" onclick="togglePassword('password_confirmation')"></i>
            </div>
        </div>

        {{-- Tombol --}}
        <button type="submit"
            class="w-full py-2 mt-2 rounded-md font-semibold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition">
            Buat Akun
        </button>
    </form>

    {{-- Link ke halaman login --}}
    <p class="text-center text-sm text-gray-200 mt-4">
        Sudah punya akun?
        <a href="masuk" class="font-bold text-yellow-400 hover:underline">Masuk di sini</a>
    </p>
</div>

<script>
    // Fungsi show/hide password
    function togglePassword(id) {
        const input = document.getElementById(id);
        const icon = input.nextElementSibling;

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    // Batasi input nomor telepon agar hanya angka
    document.getElementById("phone").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
</script>
@endsection