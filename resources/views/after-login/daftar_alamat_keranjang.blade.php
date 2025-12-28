<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alamat | BukuBareng</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <!-- Konten Utama -->
    <div class="pt-12 px-4 md:px-12">

        <div class="max-w-xl mx-auto p-8">

            <!-- HEADER NAVIGASI (Sama seperti Ubah Profil) -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">

                <!-- Kiri: Header Kembali -->
                <a href="/keranjang" class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Daftar Alamat</span>
                </a>

                <!-- Kanan: Grup Ikon Navigasi (Keranjang dan Home) -->
                <div class="flex items-center space-x-4 text-white">

                    <!-- Ikon Keranjang Belanja -->
                    <a href="/keranjang" class="hover:text-yellow-400 transition">
                        <i class="fa-solid fa-bag-shopping text-xl"></i>
                    </a>

                    <!-- Kembali ke Home Link -->
                    <a href="/dashboard_after_login"
                        class="hover:text-yellow-400 transition flex items-center space-x-2">
                        <i class="fa-solid fa-home text-xl"></i>
                    </a>
                </div>
            </div>
            <!-- Akhir HEADER NAVIGASI -->


            <!-- KARTU DAFTAR ALAMAT -->
            <div
                class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-yellow-400">

                <!-- Tombol Tambah Alamat - Menggunakan <a> dengan href="/tambah_alamat" -->
                <a href="/tambah_alamat_keranjang"
                    class="py-2 px-4 rounded-full font-bold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition shadow-lg mb-6 flex items-center space-x-2 w-max">
                    <i class="fa-solid fa-plus text-sm"></i>
                    <span>Tambah Alamat</span>
                </a>

                <!-- Daftar Alamat (Item 1) -->
                <div class="bg-purple-800 p-4 rounded-lg shadow-md mb-4 border border-yellow-400">
                    <div class="flex justify-between items-start mb-2">
                        <p class="font-bold text-yellow-300">Alamat Utama</p>
                        <div class="text-sm text-purple-300 italic">(Default)</div>
                    </div>
                    <p class="text-white mb-2">
                        Fany Shandy Agastya (0821xxxxxx)<br>
                        Jl. Kenanga No. 45, Kel. Mawar, Kec. Tulip, Kota Jakarta Pusat, 10520.
                    </p>
                    <div class="flex space-x-3 text-sm mt-3">
                        <a href="/edit_alamat" class="text-yellow-400 hover:text-yellow-300 font-semibold">Ubah</a>
                        <span class="text-purple-500">|</span>
                        <a href="#" class="text-red-400 hover:text-red-300 font-semibold">Hapus</a>
                    </div>
                </div>

                <!-- Daftar Alamat (Item 2) -->
                <div class="bg-purple-800 p-4 rounded-lg shadow-md mb-4 border border-purple-400">
                    <div class="flex justify-between items-start mb-2">
                        <p class="font-bold text-white">Alamat Kantor</p>
                    </div>
                    <p class="text-white mb-2">
                        (Atas Nama Fany)<br>
                        Gedung Merdeka Lt. 10, Jl. Sudirman Kav. 50, Jakarta Selatan, 12930.
                    </p>
                    <div class="flex space-x-3 text-sm mt-3">
                        <a href="#" class="text-yellow-400 hover:text-yellow-300 font-semibold">Ubah</a>
                        <span class="text-purple-500">|</span>
                        <a href="#" class="text-red-400 hover:text-red-300 font-semibold">Hapus</a>
                    </div>
                </div>

            </div>
            <!-- Akhir KARTU DAFTAR ALAMAT -->

        </div>
    </div>
</body>

</html>
