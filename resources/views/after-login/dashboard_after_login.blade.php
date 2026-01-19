@extends('layouts.app-login')

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
                <input id="search-input" type="text" placeholder="Cari Judul..."
                    class="px-4 py-2 text-black w-full focus:outline-none">

                <button id="search-btn" class="bg-yellow-400 px-4">
                    <i class="fa-solid fa-magnifying-glass text-black"></i>
                </button>

            </div>

            <!-- Tombol Kategori BARU untuk memicu Modal -->
            <button id="open-kategori-modal" class="bg-gray-800 hover:bg-gray-700 px-6 py-2 rounded-xl transition">
                Kategori
            </button>
        </div>

        <!-- List Buku (Diperpanjang menjadi 15 item) -->
        <div id="book-list" class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-10">
            <!-- Buku dari API akan muncul di sini -->
        </div>



        <!-- Pagination Dummy -->
        <!-- Pagination dari API -->
        <div id="pagination" class="flex justify-center mt-8 space-x-2"></div>


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
        <div id="kategori-modal-content"
            class="bg-purple-900 rounded-2xl p-6 shadow-2xl w-full max-w-lg mx-4 border-2 border-yellow-400">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-yellow-300">Pilih Kategori Buku</h3>
                <button id="close-kategori-modal" class="text-white hover:text-red-500 transition">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <!--
                                                                                         TAMBAHAN TOMBOL 'ALL'
                                                                                         Menggunakan col-span-2 agar tombol ini memanjang penuh di baris pertama
                                                                                         (seolah-olah berada di tengah atas).
                                                                                    -->
                <a href="#"
                    class="col-span-2 bg-yellow-400 text-purple-900 p-3 rounded-xl text-center font-bold hover:bg-yellow-300 transition kategori-btn"
                    data-kategori="ALL">
                    ALL
                </a>

                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Fiksi">Fiksi</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Ilmiah">Ilmiah</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Motivasi">Motivasi</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Komik & Grafis">Komik</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Sejarah">Sejarah</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Anak-anak">Anak-anak</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Romantis">Romantis</a>
                <a href="#"
                    class="bg-purple-800 p-3 rounded-xl text-center font-medium hover:bg-purple-700 transition kategori-btn"
                    data-kategori="Teknologi">Teknologi</a>


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
                <a href="register"
                    class="bg-yellow-400 hover:bg-yellow-500 text-purple-900 font-semibold py-2 px-4 rounded-full transition flex-1">
                    Register
                </a>
                <a href="login"
                    class="bg-white hover:bg-gray-200 text-purple-900 font-semibold py-2 px-4 rounded-full transition flex-1">
                    Login
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

            /* ===============================
            🔹 API HELPER (PUBLIC)
            =============================== */
            function api(url) {
                return fetch('/api' + url, {
                    headers: {
                        'Accept': 'application/json'
                    }
                }).then(res => res.json());
            }

            /* ===============================
            🔹 FUNGSI SMOOTH SCROL TO BOOKLIST
            =============================== */
            function scrollToBookList() {
                const section = document.getElementById('search-section');
                if (section) {
                    section.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }



            /* ===============================
            📚 FETCH BUKU
            =============================== */
            const bookList = document.getElementById('book-list');
            const pagination = document.getElementById('pagination');
            const kategoriModal = document.getElementById('kategori-modal');

            /* ===============================
            ❌ TUTUP MODAL KATEGORI SAAT KLIK LUAR AREA
            =============================== */
            kategoriModal.addEventListener('click', () => {
                kategoriModal.classList.add('hidden');
            });

            /* ===============================
            🛑 CEGAH MODAL TERTUTUP SAAT KLIK DI DALAM BOX
            =============================== */
            document.getElementById('kategori-modal-content')
                .addEventListener('click', e => e.stopPropagation());


            let currentPage = 1;
            let currentKategori = 'ALL';
            let currentSearch = '';




            function loadBooks(page = 1, kategori = 'ALL', search = '') {

                let url = `/buku?page=${page}`;

                if (kategori !== 'ALL') {
                    url += `&kategori=${encodeURIComponent(kategori)}`;
                }

                if (search) {
                    url += `&search=${encodeURIComponent(search)}`;
                }

                api(url).then(res => {

                    const books = res.data.data;

                    bookList.innerHTML = '';

                    if (!books || books.length === 0) {
                        bookList.innerHTML =
                            '<p class="col-span-5 text-center text-gray-300">Tidak ada buku.</p>';
                        pagination.innerHTML = '';
                        return;
                    }

                    books.forEach(book => {

                        const img = book.gambar ?
                            `/uploads/buku/${book.gambar}` :
                            'https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku';

                        bookList.innerHTML += `
                    <div class="bg-purple-800 p-4 rounded-2xl shadow-xl">
                        <img src="${img}"
                            class="rounded-xl w-full h-48 object-cover mb-3"
                            onerror="this.onerror=null;this.src='https://placehold.co/150x240/7C3AED/FFFFFF?text=Buku'">

                        <p class="font-bold truncate">${book.judul}</p>

                        <p class="text-sm text-gray-300">
                            Rp ${Number(book.harga).toLocaleString('id-ID')}
                        </p>

                        <button
                            onclick="lihatDetail(${book.id_buku})"
                            class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">
                            Lihat
                        </button>
                    </div>
                    `;
                    });

                    renderPagination(res.data);


                }).catch(err => {
                    console.error(err);
                    bookList.innerHTML =
                        '<p class="col-span-5 text-center text-red-400">Gagal load buku.</p>';
                });
            }

            /* ===============================
            🔹 FUNGSI PANIGATION
            =============================== */

            function renderPagination(paginationData) {

                pagination.innerHTML = '';

                // NORMALISASI DATA LARAVEL
                const current = paginationData.current_page;
                const last = paginationData.last_page;

                if (!current || !last || last <= 1) {
                    return;
                }

                /* ===== PREV ===== */
                if (current > 1) {
                    pagination.innerHTML += `
            <button
                onclick="changePage(${current - 1})"
                class="px-3 py-1 bg-gray-700 rounded hover:bg-gray-600">
                Prev
            </button>
        `;
                }

                /* ===== NUMBER ===== */
                for (let i = 1; i <= last; i++) {

                    // BATASI JUMLAH TOMBOL (UX)
                    if (
                        i === 1 ||
                        i === last ||
                        (i >= current - 2 && i <= current + 2)
                    ) {
                        pagination.innerHTML += `
                <button
                    onclick="changePage(${i})"
                    class="px-3 py-1 rounded
                    ${i === current ? 'bg-yellow-400 text-black' : 'bg-gray-700 hover:bg-gray-600'}">
                    ${i}
                </button>
            `;
                    }
                }

                /* ===== NEXT ===== */
                if (current < last) {
                    pagination.innerHTML += `
            <button
                onclick="changePage(${current + 1})"
                class="px-3 py-1 bg-gray-700 rounded hover:bg-gray-600">
                Next
            </button>
        `;
                }
            }




            window.changePage = function(p) {
                currentPage = p;
                loadBooks(p, currentKategori, currentSearch);
                smoothScrollAfterSearch();
            }

            window.lihatDetail = function(id) {
                window.location.href = '/buku-after-login/' + id;
            }



            loadBooks();

            /* ===============================
               PATCH SEARCH SCROLL (AMAN)
            =============================== */
            function smoothScrollAfterSearch() {
                setTimeout(() => {
                    const section = document.getElementById('search-section');
                    if (!section) return;

                    const offset = -120; // navbar height
                    const y = section.getBoundingClientRect().top + window.pageYOffset + offset;

                    window.scrollTo({
                        top: y,
                        behavior: 'smooth'
                    });
                }, 300);
            }

            /* ===============================
            🔍 NAVBAR SEARCH ICON (FINAL FIX)
            =============================== */
            const navbarSearchIcon = document.getElementById('search-icon');

            if (navbarSearchIcon) {
                navbarSearchIcon.addEventListener('click', function(e) {
                    e.preventDefault(); // 🔥 cegah lompat default anchor

                    const section = document.getElementById('search-section');
                    if (!section) return;

                    const offset = -120; // tinggi navbar
                    const y = section.getBoundingClientRect().top + window.pageYOffset + offset;

                    window.scrollTo({
                        top: y,
                        behavior: 'smooth'
                    });
                });
            }


            /* ===============================
            🔍 SEARCH
            =============================== */
            document.getElementById('search-btn').onclick = () => {
                currentSearch = document.getElementById('search-input').value.trim();
                currentKategori = 'ALL';
                currentPage = 1;

                loadBooks(1, currentKategori, currentSearch);

                // 🔥 PATCH FINAL (ganti scroll lama)
                smoothScrollAfterSearch();
            };


            /* ===============================
            📂 BUKA MODAL KATEGORI
            =============================== */
            const openKategoriBtn = document.getElementById('open-kategori-modal');

            if (openKategoriBtn) {
                openKategoriBtn.addEventListener('click', function() {
                    kategoriModal.classList.remove('hidden');
                });
            }


            /* ===============================
            🗂 FILTER KATEGORI (FINAL FIX)
            =============================== */
            document.querySelectorAll('.kategori-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const kategori = this.dataset.kategori;

                    currentKategori = kategori;
                    currentSearch = '';
                    currentPage = 1;

                    loadBooks(1, currentKategori, '');

                    kategoriModal.classList.add('hidden');
                });
            });



            /* ===============================
            🎞 SLIDER
            =============================== */
            const mainSlider = document.getElementById('main-slider-container');
            if (mainSlider) {
                let currentIndex = 0;
                const totalSlides = mainSlider.children.length;

                setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    mainSlider.style.transform = `translateX(-${currentIndex * 100}%)`;
                }, 3000);
            }


            /* ===============================
            🎠 SLIDER KATEGORI (MANUAL)
            =============================== */
            const kategoriSlider = document.getElementById('kategori-slider-container');
            const prevBtn = document.getElementById('kategori-prev-btn');
            const nextBtn = document.getElementById('kategori-next-btn');

            if (kategoriSlider && prevBtn && nextBtn) {

                let kategoriIndex = 0;
                const totalPages = kategoriSlider.children.length;

                function updateKategoriSlider() {
                    kategoriSlider.style.transform =
                        `translateX(-${kategoriIndex * 100}%)`;
                }

                nextBtn.addEventListener('click', () => {
                    kategoriIndex = (kategoriIndex + 1) % totalPages;
                    updateKategoriSlider();
                });

                prevBtn.addEventListener('click', () => {
                    kategoriIndex =
                        (kategoriIndex - 1 + totalPages) % totalPages;
                    updateKategoriSlider();
                });
            }





            /* ===============================
            🛒 KERANJANG (WAJIB LOGIN)
            =============================== */
            const bagIcon = document.getElementById('bag-shopping-icon');
            const loginModal = document.getElementById('login-modal');
            const loginModalContent = document.getElementById('login-modal-content');
            const closeLoginModalBtn = document.getElementById('close-login-modal');

            /* ===============================
               🛒 BUKA MODAL SAAT KLIK KERANJANG
            =============================== */
            if (bagIcon) {
                bagIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    loginModal.classList.remove('hidden');
                });
            }

            /* ===============================
               ❌ TUTUP MODAL SAAT KLIK LUAR AREA
            =============================== */
            loginModal.addEventListener('click', function() {
                loginModal.classList.add('hidden');
            });

            /* ===============================
               🛑 CEGAH MODAL TERTUTUP SAAT KLIK DI DALAM BOX
            =============================== */
            loginModalContent.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            /* ===============================
               🔙 TUTUP MODAL DARI TOMBOL "LANJUTKAN MELIHAT BUKU"
            =============================== */
            closeLoginModalBtn.addEventListener('click', function() {
                loginModal.classList.add('hidden');
            });


        });
    </script>




@endsection
