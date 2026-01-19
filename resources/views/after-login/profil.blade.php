<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya | BukuBareng</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <div class="pt-8 px-4 md:px-12">

        <!-- Header -->
        <header class="flex items-center justify-between py-4 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-yellow-400">Akun Saya</h1>

            <div class="flex items-center space-x-4">
                <a href="/keranjang" class="text-white hover:text-yellow-400 transition">
                    <i class="fa-solid fa-bag-shopping text-xl"></i>
                </a>
                <a href="/dashboard"
                    class="text-white hover:text-yellow-400 transition flex items-center space-x-2">
                    <i class="fa-solid fa-home text-xl"></i>
                    <span class="hidden sm:inline">Kembali ke Home</span>
                </a>
            </div>
        </header>

        <!-- KARTU PROFIL -->
        <div
            class="max-w-4xl mx-auto mb-16 p-8 bg-purple-900/70 backdrop-blur-sm rounded-3xl shadow-2xl border-t-4 border-yellow-400">

            <!-- Avatar & Nama -->
            <div class="flex items-center space-x-6 border-b border-purple-700 pb-6 mb-6">
                <div
                    class="w-20 h-20 rounded-full bg-gray-300 p-1 border-4 border-yellow-400 shadow-lg overflow-hidden">
                    <img id="avatar" src="https://placehold.co/80x80/6B46C1/FFFFFF?text=U" alt="Avatar Pengguna"
                        class="w-full h-full object-cover rounded-full">
                </div>
                <div>
                    <h2 id="profileName" class="text-3xl font-extrabold text-yellow-400">-</h2>
                    <p class="text-purple-300">Pengguna Aktif</p>
                </div>
            </div>

            <!-- Detail Informasi -->
            <div class="space-y-4 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                    <div class="font-semibold text-purple-200">Nama Lengkap</div>
                    <div id="detailName" class="text-white">-</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                    <div class="font-semibold text-purple-200">Email</div>
                    <div id="detailEmail" class="text-white">-</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                    <div class="font-semibold text-purple-200">Telepon Aktif *</div>
                    <div id="detailPhone" class="text-white">-</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                    <div class="font-semibold text-purple-200">Alamat</div>
                    <div id="detailAlamat" class="text-white">-</div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="space-y-4 border-t border-purple-700 pt-6">

                <a href="/edit_profil"
                    class="flex items-center space-x-3 p-3 rounded-xl bg-purple-800 hover:bg-yellow-400 hover:text-purple-900 transition font-semibold shadow-md">
                    <i class="fa-solid fa-user-edit text-xl w-5"></i>
                    <span>Ubah Detail Profil</span>
                </a>

                <a href="/alamat"
                    class="flex items-center space-x-3 p-3 rounded-xl bg-purple-800 hover:bg-yellow-400 hover:text-purple-900 transition font-semibold shadow-md">
                    <i class="fa-solid fa-map-marker-alt text-xl w-5"></i>
                    <span>Tambah Alamat Pengiriman</span>
                </a>

                <!-- Logout -->
                <button id="logoutBtn"
                    class="w-full flex items-center space-x-3 p-3 rounded-xl bg-red-600 hover:bg-red-700 transition font-semibold shadow-md mt-6">
                    <i class="fa-solid fa-sign-out-alt text-xl w-5"></i>
                    <span>Keluar (Logout)</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // =====================
            // 🔐 TOKEN GUARD
            // =====================
            const token = localStorage.getItem('token');

            if (!token) {
                window.location.replace('/login');
                return;
            }

            // =====================
            // HELPER API
            // =====================
            function api(url) {
                return fetch('/api' + url, {
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + token
                        }
                    })
                    .then(res => {
                        if (res.status === 401) {
                            localStorage.clear();
                            window.location.replace('/login');
                        }
                        return res.json();
                    });
            }

            // =====================
            // 🔥 AMBIL DATA USER
            // =====================
            api('/me')
                .then(res => {
                    const u = res.data;

                    document.getElementById('profileName').innerText = u.nama_user;
                    document.getElementById('detailName').innerText = u.nama_user;
                    document.getElementById('detailEmail').innerText = u.email;
                    document.getElementById('detailPhone').innerText = u.no_hp ?? '-';

                    const first = u.nama_user ? u.nama_user.charAt(0).toUpperCase() : 'U';
                    document.getElementById('avatar').src =
                        `https://placehold.co/80x80/6B46C1/FFFFFF?text=${first}`;
                });

            // =====================
            // 🔥 AMBIL ALAMAT DEFAULT
            // =====================
            api('/profile/address-default')
                .then(res => {
                    if (res.address) {
                        const a = res.address;
                        const teks =
                            `${a.penerima} (${a.telepon})
    ${a.alamat_lengkap}, ${a.kelurahan}, ${a.kecamatan}, ${a.kode_pos}`;

                        document.getElementById('detailAlamat').innerText = teks;
                    } else {
                        document.getElementById('detailAlamat').innerText = '-';
                    }
                });

            // logout
            document.getElementById('logoutBtn').addEventListener('click', function() {

                if (!confirm('Yakin ingin keluar?')) return;

                const token = localStorage.getItem('token');

                fetch('/api/logout', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + token
                        }
                    })
                    .then(() => {

                        // 🔥 Logout SESSION WEB
                        return fetch('/logout', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            }
                        });
                    })
                    .finally(() => {

                        // bersihkan localStorage
                        localStorage.clear();

                        // reload ke homepage
                        window.location.replace('/');
                    });

            });

        });
    </script>



</html>
