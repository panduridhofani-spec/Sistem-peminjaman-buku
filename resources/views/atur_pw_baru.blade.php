@extends('layouts.app')

@section('title', 'Atur Password Baru | BukuBareng')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-purple-800 to-purple-950">

    logo
    <a href="{{ url('/') }}" class="flex flex-col items-center mb-8">
        <img src="{{ asset('img/logo.png') }}" 
             alt="Logo BukuBareng" 
             class="w-24 h-24 rounded-full bg-white p-1 shadow-md hover:scale-105 transition-transform duration-300">
        <h1 class="text-white text-xl font-semibold mt-2 tracking-wide">BukuBareng</h1>
    </a>

    {{-- CARD ATUR PASSWORD BARU --}}
    <div class="bg-white/10 backdrop-blur-md text-white rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">

        {{-- Header dengan tombol kembali --}}
        <div class="flex items-center mb-6">
            <a href="{{ url('/verifikasi') }}"
                class="flex items-center justify-center w-9 h-9 rounded-md border border-gray-400 text-gray-300 hover:text-yellow-400 hover:border-yellow-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="text-center text-2xl font-semibold flex-1 -ml-4">Atur Password Baru</h2>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ url('/atur_password_baru') }}" id="passwordForm">
            @csrf

            {{-- Password Baru --}}
            <div class="mb-4">
                <label for="new_password" class="block text-gray-300 text-sm mb-2">Password Baru</label>
                <div class="relative">
                    <input type="password" id="new_password" name="new_password"
                        class="w-full px-4 py-3 bg-purple-800/50 border border-purple-400 rounded-md
                              focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300 transition"
                        placeholder="Masukkan password baru" required>
                    <button type="button"
                        class="absolute right-3 top-3 text-gray-400 hover:text-yellow-400 toggle-password"
                        data-target="new_password">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                                   9.542 7-1.274 4.057-5.064 7-9.542 
                                   7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-6">
                <label for="confirm_password" class="block text-gray-300 text-sm mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" id="confirm_password" name="confirm_password"
                        class="w-full px-4 py-3 bg-purple-800/50 border border-purple-400 rounded-md
                              focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300 transition"
                        placeholder="Konfirmasi password baru" required>
                    <button type="button"
                        class="absolute right-3 top-3 text-gray-400 hover:text-yellow-400 toggle-password"
                        data-target="confirm_password">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 
                                   12 5c4.478 0 8.268 2.943 9.542 
                                   7-1.274 4.057-5.064 7-9.542 
                                   7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <p id="password-error" class="text-red-400 text-xs mt-2 hidden">⚠️ Password tidak cocok</p>
            </div>

            {{-- Tombol Submit --}}
            <button type="submit"
                class="w-full bg-yellow-400 text-purple-900 font-semibold py-3 rounded-md 
                       hover:bg-yellow-300 transition transform hover:scale-[1.02] focus:ring-4 focus:ring-yellow-300">
                Atur Password
            </button>
        </form>
    </div>
</div>

{{-- Script toggle dan validasi password --}}
<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const target = document.getElementById(this.dataset.target);
            const iconVisible = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M13.875 18.825A10.05 10.05 0 0112 19
                             c-4.478 0-8.268-2.943-9.543-7
                             a9.97 9.97 0 011.563-3.029m5.858.908
                             a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M3 3l18 18" />
                </svg>`;
            const iconHidden = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M2.458 12C3.732 7.943 7.523 5 
                             12 5c4.478 0 8.268 2.943 9.542 7
                             -1.274 4.057-5.064 7-9.542 7
                             -4.477 0-8.268-2.943-9.542-7z" />
                </svg>`;
            if (target.type === 'password') {
                target.type = 'text';
                this.innerHTML = iconVisible;
            } else {
                target.type = 'password';
                this.innerHTML = iconHidden;
            }
        });
    });

    // Validasi password match (real-time & on submit)
    const newPass = document.getElementById('new_password');
    const confirmPass = document.getElementById('confirm_password');
    const errorMsg = document.getElementById('password-error');
    const form = document.getElementById('passwordForm');

    const validateMatch = () => {
        if (confirmPass.value && newPass.value !== confirmPass.value) {
            errorMsg.classList.remove('hidden');
            confirmPass.classList.add('border-red-400');
        } else {
            errorMsg.classList.add('hidden');
            confirmPass.classList.remove('border-red-400');
        }
    };

    confirmPass.addEventListener('input', validateMatch);
    newPass.addEventListener('input', validateMatch);

    form.addEventListener('submit', e => {
        if (newPass.value !== confirmPass.value) {
            e.preventDefault();
            errorMsg.classList.remove('hidden');
            confirmPass.classList.add('border-red-400');
        }
    });
</script>
@endsection