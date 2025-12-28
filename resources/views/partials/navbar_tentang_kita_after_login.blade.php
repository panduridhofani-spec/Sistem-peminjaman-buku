<nav class="bg-purple-900 p-4 fixed top-0 w-full z-30 shadow-lg" style="background-color: #551A8B;">
    <div class="flex items-center justify-between mx-auto px-6 py-1 md:px-12">

        <!-- Logo (Kiri) -->
        <a href="/" class="flex items-center space-x-2">
            <div class="w-10 h-10 rounded-full bg-white p-1 shadow-md">
                <img src="img/logo.png"
                    onerror="this.onerror=null; this.src='https://placehold.co/40x40/7C3AED/FFFFFF?text=L'" alt="Logo"
                    class="w-full h-full object-cover rounded-full">
            </div>
            <span class="text-xl font-semibold text-white hidden sm:block">BukuBareng</span>
        </a>

        <!-- Navigasi, Auth Buttons, dan Ikon (Digeser ke Kanan, Diatur Urutannya) -->
        <!-- Gunakan ml-auto untuk mendorong grup ini ke kanan (hanya pada breakpoint md ke atas) -->
        <div class="flex items-center space-x-4 md:space-x-4 text-lg font-medium ml-auto">

            <!-- Link Navigasi -->
            <a href="/dashboard_after_login"
                class="text-white hover:text-yellow-300 transition hidden md:block">Home</a>
            <a href="/tentang_kami" class="text-white hover:text-yellow-300 transition hidden md:block">Tentang Kami</a>

            <!-- Ikon Utilitas (Pindah ke sini, di kiri Tombol Auth) -->
            <a href="#" class="text-white hover:text-yellow-300 transition hidden md:block">
                <i class="fa-solid fa-magnifying-glass text-xl"></i>
            </a>
            <a href="#" class="text-white hover:text-yellow-300 transition hidden md:block">
                <i class="fa-solid fa-bag-shopping text-xl"></i>
            </a>

            <!-- Akun Saya (Menggantikan Daftar/Masuk) -->
            <a href="/profil"
                class="bg-yellow-400 text-purple-900 font-semibold py-2 px-4 rounded-full transition hover:bg-yellow-300 flex items-center">
                <i class="fa-solid fa-user text-sm mr-2"></i>
                <span class="hidden sm:inline">Akun Saya</span>
            </a>

        </div>

        <!-- Tombol WA (Paling Kanan) -->
        <div class="flex items-center space-x-4 ml-4 md:ml-8">
            <a href="https://wa.me/082232709316"
                class="bg-green-600 hover:bg-green-500 text-white font-semibold py-2 px-4 rounded-full transition flex items-center">
                <i class="fa-brands fa-whatsapp md:mr-2"></i>
                <span class="hidden md:inline">Whatsapp Admin</span>
            </a>
        </div>

    </div>
</nav>
