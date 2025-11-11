<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi | BukuBareng</title>

    {{-- Load Tailwind & JS dari Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-purple-800 to-purple-950">

    {{-- LOGO --}}
    <a href="{{ url('/') }}" class="flex flex-col items-center mb-6">
        <img src="{{ asset('img/logo.png') }}" alt="Logo BukuBareng" 
             class="w-24 h-24 rounded-full bg-white p-1 shadow-md">
        <h1 class="text-white text-xl font-semibold mt-2">BukuBareng</h1>
    </a>

    {{-- CARD VERIFIKASI --}}
    <div class="bg-white/10 backdrop-blur-md text-white rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
        {{-- Header dengan tombol kembali --}}
        <div class="flex items-center mb-6">
            <a href="{{ url('/lupa_password') }}" 
               class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-400 text-gray-300 hover:text-yellow-300 hover:border-yellow-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="text-center text-2xl font-semibold flex-1 -ml-4">Masukkan Kode Verifikasi</h2>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ url('/verifikasi') }}" id="verifyForm">
            @csrf

            <div class="flex justify-between mb-6">
                @for ($i = 1; $i <= 6; $i++)
                    <input type="text" maxlength="1" name="code[]" 
                        class="w-10 h-12 text-center text-lg font-semibold bg-purple-800/50 border border-purple-400 rounded-md 
                               focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                        oninput="moveNext(this, {{ $i }})"
                        autocomplete="off">
                @endfor
            </div>

            <p class="text-gray-300 text-sm mb-6 text-center">
                Masukkan 6 digit kode verifikasi yang telah dikirim ke email kamu.
            </p>

            <button type="submit"
                class="w-full bg-yellow-400 text-purple-900 font-semibold py-2 rounded-md 
                       hover:bg-yellow-300 transition transform hover:scale-[1.02]">
                Verifikasi
            </button>

            <div class="text-center mt-4 text-sm">
                <p>Belum menerima kode? 
                    <a href="#" class="text-yellow-400 hover:underline">Kirim Ulang</a>
                </p>
            </div>
        </form>
    </div>

    {{-- Script untuk otomatis pindah antar kotak input --}}
    <script>
        function moveNext(current, index) {
            const nextInput = document.querySelectorAll('input[name="code[]"]')[index];
            if (current.value.length === 1 && nextInput) {
                nextInput.focus();
            }
        }

        // Jika user tekan Backspace, pindah ke kotak sebelumnya
        document.querySelectorAll('input[name="code[]"]').forEach((input, i, arr) => {
            input.addEventListener('keydown', e => {
                if (e.key === 'Backspace' && input.value === '' && i > 0) {
                    arr[i - 1].focus();
                }
            });
        });
    </script>

</body>
</html>
