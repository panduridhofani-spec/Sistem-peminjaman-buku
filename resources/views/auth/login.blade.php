@extends('layouts.login')

@section('title', 'Masuk | BukuBareng')

@section('content')
    <a href="{{ url('/') }}" class="flex flex-col items-center mb-6">
        <img src="{{ asset('img/logo.png') }}" alt="Logo BukuBareng" class="w-24 h-24 rounded-full bg-white p-1 shadow-md">
        <h1 class="text-white text-xl font-semibold mt-2">BukuBareng</h1>
    </a>

    <div
        class="bg-white/10 backdrop-blur-md text-white rounded-2xl shadow-2xl 
            p-4 w-[500px] max-w-md border border-white/20">

        <h2 class="text-center text-2xl font-semibold mb-4">Masuk ke Akun</h2>

        {{-- FORM LOGIN --}}
        <form id="login-form">

            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-200">Email</label>
                <input type="email" id="email" required
                    class="w-full px-3 py-2 rounded-md bg-purple-800/50 border border-purple-400 
                       focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white"
                    placeholder="Masukkan email">
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-200">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password" required
                        class="w-full px-3 py-2 rounded-md bg-purple-800/50 border border-purple-400 
                           focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white"
                        placeholder="Masukkan kata sandi">

                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-2.5 text-gray-400 hover:text-yellow-300">
                        👁
                    </button>
                </div>
            </div>

            <div class="text-right text-sm mb-4">
                <a href="{{ url('/lupa_password') }}" class="text-yellow-300 hover:underline">
                    Lupa Password?
                </a>
            </div>

            <button type="submit"
                class="w-full bg-yellow-400 text-purple-900 font-semibold py-2 rounded-md 
                   hover:bg-yellow-300 transition">
                Masuk
            </button>
        </form>

        <div class="text-center mt-4 text-sm">
            <p class="text-gray-200">Belum punya akun?</p>
            <a href="{{ url('/daftar') }}" class="text-yellow-400 hover:underline font-semibold">
                Daftar Sekarang
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('login-form');
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.getElementById('togglePassword');

            // TOGGLE PASSWORD
            toggleBtn.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleBtn.innerHTML = '🙈';
                } else {
                    passwordInput.type = 'password';
                    toggleBtn.innerHTML = '👁';
                }
            });

            // SUBMIT LOGIN
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                try {

                    const res = await fetch('/api/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            email: document.getElementById('email').value,
                            password: passwordInput.value
                        })
                    });

                    const data = await res.json();

                    if (!data.success) {
                        alert(data.message);
                        return;
                    }

                    // ✅ SIMPAN TOKEN
                    localStorage.setItem('token', data.data.token);
                    localStorage.setItem('user', JSON.stringify(data.data.user));

                    alert('Login berhasil');

                    const role = data.data.user.role;

                    // REDIRECT
                    if (role === 'admin') {
                        window.location.href = '/admin';
                    } else {
                        window.location.href = '/dashboard';
                    }

                } catch (err) {
                    alert('Server error');
                }
            });

        });
    </script>


@endsection
