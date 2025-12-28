@extends('layouts.app')

@section('title', 'Atur Password Baru | BukuBareng')

@section('content')

    <div class="pt-10 px-6 md:px-12 lg:px-20">

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

        <h2 class="text-center text-[60px] font-bold text-yellow-300 mb-10">Welcome To BukuBareng</h2>

        <div class="bg-purple-900 p-6 rounded-3xl shadow-xl max-w-5xl mx-auto mb-12 relative">

            <!-- Tombol Navigasi Kiri (Previous) -->
            <button id="kategori-prev-btn"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 z-10 bg-purple-700/70 hover:bg-purple-700 p-3 rounded-full shadow-lg transition">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <!-- Kontainer Utama Slider Kategori -->
            <div class="overflow-hidden mx-8">
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

        <div class="bg-purple-900 p-6 rounded-3xl shadow-xl max-w-6xl mx-auto scroll-mt-32" id="search-section">
            {{-- search bar --}}
            <div class="flex flex-col md:flex-row items-center gap-4">

                <div class="flex bg-white rounded-full overflow-hidden w-full md:w-1/2">
                    <input type="text" placeholder="Cari Judul..."
                        class="px-4 py-2 text-black w-full focus:outline-none">
                    <button class="bg-yellow-400 px-4">
                        <i class="fa-solid fa-magnifying-glass text-black"></i>
                    </button>
                </div>

                <button id="open-kategori-modal" class="bg-gray-800 hover:bg-gray-700 px-6 py-2 rounded-xl transition">
                    Kategori
                </button>
            </div>

            {{-- item Buku Tersedia --}}
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-10">
                @foreach ($data['data'] as $item)
                    <div class="bg-purple-800 p-4 rounded-2xl shadow-xl flex flex-col">

                        {{-- Wrapper gambar dengan tinggi tetap --}}
                        <div
                            class="w-full h-48 mb-3 rounded-xl overflow-hidden bg-purple-700 flex items-center justify-center">
                            @if (!empty($item['gambar']))
                                <img src="{{ asset('uploads/buku/' . $item['gambar']) }}" alt="{{ $item['judul'] }}"
                                    class="w-full h-full object-cover">
                            @else
                                <span class="text-sm text-gray-300">Tidak ada gambar</span>
                            @endif
                        </div>

                        {{-- Judul --}}
                        <p class="font-bold text-center text-white line-clamp-2">
                            {{ $item['judul'] }}
                        </p>

                        {{-- Spacer agar tombol selalu di bawah --}}
                        <div class="flex-grow"></div>

                        {{-- Status --}}
                        @if ($item['stok'] > 0)
                            <button class="bg-yellow-400 text-black rounded-full w-full py-2 mt-3 font-semibold">
                                Tersedia
                            </button>
                        @else
                            <button class="bg-gray-500 text-white rounded-full w-full py-2 mt-3 font-semibold" disabled>
                                Tidak Tersedia
                            </button>
                        @endif

                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8 caret-transparent select-none">
                @if ($data['links'])
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex items-center-space-x-px">
                            @foreach ($data['links'] as $item)
                                <li class="mx-1 list-none">
                                    <a href="{{ $item['url2'] }}#search-section" 
                                    class="{{ $item['active'] ? 'bg-yellow-400 text-purple-900' : 'bg-gray-700 text-white hover:bg-gray-600' }} 
                                            block px-4 py-2 rounded select-none cursor-pointer transition-colors">
                                        {!! str_replace(['&laquo;', '&raquo;', '«', '»'], '', $item['label']) !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                @endif
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
@endsection
