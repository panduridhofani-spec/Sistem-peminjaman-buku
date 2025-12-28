@extends('layouts.tentang_kita')

@section('title', 'Tentang Kami')

@section('content')

<!-- Header Banner TENTANG KAMI - Disesuaikan: pt-40 diubah menjadi pt-20 agar naik ke atas -->
<div class="pt-20 pb-16 bg-orange-400" style="background-color: #f7a94d;">
    <div class="text-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-7xl md:text-8xl font-black uppercase tracking-widest" 
            style="color: #4b0082; text-shadow: 4px 4px 6px rgba(0,0,0,0.3);">
            TENTANG KAMI
        </h1>
        <p class="mt-4 text-xl font-medium text-purple-900" style="color: #4b0082;">
            Baca Bareng, Berkembang Bareng
        </p>
    </div>
</div>

<!-- Galeri (Horizontal Scrollable) -->
<div class="bg-purple-900 py-8 shadow-inner" style="background-color: #4b0082;">
    <div class="max-w-7xl mx-auto overflow-x-auto whitespace-nowrap px-4 md:px-6">
        <div class="flex space-x-4 pb-2">
            
            <!-- Item Galeri 1 -->
            <div class="flex-shrink-0 w-64 h-40 border-4 border-yellow-300 rounded-lg overflow-hidden shadow-xl transform hover:scale-[1.02] transition duration-300 cursor-pointer">
                <img src="/img/tentang_kami1.png" onerror="this.onerror=null; this.src='https://placehold.co/600x400/8A2BE2/FFFFFF?text=Galeri+1'" alt="Galeri 1" class="w-full h-full object-cover">
            </div>
            <!-- Item Galeri 2 -->
            <div class="flex-shrink-0 w-64 h-40 border-4 border-yellow-300 rounded-lg overflow-hidden shadow-xl transform hover:scale-[1.02] transition duration-300 cursor-pointer">
                <img src="/img/tentang_kami2.png" onerror="this.onerror=null; this.src='https://placehold.co/600x400/8A2BE2/FFFFFF?text=Galeri+2'" alt="Galeri 2" class="w-full h-full object-cover">
            </div>
            <!-- Item Galeri 3 -->
            <div class="flex-shrink-0 w-64 h-40 border-4 border-yellow-300 rounded-lg overflow-hidden shadow-xl transform hover:scale-[1.02] transition duration-300 cursor-pointer">
                <img src="/img/tentang_kami3.png" onerror="this.onerror=null; this.src='https://placehold.co/600x400/8A2BE2/FFFFFF?text=Galeri+3'" alt="Galeri 3" class="w-full h-full object-cover">
            </div>
            <!-- Item Galeri 4 -->
            <div class="flex-shrink-0 w-64 h-40 border-4 border-yellow-300 rounded-lg overflow-hidden shadow-xl transform hover:scale-[1.02] transition duration-300 cursor-pointer">
                <img src="/img/tentang_kami4.png" onerror="this.onerror=null; this.src='https://placehold.co/600x400/8A2BE2/FFFFFF?text=Galeri+4'" alt="Galeri 4" class="w-full h-full object-cover">
            </div>
            <!-- Item Galeri 5 -->
            <div class="flex-shrink-0 w-64 h-40 border-4 border-yellow-300 rounded-lg overflow-hidden shadow-xl transform hover:scale-[1.02] transition duration-300 cursor-pointer">
                <img src="/img/tentang_kami5.png" onerror="this.onerror=null; this.src='https://placehold.co/600x400/8A2BE2/FFFFFF?text=Galeri+5'" alt="Galeri 5" class="w-full h-full object-cover">
            </div>
            
            <!-- Item Galeri ke-6 telah dihapus -->

        </div>
    </div>
</div>

<!-- Konten Utama -->
<div class="py-16 px-4 bg-white text-gray-800">
    <div class="max-w-4xl mx-auto p-6 md:p-10 bg-gray-50 rounded-xl shadow-2xl border-t-8 border-purple-800">

        <p class="mb-6 leading-relaxed text-lg text-justify font-normal">
            <span class="font-black text-2xl text-purple-800 block mb-2">
                Selamat datang di BukuBareng!
            </span>
            <span class="font-bold text-purple-800">BukuBareng</span> adalah platform penyewaan buku digital dan fisik yang hadir untuk memudahkan siapa saja menikmati bacaan berkualitas tanpa harus membeli. Kami percaya bahwa membaca bukan hanya hobi, tetapi juga jembatan menuju pengetahuan dan inspirasi.
        </p>

        <p class="mb-6 leading-relaxed text-lg text-justify font-normal border-l-4 border-orange-400 pl-4">
            Sejak berdiri, BukuBareng berkomitmen menghadirkan berbagai jenis buku mulai dari novel fiksi, buku ilmiah, komik, hingga buku motivasi, semuanya dapat disewa dengan mudah dan dikirim langsung ke rumah Anda. Dengan slogan **"Baca Bareng, Berkembang Bareng"**, kami ingin menciptakan budaya membaca yang lebih inklusif, terjangkau, dan menyenangkan bagi semua kalangan — dari pelajar, mahasiswa, hingga pecinta buku di seluruh Indonesia.
        </p>
        
        <p class="leading-relaxed text-lg text-justify font-normal">
            Kami juga terus berinovasi untuk menghadirkan pengalaman membaca yang lebih interaktif melalui sistem peminjaman digital dan komunitas pembaca aktif di platform kami. BukuBareng bukan sekadar tempat menyewa buku, kami adalah teman perjalanan belajar dan imajinasi Anda.
        </p>
        
        <!-- Poin Misi/Nilai Tambahan -->
        <h3 class="text-2xl font-bold text-orange-400 mt-10 mb-4 border-b pb-2 border-gray-300">
            Nilai Kami
        </h3>
        <ul class="list-disc list-inside space-y-2 text-lg text-gray-700">
            <li><span class="font-semibold text-purple-800">Aksesibilitas:</span> Membuat buku berkualitas dapat diakses oleh semua orang.</li>
            <li><span class="font-semibold text-purple-800">Inovasi:</span> Terus mengembangkan platform digital dan layanan pengiriman.</li>
            <li><span class="font-semibold text-purple-800">Komunitas:</span> Membangun jaringan pembaca yang saling mendukung.</li>
        </ul>
        
    </div>
</div>

<!-- Space Kosong untuk menjaga margin bawah -->
<div class="h-10 bg-white"></div>
@endsection