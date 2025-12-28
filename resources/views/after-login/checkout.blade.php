<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pesanan | BukuBareng</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Style untuk Modal agar overlay menutupi seluruh layar */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <!-- Konten Utama -->
    <div class="pt-12 px-4 md:px-12">

        <div class="max-w-4xl mx-auto p-8">

            <!-- HEADER NAVIGASI (Sama seperti Keranjang) -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">

                <!-- Kiri: Header Kembali -->
                <!-- Kembali ke Keranjang -->
                <a href="/keranjang" class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Checkout Pesanan</span>
                </a>

                <!-- Kanan: Grup Ikon Navigasi (Hanya Home) -->
                <div class="flex items-center space-x-4 text-white">

                    <!-- Kembali ke Home Link -->
                    <a href="/dashboard_after_login"
                        class="hover:text-yellow-400 transition flex items-center space-x-2">
                        <i class="fa-solid fa-home text-xl"></i>
                    </a>
                </div>
            </div>
            <!-- Akhir HEADER NAVIGASI -->


            <!-- KARTU CHECKOUT UTAMA -->
            <!-- Dibuat max-w-full agar tidak bentrok dengan max-w-4xl di atas, dan menyesuaikan ukuran yang diperlukan -->
            <div
                class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-yellow-400">

                <!-- KOLOM UTAMA (ALAMAT & PRODUK) DAN RINGKASAN (SIDEBAR) -->
                <div class="md:grid md:grid-cols-5 md:gap-8">

                    <!-- Kolom Kiri (Alamat dan Produk - 3/5 lebar) -->
                    <div class="md:col-span-3 space-y-6">

                        <!-- 1. Alamat Pengiriman -->
                        <div class="bg-purple-800 p-4 rounded-xl shadow-lg border border-purple-700">
                            <div class="flex justify-between items-center mb-2">
                                <p class="text-sm font-semibold text-yellow-400">Alamat Pengiriman</p>
                                <!-- Tombol Ubah Alamat Diberi ID -->
                                <button id="open-address-modal"
                                    class="bg-yellow-400 text-purple-900 text-sm font-bold py-1 px-3 rounded-full hover:bg-yellow-300 transition">
                                    Ubah
                                </button>
                            </div>

                            <p class="font-bold text-white mb-1">Rumah</p>
                            <p class="text-sm text-purple-300" id="current-address-display">
                                Fany Shandy Agastya (0821xxxxxx) <br>
                                Jl. Kenanga No. 45, Kel. Mawar, Kec. Tulip, Kota Jakarta Pusat, 10520.
                            </p>
                        </div>

                        <!-- 2. Daftar Produk -->
                        <p class="text-sm font-semibold text-purple-300 pt-2">*Produk yang Disewa</p>

                        <!-- Item 1: The Seven Husbands of Evelyn Hugo -->
                        <div class="flex items-center bg-purple-800 p-4 rounded-xl shadow-md border border-purple-700">
                            <img src="img/books/book9.jpg"
                                onerror="this.onerror=null; this.src='https://placehold.co/60x90/551A8B/FFFFFF?text=B1'"
                                alt="Ayo Putus" class="w-16 h-24 object-cover rounded-md flex-shrink-0 mr-4">

                            <div class="flex-grow">
                                <p class="font-semibold text-white">The Seven Husbands of Evelyn Hugo</p>
                                <p class="text-xs text-purple-300 mb-2">24 Okt - 31 Okt (7 hari)</p>
                            </div>

                            <p class="font-bold text-yellow-300 ml-4">Rp 4.000/Hari</p>
                        </div>

                        <!-- Item 2: Ayo Putus -->
                        <div class="flex items-center bg-purple-800 p-4 rounded-xl shadow-md border border-purple-700">
                            <img src="img/books/book2.jpg"
                                onerror="this.onerror=null; this.src='https://placehold.co/60x90/551A8B/FFFFFF?text=B2'"
                                alt="Ayo Putus" class="w-16 h-24 object-cover rounded-md flex-shrink-0 mr-4">

                            <div class="flex-grow">
                                <p class="font-semibold text-white">Ayo Putus</p>
                                <p class="text-xs text-purple-300 mb-2">24 Okt - 31 Okt (7 hari)</p>
                            </div>

                            <p class="font-bold text-yellow-300 ml-4">Rp 3.500/Hari</p>
                        </div>

                    </div>

                    <!-- Kolom Kanan (Ringkasan & Total - 2/5 lebar) -->
                    <div
                        class="md:col-span-2 mt-8 md:mt-0 bg-purple-800 p-4 rounded-xl shadow-lg border border-purple-700 h-max">

                        <p class="text-xl font-bold text-yellow-400 mb-4 border-b border-purple-700 pb-2">Ringkasan Sewa
                        </p>

                        <!-- Detail Harga Sewa -->
                        <div class="text-sm space-y-2 mb-4">
                            <div class="flex justify-between">
                                <p>Sewa 2 Buku (7 Hari)</p>
                                <p>Rp 52.500</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Biaya Layanan</p>
                                <p>Rp 2.500</p>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-purple-700 my-4"></div>

                        <!-- Total Biaya Akhir -->
                        <div class="flex justify-between items-center text-2xl font-extrabold mb-6">
                            <p>Total Bayar</p>
                            <p class="text-yellow-400">Rp 55.000</p>
                        </div>

                        <!-- Tombol Konfirmasi Pesanan -->
                        <a href="/pembayaran_belum_dibayar"
                            class="w-full py-3 rounded-full font-extrabold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition shadow-lg transform hover:scale-[1.01] inline-block text-center">
                            Konfirmasi Pesanan
                        </a>

                    </div>
                </div>

            </div>
            <!-- Akhir KARTU CHECKOUT UTAMA -->

        </div>
    </div>

    <!-- MODAL POP-UP PILIH ALAMAT (Hidden by default) - DISIMPELKAN -->
    <div id="address-modal" class="modal-overlay fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="bg-purple-900 rounded-2xl p-6 shadow-2xl w-full max-w-lg mx-4 border-2 border-yellow-400">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-yellow-300">Pilih Alamat Pengiriman</h3>
                <button id="close-address-modal" class="text-white hover:text-red-500 transition">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>
            </div>

            <!-- Daftar Alamat dalam Modal -->
            <div class="space-y-4 max-h-80 overflow-y-auto pr-2">

                <!-- Alamat Opsi 1 (Default) -->
                <label for="address1"
                    class="flex items-center bg-purple-800 p-4 rounded-lg shadow-md cursor-pointer border border-yellow-400 hover:border-yellow-300 transition">
                    <input type="radio" name="selected_address" id="address1" value="Rumah" checked
                        class="mt-1 mr-3 text-yellow-400 bg-purple-900 border-purple-500 focus:ring-yellow-400">
                    <div>
                        <p class="font-bold text-yellow-300">Rumah (Alamat Utama)</p>
                        <p class="text-sm text-white">Fany Shandy Agastya, Jl. Kenanga No. 45, Klojen, Malang.</p>
                    </div>
                </label>

                <!-- Alamat Opsi 2 -->
                <label for="address2"
                    class="flex items-center bg-purple-800 p-4 rounded-lg shadow-md cursor-pointer border border-purple-700 hover:border-yellow-300 transition">
                    <div class="flex items-start">
                        <input type="radio" name="selected_address" id="address2" value="Kantor"
                            class="mt-1 mr-3 text-yellow-400 bg-purple-900 border-purple-500 focus:ring-yellow-400">
                        <div>
                            <p class="font-bold text-white">Kantor</p>
                            <p class="text-sm text-purple-300">Atas Nama Fany, Gedung Merdeka Lt. 10, Jakarta Selatan.
                            </p>
                        </div>
                    </div>
                </label>

                <!-- Opsi Tambah/Ubah Dihilangkan -->

            </div>

            <button id="confirm-address-selection"
                class="w-full py-3 mt-6 rounded-full font-bold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition">
                Konfirmasi Pilihan
            </button>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtn = document.getElementById('open-address-modal');
            const closeModalBtn = document.getElementById('close-address-modal');
            const addressModal = document.getElementById('address-modal');
            const confirmBtn = document.getElementById('confirm-address-selection');
            const addressDisplay = document.getElementById('current-address-display');

            // Data dummy untuk simulasi perubahan alamat (di dunia nyata ini akan dari backend)
            const addresses = {
                'Rumah': 'Fany Shandy Agastya (0821xxxxxx) <br> Jl. Kenanga No. 45, Kel. Mawar, Kec. Tulip, Kota Jakarta Pusat, 10520.',
                'Kantor': 'Atas Nama Fany (0821xxxxxx) <br> Gedung Merdeka Lt. 10, Jakarta Selatan, 12930.'
            };

            // 1. Logika untuk Membuka Modal
            if (openModalBtn && addressModal) {
                openModalBtn.addEventListener('click', () => {
                    addressModal.classList.remove('hidden');
                });
            }

            // 2. Logika untuk Menutup Modal
            if (closeModalBtn && addressModal) {
                closeModalBtn.addEventListener('click', () => {
                    addressModal.classList.add('hidden');
                });
                addressModal.addEventListener('click', (e) => {
                    if (e.target === addressModal) {
                        addressModal.classList.add('hidden');
                    }
                });
            }

            // 3. Logika Konfirmasi Pilihan Alamat
            if (confirmBtn && addressModal && addressDisplay) {
                confirmBtn.addEventListener('click', () => {
                    const selectedAddressRadio = document.querySelector(
                        'input[name="selected_address"]:checked');
                    if (selectedAddressRadio) {
                        const selectedValue = selectedAddressRadio.value;

                        // Simulasi update alamat di halaman checkout
                        const selectedText = addresses[selectedValue];
                        addressDisplay.innerHTML = selectedText;

                        // Perbarui nama alamat utama di header
                        const addressHeaderContainer = addressDisplay.closest('.bg-purple-800')
                            .querySelector('.flex > p');

                        if (addressHeaderContainer) {
                            addressHeaderContainer.textContent = selectedValue;

                            // Tambahkan/Hapus warna yellow berdasarkan apakah itu Alamat Utama (Rumah)
                            addressHeaderContainer.classList.remove('text-yellow-400', 'text-white');
                            addressHeaderContainer.classList.add(selectedValue === 'Rumah' ?
                                'text-yellow-400' : 'text-white');
                        }


                        addressModal.classList.add('hidden');
                    } else {
                        // Di sini Anda bisa menambahkan feedback bahwa alamat harus dipilih
                        // Menggunakan alert karena ini file standalone HTML, di Laravel/Blade sebaiknya pakai modal lain.
                        alert("Mohon pilih salah satu alamat terlebih dahulu!");
                    }
                });
            }
        });
    </script>
</body>

</html>
