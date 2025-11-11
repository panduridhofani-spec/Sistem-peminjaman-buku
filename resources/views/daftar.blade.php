<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - BukuBareng</title>

    {{-- WAJIB: Directive Vite untuk memuat CSS Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js']) 

    {{-- Link Font Awesome untuk Ikon Mata (Show/Hide Password) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> 
</head>
<body class="bg-purple-800" style="background-color: #4b0082;"> 
    
{{-- ================================================= --}}
{{--        BAGIAN FORM PENDAFTARAN (TANPA NAVBAR)           --}}
{{-- ================================================= --}}
<main class="flex items-center justify-center min-h-screen py-6">
    
    {{-- KOTAK CARD FORM UTAMA (pendek) --}}
    <div class="w-full max-w-sm p-6 rounded-xl shadow-lg"
         style="background-color: #38006b; border: 3px solid #551A8B;">
        
        {{-- Logo di Atas Form --}}
        <div class="flex justify-center mb-4">
            <a href="/"> 
                <div class="w-20 h-20 rounded-full bg-blue-300 border-4 border-white overflow-hidden shadow-lg">
                    <img src="img/logo.png" alt="Logo" class="w-full h-full object-cover rounded-full"> 
                </div>
            </a>
        </div>
        
        <h2 class="text-2xl font-bold text-center mb-6" style="color: white;">
            Buat Akun di BukuBareng
        </h2>
        
        <form method="POST" action="/register">
            @csrf 
            
            {{-- Nama --}}
            <div class="mb-3">
                <label for="name" class="block text-sm font-medium mb-1" style="color: white;">Nama Lengkap</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-3 py-2 rounded-md border focus:outline-none focus:ring-2 focus:ring-yellow-500"
                       style="background-color: #2c0052; border-color: #2c0052; color: white;"> 
            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-3">
                <label for="phone" class="block text-sm font-medium mb-1" style="color: white;">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" required
                       class="w-full px-3 py-2 rounded-md border focus:outline-none focus:ring-2 focus:ring-yellow-500"
                       style="background-color: #2c0052; border-color: #2c0052; color: white;"> 
            </div>
            
            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="block text-sm font-medium mb-1" style="color: white;">Alamat Email</label>
                <input type="email" id="email" name="email" required
                       class="w-full px-3 py-2 rounded-md border focus:outline-none focus:ring-2 focus:ring-yellow-500"
                       style="background-color: #2c0052; border-color: #2c0052; color: white;"> 
            </div>
            
            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="block text-sm font-medium mb-1" style="color: white;">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                           class="w-full px-3 py-2 rounded-md border focus:outline-none focus:ring-2 focus:ring-yellow-500 pr-8"
                           style="background-color: #2c0052; border-color: #2c0052; color: white;"> 
                    <i class="fa-solid fa-eye absolute right-2 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-300 hover:text-white" onclick="togglePassword('password')"></i>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium mb-1" style="color: white;">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           class="w-full px-3 py-2 rounded-md border focus:outline-none focus:ring-2 focus:ring-yellow-500 pr-8"
                           style="background-color: #2c0052; border-color: #2c0052; color: white;"> 
                    <i class="fa-solid fa-eye absolute right-2 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-300 hover:text-white" onclick="togglePassword('password_confirmation')"></i>
                </div>
            </div>
            
            {{-- Tombol --}}
            <button type="submit" 
                    class="w-full py-2 rounded-lg font-bold transition duration-300 ease-in-out"
                    style="background-color: #FFC000; color: #4b0082;">
                Buat Akun
            </button>
        </form>
        
        {{-- Link Login --}}
        <div class="text-center mt-3 text-sm" style="color: white;">
            Sudah Memiliki Akun?
            <a href="/masuk" class="font-bold hover:underline" style="color: #FFC000;">
                Masuk Disini
            </a>
        </div>
        
    </div>
</main>


{{-- Script JavaScript untuk Show/Hide Password (tetap sama) --}}

{{-- Script JavaScript untuk Show/Hide Password (tetap sama) --}}

{{-- SCRIPT JAVASCRIPT UNTUK FUNGSI SHOW/HIDE PASSWORD --}}


<script>
    // Fungsi Show/Hide Password
    function togglePassword(id) {
        const input = document.getElementById(id);
        const icon = input.nextElementSibling;

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Fungsi Validasi Form
    document.querySelector("form").addEventListener("submit", function(e) {
        e.preventDefault(); // Cegah submit otomatis dulu

        const name = document.getElementById("name").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const confirm = document.getElementById("password_confirmation").value.trim();

        // Cek input kosong
        if (!name) {
            alert("Nama lengkap belum diisi!");
            return;
        }

        if (!phone) {
            alert("Nomor telepon belum diisi!");
            return;
        }

        // Validasi nomor telepon hanya angka
        if (!/^[0-9]+$/.test(phone)) {
            alert("Nomor telepon hanya boleh berisi angka!");
            return;
        }

        if (!email) {
            alert("Alamat email belum diisi!");
            return;
        }

        if (!password) {
            alert("Kata sandi belum diisi!");
            return;
        }

        if (!confirm) {
            alert("Konfirmasi kata sandi belum diisi!");
            return;
        }

        if (password !== confirm) {
            alert("Konfirmasi kata sandi tidak sama!");
            return;
        }

        // Jika semua valid → submit form
        this.submit();
    });

    // Opsional: Batasi input phone agar hanya bisa ketik angka
    document.getElementById("phone").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, ""); // Hapus karakter selain angka
    });
</script>



</body>
</html>