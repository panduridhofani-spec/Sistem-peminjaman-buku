@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="bg-[#6500B8] min-h-screen text-center">
    
    {{-- === HERO SECTION / CAROUSEL === --}}
    <div class="flex justify-center pt-10">
        <div class="w-[90%] md:w-[70%] rounded-2xl overflow-hidden shadow-lg relative" 
            data-hs-carousel='{
                "loadingClasses": "opacity-0",
                "isAutoPlay": true,
                "interval": 3000
            }'>
            
            <div class="hs-carousel relative overflow-hidden rounded-2xl">
                <div class="hs-carousel-body flex transition-transform duration-700 ease-in-out">
                    
                    <div class="hs-carousel-slide flex-shrink-0 w-full">
                        <img src="{{ asset('img/carousel/slide1.png') }}" 
                            alt="Slide 1" 
                            class="w-full h-64 md:h-80 object-cover rounded-2xl">
                    </div>

                    <div class="hs-carousel-slide flex-shrink-0 w-full">
                        <img src="{{ asset('img/carousel/slide2.png') }}" 
                            alt="Slide 2" 
                            class="w-full h-64 md:h-80 object-cover rounded-2xl">
                    </div>

                    <div class="hs-carousel-slide flex-shrink-0 w-full">
                        <img src="{{ asset('img/carousel/slide3.png') }}" 
                            alt="Slide 3" 
                            class="w-full h-64 md:h-80 object-cover rounded-2xl">
                    </div>

                </div>
            </div>

            {{-- Tombol navigasi kiri-kanan --}}
            <button type="button" 
                    class="hs-carousel-prev absolute left-2 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-purple-900 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button type="button" 
                    class="hs-carousel-next absolute right-2 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-purple-900 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M9 5l7 7-7 7" />
                </svg>
            </button>

            {{-- Titik navigasi --}}
            <div class="hs-carousel-pagination flex justify-center gap-2 absolute bottom-3 left-0 right-0">
            </div>
        </div>
    </div>


    {{-- === TITLE === --}}
    <h1 class="text-3xl md:text-4xl font-bold text-white mt-8">Welcome To BukuBareng</h1>

    {{-- === KATEGORI === --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 px-6 md:px-16 mt-10">
        <div class="bg-[#8E6CFD] rounded-2xl p-5 shadow-md">
            <img src="{{ asset('images/icon/novel.png') }}" alt="Fiksi" class="mx-auto w-16 h-16">
            <p class="mt-3 text-white font-semibold">Novel & Cerpen</p>
        </div>

        <div class="bg-[#4FC3F7] rounded-2xl p-5 shadow-md">
            <img src="{{ asset('images/icon/ilmiah.png') }}" alt="Ilmiah" class="mx-auto w-16 h-16">
            <p class="mt-3 text-white font-semibold">Pengetahuan & Sains</p>
        </div>

        <div class="bg-[#FFD54F] rounded-2xl p-5 shadow-md">
            <img src="{{ asset('images/icon/motivasi.png') }}" alt="Motivasi" class="mx-auto w-16 h-16">
            <p class="mt-3 text-white font-semibold">Pengembangan Diri & Inspirasi</p>
        </div>

        <div class="bg-[#CE93D8] rounded-2xl p-5 shadow-md">
            <img src="{{ asset('images/icon/komik.png') }}" alt="Komik" class="mx-auto w-16 h-16">
            <p class="mt-3 text-white font-semibold">Cerita Bergambar & Manga</p>
        </div>
    </div>

    {{-- === DAFTAR BUKU === --}}
    <div class="px-4 md:px-16 mt-10">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach(range(1,10) as $buku)
            <div class="bg-[#8D69E6]/60 rounded-xl shadow-lg p-3 hover:scale-105 transition">
                <img src="{{ asset('images/books/book'.$buku.'.jpg') }}" alt="Buku {{ $buku }}" class="w-full h-48 object-cover rounded-md">
                <h3 class="mt-2 text-white font-semibold">Judul Buku {{ $buku }}</h3>
                <p class="text-sm text-gray-200">Penulis {{ $buku }}</p>
                <button class="mt-2 bg-[#FFC400] text-[#4B0082] font-semibold py-1 px-3 rounded-md">Sewa Buku</button>
            </div>
            @endforeach
        </div>

        {{-- === PAGINATION === --}}
        <div class="flex justify-center mt-8">
            <ul class="flex gap-1 text-gray-200">
                <li><a href="#" class="px-3 py-1 bg-[#A493FA] rounded-md">1</a></li>
                <li><a href="#" class="px-3 py-1 hover:bg-[#A493FA] rounded-md">2</a></li>
                <li><a href="#" class="px-3 py-1 hover:bg-[#A493FA] rounded-md">3</a></li>
            </ul>
        </div>
    </div>

    {{-- === FOOTER === --}}
    <div class="bg-[#FFC400] w-full mt-14 py-10">
        <p class="text-lg font-semibold text-[#4B0082]">
            Buat Yang Tanya Lebih Lanjut, Bisa Klik Link Yang Ada Di Bawah Ini Cuy
        </p>
        <a href="https://wa.me/6282232799316" target="_blank" 
           class="inline-block mt-4 bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-full">
           WhatsApp Admin
        </a>
    </div>
</div>
@endsection
