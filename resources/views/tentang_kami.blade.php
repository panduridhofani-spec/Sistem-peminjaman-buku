@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="bg-orange-400 py-[30px] text-center" style="background-color: #f7a94d;">
    <h1 class="text-6xl md:text-8xl font-extrabold text-white tracking-wider" style="color: #4b0082; text-shadow: 3px 3px 5px rgba(0,0,0,0.2);">
        TENTANG KAMI
    </h1>
</div>

<div class="bg-purple-800 py-6 px-4" style="background-color: #4b0082;">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-wrap justify-center gap-4">
            <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
                <img src="/img/tentang_kami1.png" alt="Galeri 1" class="w-full h-full object-cover">
            </div>
            <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
                <img src="/img/tentang_kami2.png" alt="Galeri 2" class="w-full h-full object-cover">
            </div>
            <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
                <img src="/img/tentang_kami3.png" alt="Galeri 3" class="w-full h-full object-cover">
            </div>
            <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
                <img src="/img/tentang_kami4.png" alt="Galeri 4" class="w-full h-full object-cover">
            </div>
            <div class="w-48 h-32 border-4 border-purple-400 overflow-hidden shadow-lg">
                <img src="/img/tentang_kami5.png" alt="Galeri 5" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</div>
<div class="py-16 px-4">
    <div class="max-w-4xl mx-auto">
        <p class="mb-6 leading-relaxed text-lg text-justify font-normal"><span class="font-bold">BukuBareng</span> adalah platform penyewaan buku digital dan fisik yang hadir untuk memudahkan siapa saja menikmati bacaan berkualitas tanpa harus membeli. Kami percaya bahwa membaca bukan hanya hobi, tetapi juga jembatan menuju pengetahuan dan inspirasi.</p>
        <p class="mb-6 leading-relaxed text-lg text-justify font-normal">Sejak berdiri, BukuBareng berkomitmen menghadirkan berbagai jenis buku mulai dari novel fiksi, buku ilmiah, komik, hingga buku motivasi, semuanya dapat disewa dengan mudah dan dikirim langsung ke rumah Anda. Dengan slogan **"Baca Bareng, Berkembang Bareng"**, kami ingin menciptakan budaya membaca yang lebih inklusif, terjangkau, dan menyenangkan bagi semua kalangan — dari pelajar, mahasiswa, hingga pecinta buku di seluruh Indonesia.</p>
        <p class="leading-relaxed text-lg text-justify font-normal">Kami juga terus berinovasi untuk menghadirkan pengalaman membaca yang lebih interaktif melalui sistem peminjaman digital dan komunitas pembaca aktif di platform kami. BukuBareng bukan sekadar tempat menyewa buku, kami adalah teman perjalanan belajar dan imajinasi Anda.</p>
    </div>
</div>
<div class="h-20" style="background-color: #4b0082;"></div>
@endsection