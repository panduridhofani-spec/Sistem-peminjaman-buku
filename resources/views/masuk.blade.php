<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | BukuBareng</title>

    {{-- Load Tailwind & JS dari Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-purple-800 to-purple-950">

    {{-- LOGO --}}
    <a href="{{ url('/') }}" class="flex flex-col items-center mb-6">
        <img src="{{ asset('img/logo.png') }}" alt="Logo BukuBareng" class="w-24 h-24 rounded-full bg-white p-1 shadow-md">
        <h1 class="text-white text-xl font-semibold mt-2">BukuBareng</h1>
    </a>

    {{-- CARD LOGIN --}}
    <div
        class="bg-white/10 backdrop-blur-md text-white rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
        <h2 class="text-center text-2xl font-semibold mb-6">Masuk ke Akun</h2>

        <form method="POST" action="{{ url('/masuk') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm mb-1 text-gray-200">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 rounded-md bg-purple-800/50 border border-purple-400 
                           focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                    placeholder="Masukkan email kamu">
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm mb-1 text-gray-200">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 rounded-md bg-purple-800/50 border border-purple-400 
                               focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                        placeholder="Masukkan kata sandi">

                    {{-- Ikon mata --}}
                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-2.5 text-gray-400 hover:text-yellow-300 transition">
                        {{-- Mata terbuka (default) --}}
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{-- Mata tertutup --}}
                        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.717-4.263M9.88 9.88a3 3 0 104.24 4.24M3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Lupa password --}}
            <div class="text-right text-sm mb-4">
                <a href="{{ url('/lupa_password') }}" class="text-yellow-300 hover:underline">Lupa Password?</a>
            </div>

            {{-- Tombol Masuk --}}
            <button type="submit"
                class="w-full bg-yellow-400 text-purple-900 font-semibold py-2 rounded-md 
                       hover:bg-yellow-300 transition transform hover:scale-[1.02]">
                Masuk
            </button>
        </form>

        {{-- Link ke daftar --}}
        <div class="text-center mt-4 text-sm">
            <p class="text-gray-200">Belum punya akun?</p>
            <a href="{{ url('/daftar') }}" class="text-yellow-400 hover:underline font-semibold">
                Daftar Sekarang
            </a>
        </div>
    </div>

    {{-- Script Show/Hide Password --}}
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', () => {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
        });
    </script>

</body>

</html>
