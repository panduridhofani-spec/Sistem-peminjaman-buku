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

        <!-- Area untuk Pemberitahuan Error Password -->
        <div id="password-error-message" class="hidden p-3 mb-4 rounded-lg bg-red-600/70 text-white font-semibold text-sm">
            <i class="fa-solid fa-triangle-exclamation mr-2"></i> Konfirmasi kata sandi tidak cocok!
        </div>

        {{-- Form --}}
        <!-- Tambahkan ID untuk JavaScript -->
        <form id="registration-form">

            {{-- Nama --}}
            <div class="mb-3">
                <label for="name" class="block text-sm font-medium text-white mb-1">Nama Lengkap</label>
                <input type="text" id="nama_user" name="nama_user" required ...
                    class="w-full px-3 py-2 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Masukkan nama lengkap kamu">
            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-3">
                <label for="phone" class="block text-sm font-medium text-white mb-1">Nomor Telepon</label>
                <input type="tel" id="no_hp" name="no_hp" required ...
                    class="w-full px-3 py-2 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Masukkan nomor telepon kamu">
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="block text-sm font-medium text-white mb-1">Alamat Email</label>
                <input type="email" id="email" name="email" required ...
                    class="w-full px-3 py-2 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Masukkan email kamu">
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="block text-sm font-medium text-white mb-1">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required ...
                        class="w-full px-3 py-2 pr-10 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="Masukkan kata sandi">
                    <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 cursor-pointer hover:text-yellow-400"
                        onclick="togglePassword('password')"></i>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="block text-sm font-medium text-white mb-1">Konfirmasi Kata
                    Sandi</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation" required ...
                        class="w-full px-3 py-2 pr-10 rounded-md bg-purple-900/50 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="Konfirmasi kata sandi">
                    <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 cursor-pointer hover:text-yellow-400"
                        onclick="togglePassword('password_confirmation')"></i>
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
            <a href="login" class="font-bold text-yellow-400 hover:underline">Masuk di sini</a>
        </p>
    </div>

    <!-- Tambahkan CDN FontAwesome dan CSS untuk memastikan ikon muncul -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Memastikan input memiliki ruang padding yang cukup di kanan untuk ikon */
        #password,
        #password_confirmation {
            padding-right: 2.5rem;
            /* Menjaga konsistensi dengan pr-10 Tailwind */
        }

        /* Memastikan ikon berada di lapisan atas (z-index) */
        .relative .fa-eye,
        .relative .fa-eye-slash {
            z-index: 10;
        }
    </style>

    <script>
        // show/hide password tetap
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

        // Batasi nomor telepon hanya angka
        document.getElementById("no_hp").addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, "");
        });

        // 🔥 SUBMIT REGISTER KE API
        document.getElementById('registration-form').addEventListener('submit', function(e) {
            e.preventDefault(); // stop submit biasa

            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            const errorMessage = document.getElementById('password-error-message');

            if (password !== passwordConfirmation) {
                errorMessage.classList.remove('hidden');
                errorMessage.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                return;
            } else {
                errorMessage.classList.add('hidden');
            }

            fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        nama_user: document.getElementById('nama_user').value,
                        no_hp: document.getElementById('no_hp').value,
                        email: document.getElementById('email').value,
                        password: password,
                        password_confirmation: passwordConfirmation,
                        alamat: '' // belum ada di form
                    })
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);

                    if (data.success) {
                        window.location.href = '/login';
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan saat registrasi');
                });
        });
    </script>

@endsection
