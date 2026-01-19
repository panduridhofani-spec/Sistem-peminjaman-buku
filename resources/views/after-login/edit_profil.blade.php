<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Profil | BukuBareng</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Style untuk membuat Navbar menonjol */
        nav {
            background-color: #551A8B;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <!-- Konten Utama (Padding disesuaikan dari pt-24 menjadi pt-12) -->
    <div class="pt-12 px-4 md:px-12">

        <div class="max-w-xl mx-auto p-8">

            <!-- HEADER BARU: Menggabungkan Teks dan Ikon (Ubah Data Profil, Bag, Home) -->
            <!-- Menggunakan flex dan justify-between untuk memisahkan kiri dan kanan -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">

                <!-- Kiri: Header Kembali -->
                <a href="/profil" class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Ubah Data Profil</span>
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
            <!-- Akhir HEADER BARU -->


            <!-- KARTU FORM EDIT PROFIL -->
            <div
                class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-yellow-400">

                <h2 class="text-2xl font-bold text-white mb-6 border-b border-purple-700 pb-3">Edit Nama</h2>

                <form id="editProfileForm">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-purple-200 mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" id="name" required
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 
                   focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white"
                            placeholder="Masukkan nama lengkap baru">
                    </div>

                    <p class="text-xs text-purple-300 italic mb-6">
                        * Email, Nomor Telepon, dan Kata Sandi hanya dapat diubah melalui pengaturan akun.
                    </p>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="py-3 px-8 rounded-full font-bold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>


            </div>
            <!-- Akhir KARTU FORM -->

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const user = JSON.parse(localStorage.getItem('user'));

            if (!user) {
                alert('Silakan login dulu');
                window.location.href = '/login';
                return;
            }

            const nameInput = document.getElementById('name');
            nameInput.value = user.nama_user; // ✅ pakai field yang benar

            document.getElementById('editProfileForm').addEventListener('submit', function(e) {
                e.preventDefault();

                fetch('/api/profile/update-name', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            id_user: user.id_user,
                            nama_user: nameInput.value
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                        if (data.user) {
                            localStorage.setItem('user', JSON.stringify(data.user));
                            window.location.href = '/profil';
                        }
                    })
                    .catch(() => alert('Gagal mengubah profil'));
            });
        });
    </script>

</body>

</html>
