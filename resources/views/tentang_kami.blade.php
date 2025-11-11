<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link href="./path/to/your/tailwind.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="bg-purple-800 p-4 fixed top-0 w-full z-10 shadow-lg" style="background-color: #551A8B;">
    <div class="flex items-center justify-between mx-auto px-4 md:px-8">
        
        <a href="#" class="flex items-center space-x-2">
            <div class="w-14 h-14 rounded-full bg-blue-300 flex items-center justify-center">
    <img src="img/logo.png" alt="Logo" class="w-full h-full object-cover rounded-full"> 
</div>
        </a>

        <div class="flex items-center space-x-6"> 
            <div class="hidden md:flex space-x-8 text-white text-lg font-medium">
    <a href="/" class="hover:text-gray-300">Home</a>
    <a href="/tentang_kami" class="hover:text-gray-300">Tentang Kami</a>
    <a href="/daftar" class="hover:text-gray-300">Daftar</a>
    <a href="/masuk" class="hover:text-gray-300">Masuk</a>
</div>

            <div class="hidden md:flex items-center space-x-6"> 
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fa-solid fa-magnifying-glass text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fa-solid fa-bag-shopping text-xl"></i>
                </a>
            </div>

            <a href="https://wa.me/nomoradmin" 
               class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out">
                Whatsapp Admin
            </a>
        </div>

    </div>
</nav>
    
<main class="min-h-screen"> 

    {{-- 1. BAGIAN HEADER ORANGE (KUNCI: mt-[100px] untuk menempel di bawah navbar fixed) --}}
    <div class="mt-[100px] bg-orange-400 py-16 px-4 md:px-8 text-center" style="background-color: #f7a94d;">
        <h1 class="text-6xl md:text-8xl font-extrabold text-white tracking-wider" style="color: #4b0082; text-shadow: 3px 3px 5px rgba(0,0,0,0.2);">
            TENTANG KAMI
        </h1>
    </div>

    {{-- 2. BAGIAN GALERI GAMBAR (KUNCI: max-w-7xl mx-auto untuk membatasi lebar) --}}
    <div class="bg-purple-800 py-6 px-4" style="background-color: #4b0082;">
        {{-- CONTAINER INI MEMBATASI LEBAR KONTEN GALERI DI TENGAH --}}
        <div class="max-w-7xl mx-auto"> 
            <div class="flex flex-wrap justify-center gap-4">
    
    {{-- Gambar 1: /img/tentang_kami1.png --}}
    <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
        <img src="/img/tentang_kami1.png" alt="Galeri 1" class="w-full h-full object-cover">
    </div>
    
    {{-- Gambar 2: /img/tentang_kami2.png --}}
    <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
        <img src="/img/tentang_kami2.png" alt="Galeri 2" class="w-full h-full object-cover">
    </div>
    
    {{-- Gambar 3: /img/tentang_kami3.png --}}
    <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
        <img src="/img/tentang_kami3.png" alt="Galeri 3" class="w-full h-full object-cover">
    </div>
    
    {{-- Gambar 4: /img/tentang_kami4.png --}}
    <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
        <img src="/img/tentang_kami4.png" alt="Galeri 4" class="w-full h-full object-cover">
    </div>

    {{-- Gambar 5: /img/tentang_kami5.png --}}
    <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
        <img src="/img/tentang_kami5.png" alt="Galeri 5" class="w-full h-full object-cover">
    </div>

</div>
        </div>
    </div>

    {{-- Bagian Isi Paragraf --}}
    <div class="py-16 px-4"> 
        <div class="max-w-4xl mx-auto"> 
            
            <p class="mb-6 leading-relaxed text-lg text-justify font-normal"><span class="font-bold">BukuBareng</span> adalah platform penyewaan buku digital dan fisik yang hadir untuk memudahkan siapa saja menikmati bacaan berkualitas tanpa harus membeli. Kami percaya bahwa membaca bukan hanya hobi, tetapi juga jembatan menuju pengetahuan dan inspirasi.</p>

            <p class="mb-6 leading-relaxed text-lg text-justify font-normal">Sejak berdiri, BukuBareng berkomitmen menghadirkan berbagai jenis buku mulai dari novel fiksi, buku ilmiah, komik, hingga buku motivasi, semuanya dapat disewa dengan mudah dan dikirim langsung ke rumah Anda. Dengan slogan **"Baca Bareng, Berkembang Bareng"**, kami ingin menciptakan budaya membaca yang lebih inklusif, terjangkau, dan menyenangkan bagi semua kalangan — dari pelajar, mahasiswa, hingga pecinta buku di seluruh Indonesia.</p>

            <p class="leading-relaxed text-lg text-justify font-normal">Kami juga terus berinovasi untuk menghadirkan pengalaman membaca yang lebih interaktif melalui sistem peminjaman digital dan komunitas pembaca aktif di platform kami. BukuBareng bukan sekadar tempat menyewa buku, kami adalah teman perjalanan belajar dan imajinasi Anda.</p>
        </div>    </div>
    
    {{-- Footer Ungu Gelap --}}
    <div class="h-20" style="background-color: #4b0082;"></div>

</main>

</body>
</html>