<nav class="bg-purple-900 p-4 fixed top-0 w-full z-30 shadow-lg" style="background-color: #551A8B;">
    <div class="flex items-center justify-between mx-auto px-6 py-1 md:px-12">

        <a href="/" class="flex items-center space-x-2">
            <div class="w-10 h-10 rounded-full bg-white p-1 shadow-md">
                <!-- Placeholder logo dengan fallback -->
                <img src="img/logo.png"
                    onerror="this.onerror=null; this.src='https://placehold.co/40x40/7C3AED/FFFFFF?text=L'" alt="Logo"
                    class="w-full h-full object-cover rounded-full">
            </div>
            <span class="text-xl font-semibold text-white hidden sm:block">BukuBareng</span>
        </a>

        <!-- Navigasi, Auth Buttons, dan Ikon -->
        <div class="flex items-center space-x-4 md:space-x-6 text-lg font-medium ml-auto">

            <!-- Link Navigasi -->
            <a href="/" class="hover:text-yellow-300 transition hidden md:block">Home</a>
            <a href="/tentang_kami" class="hover:text-yellow-300 transition hidden md:block">Tentang Kami</a>

            <!-- Ikon Utilitas - Ditambahkan ID untuk JS -->
            <a href="#search-section" class="text-white hover:text-yellow-300 transition hidden md:block"
                id="search-icon">
                <i class="fa-solid fa-magnifying-glass text-xl"></i>
            </a>

            <!-- Ikon Keranjang Belanja - Ditambahkan ID untuk JS -->
            <a href="#" class="text-white hover:text-yellow-300 transition" id="bag-shopping-icon">
                <i class="fa-solid fa-bag-shopping text-xl"></i>
            </a>

            <!-- Tombol Daftar & Masuk -->
            <a href="daftar"
                class="bg-yellow-400 hover:bg-yellow-500 text-purple-900 font-semibold py-2 px-4 rounded-full transition hidden sm:block">
                Daftar
            </a>

            <a href="masuk"
                class="bg-white hover:bg-gray-200 text-purple-900 font-semibold py-2 px-4 rounded-full transition hidden sm:block">
                Masuk
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
