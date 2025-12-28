@extends('layouts.app_after_login')

@section('title', 'dashboard_after_login | BukuBareng')

@section('content')

    <body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

        <!-- Konten Utama -->


        <div class="max-w-3xl mx-auto px-4 ">

            <!-- HEADER NAVIGASI (Sama seperti Ubah Alamat) -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">

                <!-- Kiri: Header Kembali -->
                <!-- Kembali ke Home atau Halaman Sebelumnya -->
                <a href="/dashboard_after_login"
                    class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Keranjang</span>
                </a>

                <!-- Kanan: Grup Ikon Navigasi (Hanya Home) -->
                <div class="flex items-center space-x-4 text-white">


                </div>
            </div>
            <!-- Akhir HEADER NAVIGASI -->


            <!-- KARTU KERANJANG UTAMA -->
            <div class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-yellow-400">

                <!-- KOLOM ALAMAT DAN TOTAL HARGA (SIDEBAR KANAN) -->
                <div class="md:grid md:grid-cols-3 md:gap-8">

                    <!-- Kolom Kiri (Daftar Item) -->
                    <div class="md:col-span-2 space-y-6">

                        <!-- Item 1: Buku Ayo Putus -->
                        <div class="flex items-center bg-purple-800 p-4 rounded-xl shadow-md border border-purple-700">
                            <input type="checkbox" checked
                                class="w-5 h-5 text-yellow-400 bg-purple-900 border-purple-500 rounded focus:ring-yellow-400 mr-4">
                            <img src="img/books/book2.jpg"
                                onerror="this.onerror=null; this.src='https://placehold.co/60x90/551A8B/FFFFFF?text=B1'"
                                alt="Ayo Putus" class="w-16 h-24 object-cover rounded-md flex-shrink-0 mr-4">

                            <div class="flex-grow">
                                <p class="font-semibold text-lg text-yellow-300">Ayo Putus</p>
                                <p class="text-xs text-purple-300 mb-2">24 Okt - 31 Okt (7 hari)</p>
                                <p class="font-bold text-white">Dari Rp 3.500/Hari</p>
                            </div>

                            <div class="flex items-center space-x-2 ml-4 flex-shrink-0">
                                <button class="btn-counter bg-purple-700 hover:bg-purple-600 text-white text-xl">-</button>
                                <input type="text" value="1"
                                    class="w-10 text-center bg-purple-900 border border-purple-600 rounded-lg text-white p-0.5">
                                <button class="btn-counter bg-purple-700 hover:bg-purple-600 text-white text-xl">+</button>
                                <button
                                    class="py-1 px-3 rounded-full bg-red-600 text-white text-sm hover:bg-red-500 transition ml-3">Hapus</button>
                            </div>
                        </div>

                        <!-- Item 2: Buku The Seven Husbands -->
                        <div class="flex items-center bg-purple-800 p-4 rounded-xl shadow-md border border-purple-700">
                            <input type="checkbox" checked
                                class="w-5 h-5 text-yellow-400 bg-purple-900 border-purple-500 rounded focus:ring-yellow-400 mr-4">
                            <img src="img/books/book9.jpg"
                                onerror="this.onerror=null; this.src='https://placehold.co/60x90/551A8B/FFFFFF?text=B2'"
                                alt="The Seven Husbands" class="w-16 h-24 object-cover rounded-md flex-shrink-0 mr-4">

                            <div class="flex-grow">
                                <p class="font-semibold text-lg text-yellow-300">The Seven Husbands of Evelyn Hugo</p>
                                <p class="text-xs text-purple-300 mb-2">24 Okt - 31 Okt (7 hari)</p>
                                <p class="font-bold text-white">Dari Rp 4.000/Hari</p>
                            </div>

                            <div class="flex items-center space-x-2 ml-4 flex-shrink-0">
                                <button class="btn-counter bg-purple-700 hover:bg-purple-600 text-white text-xl">-</button>
                                <input type="text" value="1"
                                    class="w-10 text-center bg-purple-900 border border-purple-600 rounded-lg text-white p-0.5">
                                <button class="btn-counter bg-purple-700 hover:bg-purple-600 text-white text-xl">+</button>
                                <button
                                    class="py-1 px-3 rounded-full bg-red-600 text-white text-sm hover:bg-red-500 transition ml-3">Hapus</button>
                            </div>
                        </div>

                        <!-- Tombol Tambah Buku -->
                        <div class="flex justify-start pt-2">
                            <a href="/dashboard_after_login"
                                class="py-2 px-4 rounded-full font-bold bg-purple-700 hover:bg-purple-600 text-white shadow-lg flex items-center space-x-2">
                                <i class="fa-solid fa-plus text-sm"></i>
                                <span>Tambah Buku</span>
                            </a>
                        </div>
                    </div>

                    <!-- Kolom Kanan (Ringkasan & Checkout) -->
                    <div
                        class="md:col-span-1 mt-8 md:mt-0 bg-purple-800 p-4 rounded-xl shadow-lg border border-purple-700 h-max">

                        <!-- Alamat Pengiriman -->
                        <div class="mb-4">
                            <p class="text-sm text-purple-300 mb-1">Dikirim ke:</p>
                            <div class="flex justify-between items-center">
                                <p class="font-semibold text-yellow-400">Alamat Utama</p>
                                <a href="/daftar_alamat_keranjang"
                                    class="bg-yellow-400 text-purple-900 text-sm font-bold py-1 px-3 rounded-full hover:bg-yellow-300 transition">
                                    Ubah
                                </a>
                            </div>
                            <p class="text-xs text-white mt-1">Jl. Kenanga No. 45, Klojen, Malang (0821xxxxxx)</p>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-purple-700 my-4"></div>

                        <!-- Total Biaya -->
                        <div class="flex justify-between items-center text-xl font-bold mb-6">
                            <p>Total Sewa Barang</p>
                            <p class="text-yellow-400">Rp 28.000</p>
                        </div>

                        <!-- Tombol Pinjam - DIUBAH MENJADI LINK CHECKOUT -->
                        <a href="/checkout"
                            class="w-full py-3 rounded-full font-extrabold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition shadow-lg transform hover:scale-[1.01] inline-block text-center">
                            Pinjam
                        </a>

                    </div>
                </div>

            </div>
            <!-- Akhir KARTU KERANJANG UTAMA -->

        </div>
        </div>
    </body>
@endsection