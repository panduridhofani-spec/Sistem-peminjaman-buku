<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Password Baru | BukuBareng</title>

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

    {{-- CARD ATUR PASSWORD BARU --}}
    <div class="bg-white/10 backdrop-blur-md text-white rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
        {{-- Header dengan tombol kembali --}}
        <div class="flex items-center mb-6">
            <a href="{{ url('/verifikasi') }}" 
               class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-400 text-gray-300 hover:text-yellow-300 hover:border-yellow-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="text-center text-2xl font-semibold flex-1 -ml-4">Atur Password Baru</h2>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ url('/atur_password_baru') }}" id="passwordForm">
            @csrf

            <div class="mb-4">
                <label for="new_password" class="block text-gray-300 text-sm mb-2">Password Baru</label>
                <div class="relative">
                    <input type="password" id="new_password" name="new_password" 
                           class="w-full px-4 py-3 bg-purple-800/50 border border-purple-400 rounded-md 
                                  focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                           placeholder="Masukkan password baru"
                           required>
                    <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-yellow-400 toggle-password" data-target="new_password">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mb-6">
                <label for="confirm_password" class="block text-gray-300 text-sm mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" id="confirm_password" name="confirm_password" 
                           class="w-full px-4 py-3 bg-purple-800/50 border border-purple-400 rounded-md 
                                  focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-300"
                           placeholder="Konfirmasi password baru"
                           required>
                    <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-yellow-400 toggle-password" data-target="confirm_password">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <p id="password-error" class="text-red-400 text-xs mt-2 hidden">Password tidak cocok</p>
            </div>

            <button type="submit"
                class="w-full bg-yellow-400 text-purple-900 font-semibold py-3 rounded-md 
                       hover:bg-yellow-300 transition transform hover:scale-[1.02]">
                Atur Password
            </button>
        </form>
    </div>

    {{-- Script untuk toggle password visibility dan validasi --}}
    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    this.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    `;
                } else {
                    passwordInput.type = 'password';
                    this.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    `;
                }
            });
        });

        // Validasi password match
        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const errorElement = document.getElementById('password-error');
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                errorElement.classList.remove('hidden');
                document.getElementById('confirm_password').classList.add('border-red-400');
            } else {
                errorElement.classList.add('hidden');
                document.getElementById('confirm_password').classList.remove('border-red-400');
            }
        });

        // Real-time validation
        document.getElementById('confirm_password').addEventListener('input', function() {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = this.value;
            const errorElement = document.getElementById('password-error');
            
            if (confirmPassword && newPassword !== confirmPassword) {
                errorElement.classList.remove('hidden');
                this.classList.add('border-red-400');
            } else {
                errorElement.classList.add('hidden');
                this.classList.remove('border-red-400');
            }
        });
    </script>

</body>
</html>