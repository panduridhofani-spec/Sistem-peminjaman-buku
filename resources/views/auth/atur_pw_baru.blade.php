@extends('layouts.login')

@section('title', 'Atur Password Baru | BukuBareng')

@section('content')

    <body class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-purple-800 to-purple-950">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="flex flex-col items-center mb-8">
            <img src="{{ asset('img/logo.png') }}" alt="Logo BukuBareng" class="w-24 h-24 rounded-full bg-white p-1 shadow-lg">
            <h1 class="text-white text-xl font-semibold mt-3">BukuBareng</h1>
        </a>

        {{-- CARD ATUR PASSWORD BARU --}}
        <div
            class="bg-white/10 backdrop-blur-lg text-white rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
            {{-- Header --}}
            <div class="flex items-center mb-6 gap-10">
                <a href="{{ url('/verifikasi') }}"
                    class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-400 text-gray-300 hover:text-yellow-300 hover:border-yellow-300 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h2 class="flex-1 text-center text-2xl font-semibold -ml-4">Atur Password Baru</h2>
            </div>

            {{-- FORM --}}
            <form id="passwordForm" onsubmit="return false;">
                <input type="hidden" id="email" value="{{ request('email') }}">
                <input type="hidden" id="otp" value="{{ request('otp') }}">


                {{-- PASSWORD BARU --}}
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-300 text-sm mb-2">Password Baru</label>
                    <div class="relative">
                        <input type="password" id="new_password" name="new_password"
                            class="w-full px-4 py-3 bg-purple-800/50 border border-purple-500 rounded-md 
                               focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                            placeholder="Masukkan password baru" required>
                        <button type="button"
                            class="absolute right-3 top-3 text-gray-400 hover:text-yellow-400 toggle-password"
                            data-target="new_password" aria-label="Tampilkan password">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274
                                       4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div class="mb-6">
                    <label for="confirm_password" class="block text-gray-300 text-sm mb-2">Konfirmasi Password</label>
                    <div class="relative">
                        <input type="password" id="confirm_password" name="confirm_password"
                            class="w-full px-4 py-3 bg-purple-800/50 border border-purple-500 rounded-md 
                               focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                            placeholder="Konfirmasi password baru" required>
                        <button type="button"
                            class="absolute right-3 top-3 text-gray-400 hover:text-yellow-400 toggle-password"
                            data-target="confirm_password" aria-label="Tampilkan konfirmasi password">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274
                                       4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <p id="password-error" class="text-red-400 text-xs mt-2 hidden">Password tidak cocok</p>
                </div>

                {{-- TOMBOL SUBMIT --}}
                <button type="submit"
                    class="w-full bg-yellow-400 text-purple-900 font-semibold py-3 rounded-md 
                       hover:bg-yellow-300 transition transform hover:scale-[1.02] duration-200">
                    Atur Password
                </button>
            </form>
        </div>

        {{-- SCRIPT --}}
        <script>
            // Toggle password visibility (tetap)
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const isHidden = input.type === 'password';

                    input.type = isHidden ? 'text' : 'password';
                });
            });

            const form = document.getElementById('passwordForm');
            const newPass = document.getElementById('new_password');
            const confirmPass = document.getElementById('confirm_password');
            const errorMsg = document.getElementById('password-error');

            const validatePasswords = () => {
                if (newPass.value && confirmPass.value && newPass.value !== confirmPass.value) {
                    errorMsg.classList.remove('hidden');
                    return false;
                } else {
                    errorMsg.classList.add('hidden');
                    return true;
                }
            };

            confirmPass.addEventListener('input', validatePasswords);
            newPass.addEventListener('input', validatePasswords);

            // 🔥 SUBMIT KE API RESET PASSWORD
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (!validatePasswords()) return;

                fetch('/api/reset-password', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            email: document.getElementById('email').value,
                            otp: document.getElementById('otp').value,
                            password: newPass.value,
                            password_confirmation: confirmPass.value
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                        if (data.message && data.message.includes('berhasil')) {
                            window.location.href = '/login';
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Terjadi kesalahan saat reset password');
                    });
            });
        </script>

    </body>

@endsection
