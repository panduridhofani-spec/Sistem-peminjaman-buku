<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya | BukuBareng</title>
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* Mengatur font agar lebih rapi */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <!-- Wrapper Konten Utama Profil -->
    <!-- pt-8 agar ada sedikit padding di bawah nav yang tidak terlihat (jika ini layout tanpa navbar) -->
    <div class="pt-8 px-4 md:px-12"> 
        
        <!-- Header Navigasi Sederhana (Menggantikan Navbar Penuh) -->
        <header class="flex items-center justify-between py-4 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-yellow-400">Akun Saya</h1>
            
            <!-- Grup Ikon & Navigasi -->
            <div class="flex items-center space-x-4"> 
                
                <!-- Ikon Keranjang Belanja (Sesuai Dashboard) -->
                <a href="/keranjang" class="text-white hover:text-yellow-400 transition">
                    <i class="fa-solid fa-bag-shopping text-xl"></i>
                </a>
                
                <!-- Kembali ke Home Link -->
                <a href="/dashboard_after_login" class="text-white hover:text-yellow-400 transition flex items-center space-x-2">
                    <i class="fa-solid fa-home text-xl"></i>
                    <span class="hidden sm:inline">Kembali ke Home</span>
                </a>
            </div>
        </header>

        <!-- KARTU PROFIL UTAMA -->
        <div class="max-w-4xl mx-auto mb-16 p-8 bg-purple-900/70 backdrop-blur-sm rounded-3xl shadow-2xl border-t-4 border-yellow-400">
            
            <!-- Foto Profil dan Nama -->
            <div class="flex items-center space-x-6 border-b border-purple-700 pb-6 mb-6">
                <div class="w-20 h-20 rounded-full bg-gray-300 p-1 border-4 border-yellow-400 shadow-lg overflow-hidden">
                    <!-- Path asset diganti ke path relatif -->
                    <img src="img/avatar.png" 
                         onerror="this.onerror=null; this.src='https://placehold.co/80x80/6B46C1/FFFFFF?text=A'"
                         alt="Avatar Pengguna" class="w-full h-full object-cover rounded-full">
                </div>
                <div>
                    <h2 class="text-3xl font-extrabold text-yellow-400">Fany Shandy Agastya</h2>
                    <p class="text-purple-300">Pengguna Aktif</p>
                </div>
            </div>

            <!-- Detail Informasi Pengguna -->
            <div class="space-y-4 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                    <div class="font-semibold text-purple-200">Nama Lengkap</div>
                    <div class="text-white">Fany Shandy Agastya</div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                    <div class="font-semibold text-purple-200">Email</div>
                    <div class="text-white">akuaja123@gmail.com</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                    <div class="font-semibold text-purple-200">Telepon Aktif *</div>
                    <div class="text-white">0821221346795</div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="space-y-4 border-t border-purple-700 pt-6">
                
                <!-- Tombol Ubah Profil -->
                <a href="/edit_profil" class="flex items-center space-x-3 p-3 rounded-xl bg-purple-800 hover:bg-yellow-400 hover:text-purple-900 transition font-semibold shadow-md">
                    <i class="fa-solid fa-user-edit text-xl w-5"></i>
                    <span>Ubah Detail Profil</span>
                </a>

                <!-- Tombol Ubah Alamat -->
                <a href="/profile/address" class="flex items-center space-x-3 p-3 rounded-xl bg-purple-800 hover:bg-yellow-400 hover:text-purple-900 transition font-semibold shadow-md">
                    <i class="fa-solid fa-map-marker-alt text-xl w-5"></i>
                    <span>Ubah Alamat Pengiriman</span>
                </a>

                <!-- Tombol Keluar (Logout) -->
                <a href="/logout" class="flex items-center space-x-3 p-3 rounded-xl bg-red-600 hover:bg-red-700 transition font-semibold shadow-md mt-6">
                    <i class="fa-solid fa-sign-out-alt text-xl w-5"></i>
                    <span>Keluar (Logout)</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>