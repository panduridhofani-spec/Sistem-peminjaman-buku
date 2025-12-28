<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | BukuBareng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* CSS untuk memastikan transisi banner dan kategori halus */
        #main-slider-container, #kategori-slider-container {
            transition: transform 1s ease-in-out;
        }
        /* Style untuk Modal agar overlay menutupi seluruh layar */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 text-white min-h-screen">

    @include('partials.navbar')

    <main class="pt-[88px]">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
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

            // --- LOGIKA MODAL LOGIN/DAFTAR (UNTUK KERANJANG) ---
            const bagShoppingIcon = document.getElementById('bag-shopping-icon');
            const loginModal = document.getElementById('login-modal');
            const closeLoginModalBtn = document.getElementById('close-login-modal');

            if (bagShoppingIcon && loginModal && closeLoginModalBtn) {
                bagShoppingIcon.addEventListener('click', (e) => {
                    e.preventDefault(); // Mencegah navigasi ke '#'
                    loginModal.classList.remove('hidden');
                });

                closeLoginModalBtn.addEventListener('click', () => {
                    loginModal.classList.add('hidden');
                });

                loginModal.addEventListener('click', (e) => {
                    if (e.target === loginModal) {
                        loginModal.classList.add('hidden');
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
                    searchSection.scrollIntoView({ behavior: 'smooth' });
                });
            }
        });
    </script>

    @include('partials.footer')


</body>
</html>
