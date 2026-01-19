<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alamat | BukuBareng</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <div class="pt-12 px-4 md:px-12">
        <div class="max-w-xl mx-auto p-8">

            <!-- HEADER (FIXED SESUAI PERMINTAAN) -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">

                <!-- JUDUL SAJA (TOMBOL KEMBALI DIHAPUS) -->
                <div class="flex items-center space-x-2 text-yellow-400">
                    <span class="text-lg font-semibold">Daftar Alamat</span>
                </div>

                <!-- ICON NAVIGASI -->
                <div class="flex items-center space-x-4">
                    <a href="/keranjang" class="hover:text-yellow-400">
                        <i class="fa-solid fa-bag-shopping text-xl"></i>
                    </a>

                    <!-- ICON PROFIL (DITAMBAHKAN) -->
                    <a href="/profil" class="hover:text-yellow-400">
                        <i class="fa-solid fa-user text-xl"></i>
                    </a>

                    <a href="/dashboard" class="hover:text-yellow-400">
                        <i class="fa-solid fa-home text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 border-t-4 border-yellow-400">

                <a href="/tambah-alamat"
                    class="py-2 px-4 rounded-full font-bold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition shadow-lg mb-6 inline-flex items-center space-x-2">
                    <i class="fa-solid fa-plus text-sm"></i>
                    <span>Tambah Alamat</span>
                </a>

                <div id="alamatContainer" class="space-y-4"></div>

                <p id="noAlamat" class="text-purple-300 italic hidden">
                    Belum ada alamat.
                </p>

            </div>
        </div>
    </div>

    <!-- SCRIPT BACKEND ASLI (TIDAK DIUBAH) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const token = localStorage.getItem('token');
            if (!token) {
                location.href = '/login';
                return;
            }

            function api(url, method = 'GET') {
                return fetch('/api' + url, {
                    method,
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                }).then(r => r.json());
            }

            const container = document.getElementById('alamatContainer');
            const noAlamat = document.getElementById('noAlamat');

            loadAlamat();

            function loadAlamat() {

                api('/profile/address')
                    .then(res => {

                        container.innerHTML = '';

                        if (!res.addresses || res.addresses.length == 0) {
                            noAlamat.classList.remove('hidden');
                            return;
                        }

                        noAlamat.classList.add('hidden');

                        res.addresses.forEach(a => {

                            const alamatGabung =
                                `${a.penerima} (${a.telepon})
${a.alamat_lengkap},
${a.kelurahan}, ${a.kecamatan},
${a.kode_pos}`;

                            container.innerHTML += `
                <div class="bg-purple-800 p-4 rounded-lg shadow-md border
                ${a.is_default ? 'border-yellow-400' : 'border-purple-500'}">

                <div class="flex justify-between items-center mb-2">
                <p class="font-bold 
                ${a.is_default ? 'text-yellow-300' : 'text-white'}">
                ${a.is_default ? 'Alamat Utama' : 'Alamat'}
                </p>
                ${a.is_default ?
                '<span class="text-xs text-purple-300">(Default)</span>' : ''}
                </div>

                <p class="text-sm whitespace-pre-line mb-3">
                ${alamatGabung}
                </p>

                <div class="flex space-x-4 text-sm">

                <a href="/edit_alamat/${a.id}"
                class="text-yellow-400 hover:text-yellow-300 font-semibold">
                Ubah
                </a>

                ${!a.is_default ? `
                    <button onclick="setDefault(${a.id})"
                    class="text-green-400 hover:text-green-300 font-semibold">
                    Jadikan Utama
                    </button>` : ''}

                <button onclick="hapusAlamat(${a.id})"
                class="text-red-400 hover:text-red-300 font-semibold">
                Hapus
                </button>

                </div>
                </div>`;
                        });
                    });
            }

            window.setDefault = function(id) {
                if (!confirm('Jadikan alamat utama?')) return;

                api('/profile/address/' + id + '/default', 'PUT')
                    .then(r => {
                        alert(r.message);
                        loadAlamat();
                    });
            }

            window.hapusAlamat = function(id) {
                if (!confirm('Hapus alamat ini?')) return;

                api('/profile/address/' + id, 'DELETE')
                    .then(r => {
                        alert(r.message);
                        loadAlamat();
                    });
            }

        });
    </script>

</body>
</html>
