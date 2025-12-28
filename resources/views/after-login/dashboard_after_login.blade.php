@extends('layouts.app_after_login')

@section('title', 'dashboard_after_login | BukuBareng')

@section('content')

    <!-- Konten Homepage -->

    <!-- 1. Banner Carousel Container (Auto Slide) -->
    <div class="max-w-4xl mx-auto mb-12 relative overflow-hidden rounded-3xl shadow-lg">
        <div id="main-slider-container" class="flex w-full">
            <!-- Slide 1 -->
            <img src="img/carousel/slide1.png"
                onerror="this.onerror=null; this.src='https://placehold.co/800x200/551A8B/FFFFFF?text=BANNER+1'"
                class="w-full h-auto object-cover flex-shrink-0" alt="Banner BukuBareng 1">
            <!-- Slide 2 (Dummy) -->
            <img src="img/carousel/slide2.png"
                onerror="this.onerror=null; this.src='https://placehold.co/800x200/8A2BE2/FFFFFF?text=BANNER+2'"
                class="w-full h-auto object-cover flex-shrink-0" alt="Banner BukuBareng 2">
            <!-- Slide 3 (Dummy) -->
            <img src="img/carousel/slide3.png"
                onerror="this.onerror=null; this.src='https://placehold.co/800x200/9932CC/FFFFFF?text=BANNER+3'"
                class="w-full h-auto object-cover flex-shrink-0" alt="Banner BukuBareng 3">
            <!-- Slide 4 (Dummy) -->
            <img src="img/carousel/slide4.png"
                onerror="this.onerror=null; this.src='https://placehold.co/800x200/9932CC/FFFFFF?text=BANNER+4'"
                class="w-full h-auto object-cover flex-shrink-0" alt="Banner BukuBareng 4">
        </div>
    </div>
    <!-- Akhir Banner Carousel -->

    <h2 class="text-center text-3xl font-bold text-yellow-300 mb-10">Welcome To BukuBareng</h2>

    <!-- 2. Kategori Carousel Container (Manual Slide) -->
    <div class="bg-purple-900 p-6 rounded-3xl shadow-xl max-w-5xl mx-auto mb-12 relative">

        <!-- Tombol Navigasi Kiri (Previous) -->
        <button id="kategori-prev-btn"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 z-10 bg-purple-700/70 hover:bg-purple-700 p-3 rounded-full shadow-lg transition">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <!-- Kontainer Utama Slider Kategori -->
        <div class="overflow-hidden">
            <div id="kategori-slider-container" class="flex w-full">

                <!-- Halaman Kategori 1 (4 item) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-2 flex-shrink-0 w-full">

                    <div class="text-center">
                        <img src="img/carousel-kategori/fiksi 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Fiksi'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Fiksi</p>
                        <span class="text-sm">Novel & Cerpen</span>
                    </div>

                    <div class="text-center">
                        <img src="img/carousel-kategori/ilmiah 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Ilmiah'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Ilmiah</p>
                        <span class="text-sm">Pengetahuan & Sains</span>
                    </div>

                    <div class="text-center">
                        <img src="img/carousel-kategori/Motivasi 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Motivasi'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Motivasi</p>
                        <span class="text-sm">Pengembangan Diri</span>
                    </div>

                    <div class="text-center">
                        <img src="img/carousel-kategori/komik 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Komik'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Komik & Grafis</p>
                        <span class="text-sm">Manga & Ilustrasi</span>
                    </div>
                </div>

                <!-- Halaman Kategori 2 (4 item baru) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-2 flex-shrink-0 w-full">

                    <div class="text-center">
                        <img src="img/carousel-kategori/sejarah 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Sejarah'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Sejarah</p>
                        <span class="text-sm">Perang & Biografi</span>
                    </div>

                    <div class="text-center">
                        <img src="img/carousel-kategori/anak 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Anak'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Anak</p>
                        <span class="text-sm">Edukasi & Dongeng</span>
                    </div>

                    <div class="text-center">
                        <img src="img/carousel-kategori/romantis 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Religi'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Religi</p>
                        <span class="text-sm">Islam & Kristen</span>
                    </div>

                    <div class="text-center">
                        <img src="img/carousel-kategori/teknologi 1.png"
                            onerror="this.onerror=null; this.src='https://placehold.co/128x128/7C3AED/FFFFFF?text=Seni'"
                            class="mx-auto rounded-xl mb-3 w-32">
                        <p class="font-bold">Seni</p>
                        <span class="text-sm">Fotografi & Desain</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tombol Navigasi Kanan (Next) -->
        <button id="kategori-next-btn"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 z-10 bg-purple-700/70 hover:bg-purple-700 p-3 rounded-full shadow-lg transition">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

    </div>
    <!-- Akhir Kategori Carousel -->

    <!-- Search & Filter - Ditambahkan ID 'search-section' -->
    <div class="bg-purple-900 p-6 rounded-3xl shadow-xl max-w-6xl mx-auto" id="search-section">
        <div class="flex flex-col md:flex-row items-center gap-4">

            <div class="flex bg-white rounded-full overflow-hidden w-full md:w-1/2">
                <input type="text" placeholder="Cari Judul..." class="px-4 py-2 text-black w-full focus:outline-none">
                <button class="bg-yellow-400 px-4">
                    <i class="fa-solid fa-magnifying-glass text-black"></i>
                </button>
            </div>

            <!-- Tombol Kategori BARU untuk memicu Modal -->
            <button id="open-kategori-modal" class="bg-gray-800 hover:bg-gray-700 px-6 py-2 rounded-xl transition">
                Kategori
            </button>
        </div>

        <!-- List Buku (Diperpanjang menjadi 15 item) -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-10">

            <!-- Baris 1: Buku A - E (5 Buku) -->
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book1.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+A'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku A</p>
                <p class="text-sm text-gray-300">Dari Rp 5.000/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>

            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book2.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+B'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku B</p>
                <p class="text-sm text-gray-300">Dari Rp 6.000/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>

            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book3.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+C'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku C</p>
                <p class="text-sm text-gray-300">Dari Rp 4.000/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>

            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book4.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+D'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku D</p>
                <p class="text-sm text-gray-300">Dari Rp 7.000/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>

            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book5.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+E'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku E</p>
                <p class="text-sm text-gray-300">Dari Rp 8.000/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>

            <!-- Baris 2: Buku F - J (5 Buku) -->
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book6.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/551A8B/FFFFFF?text=Buku+F'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku F</p>
                <p class="text-sm text-gray-300">Dari Rp 5.500/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book7.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/551A8B/FFFFFF?text=Buku+G'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku G</p>
                <p class="text-sm text-gray-300">Dari Rp 6.500/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book8.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/551A8B/FFFFFF?text=Buku+H'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku H</p>
                <p class="text-sm text-gray-300">Dari Rp 4.500/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book9.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/551A8B/FFFFFF?text=Buku+I'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku I</p>
                <p class="text-sm text-gray-300">Dari Rp 7.500/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book10.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/551A8B/FFFFFF?text=Buku+J'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku J</p>
                <p class="text-sm text-gray-300">Dari Rp 8.500/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>

            <!-- Baris 3: Buku K - O (5 Buku) -->
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book11.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+K'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku K</p>
                <p class="text-sm text-gray-300">Dari Rp 6.200/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book12.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+L'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku L</p>
                <p class="text-sm text-gray-300">Dari Rp 7.200/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book13.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+M'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku M</p>
                <p class="text-sm text-gray-300">Dari Rp 5.800/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book14.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+N'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku N</p>
                <p class="text-sm text-gray-300">Dari Rp 8.100/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>
            <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                <img src="img/books/book15.jpg"
                    onerror="this.onerror=null; this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku+O'"
                    class="rounded-xl w-full h-48 object-cover mb-3">
                <p class="font-bold">Judul Buku O</p>
                <p class="text-sm text-gray-300">Dari Rp 9.000/Hari</p>
                <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">Tersedia</button>
            </div>

        </div>

        <!-- Pagination Dummy -->
        <div class="flex justify-center mt-8 space-x-3">
            <button class="px-4 py-2 bg-gray-700 rounded">1</button>
            <button class="px-4 py-2 bg-gray-700 rounded">2</button>
            <button class="px-4 py-2 bg-gray-700 rounded">3</button>
        </div>

    </div>

    <!-- Section WA Bawah -->
    <div class="bg-yellow-400 text-center text-black py-20 mt-16 rounded-xl">
        <h3 class="text-2xl font-bold mb-6">Buat Yang Tanya Lebih Lanjut, Bisa Klik Link Yang Ada Di Bawah Ini</h3>

        <a href="https://wa.me/082232709316"
            class="bg-green-600 hover:bg-green-500 text-white font-semibold py-3 px-6 rounded-full transition">
            Whatsapp Admin
        </a>
    </div>

    </div>

    <!-- MODAL POP-UP KATEGORI (Hidden by default) -->
    <div id="kategori-modal" class="modal-overlay fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="bg-purple-900 rounded-2xl p-6 shadow-2xl w-full max-w-lg mx-4 border-2 border-yellow-400">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-yellow-300">Pilih Kategori Buku</h3>
                <button id="close-kategori-modal" class="text-white hover:text-red-500 transition">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Fiksi</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Ilmiah</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Motivasi</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Komik</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Sejarah</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Anak-anak</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Romantis</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition">Teknologi</a>

            </div>
            <p class="text-center text-sm text-gray-400 mt-4">Pilihan ini akan memfilter daftar buku di bawah.</p>
        </div>
    </div>


    <!-- MODAL POP-UP WAJIB LOGIN/DAFTAR -->
    <div id="login-modal" class="modal-overlay fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="bg-purple-900 rounded-2xl p-8 shadow-2xl w-full max-w-md mx-4 border-2 border-yellow-400 text-center">
            <h3 class="text-2xl font-bold text-yellow-300 mb-4">Akses Terbatas</h3>
            <p class="text-white mb-6">Anda harus **Login** atau **Daftar** untuk mengakses keranjang belanja.</p>

            <div class="flex justify-center space-x-4">
                <a href="daftar"
                    class="bg-yellow-400 hover:bg-yellow-500 text-purple-900 font-semibold py-2 px-4 rounded-full transition flex-1">
                    Daftar
                </a>
                <a href="masuk"
                    class="bg-white hover:bg-gray-200 text-purple-900 font-semibold py-2 px-4 rounded-full transition flex-1">
                    Masuk
                </a>
            </div>
            <button id="close-login-modal" class="text-gray-400 hover:text-white mt-4 text-sm transition">
                Lanjutkan Melihat Buku
            </button>
        </div>
    </div>

    <!-- Script JavaScript untuk Auto Slide Banner, Manual Slide Kategori, dan Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- LOGIKA MAIN BANNER (AUTO SLIDE 3 DETIK) ---
            const mainSliderContainer = document.getElementById('main-slider-container');
            if (mainSliderContainer) {
                const mainSlides = mainSliderContainer.children;
                const totalMainSlides = mainSlides.length;
                let currentMainSlide = 0;
                const mainSlideInterval = 3000; // 3 detik

                function goToMainSlide(index) {
                    if (index < 0) {
                        currentMainSlide = totalMainSlides - 1;
                    } else if (index >= totalMainSlides) {
                        currentMainSlide = 0;
                    } else {
                        currentMainSlide = index;
                    }
                    const offset = -currentMainSlide * 100;
                    mainSliderContainer.style.transform = `translateX(${offset}%)`;
                }

                setInterval(() => goToMainSlide(currentMainSlide + 1), mainSlideInterval);
            }


            // --- LOGIKA KATEGORI SLIDER (MANUAL CLICK) ---
            const kategoriSliderContainer = document.getElementById('kategori-slider-container');
            const prevBtn = document.getElementById('kategori-prev-btn');
            const nextBtn = document.getElementById('kategori-next-btn');

            if (kategoriSliderContainer && prevBtn && nextBtn) {
                const totalKategoriPages = 2;
                let currentKategoriPage = 0;

                function goToKategoriPage(index) {
                    if (index < 0) {
                        currentKategoriPage = totalKategoriPages - 1;
                    } else if (index >= totalKategoriPages) {
                        currentKategoriPage = 0;
                    } else {
                        currentKategoriPage = index;
                    }

                    const offset = -currentKategoriPage * 100;
                    kategoriSliderContainer.style.transform = `translateX(${offset}%)`;
                }

                nextBtn.addEventListener('click', (e) => {
                    e.preventDefault(); // Mencegah scrolling jika ada link #
                    goToKategoriPage(currentKategoriPage + 1);
                });

                prevBtn.addEventListener('click', (e) => {
                    e.preventDefault(); // Mencegah scrolling jika ada link #
                    goToKategoriPage(currentKategoriPage - 1);
                });

                kategoriSliderContainer.style.transition = 'transform 0.5s ease-in-out';
            }


            // --- LOGIKA MODAL KATEGORI ---
            const openKategoriModalBtn = document.getElementById('open-kategori-modal');
            const closeKategoriModalBtn = document.getElementById('close-kategori-modal');
            const kategoriModal = document.getElementById('kategori-modal');

            if (openKategoriModalBtn && closeKategoriModalBtn && kategoriModal) {
                openKategoriModalBtn.addEventListener('click', () => {
                    kategoriModal.classList.remove('hidden');
                });

                closeKategoriModalBtn.addEventListener('click', () => {
                    kategoriModal.classList.add('hidden');
                });

                kategoriModal.addEventListener('click', (e) => {
                    if (e.target === kategoriModal) {
                        kategoriModal.classList.add('hidden');
                    }
                });
            }


            // --- LOGIKA SMOOTH SCROLL SEARCH ---
            const searchIcon = document.getElementById('search-icon');
            const searchSection = document.getElementById('search-section');

            if (searchIcon && searchSection) {
                searchIcon.addEventListener('click', (e) => {
                    e.preventDefault();
                    // Gunakan window.scrollTo dengan behavior: 'smooth'
                    searchSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>

@endsection
