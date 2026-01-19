<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku | BukuBareng</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        nav {
            background-color: #551A8B;
        }
    </style>
</head>

<body class="bg-[#0f172a] min-h-screen text-slate-200">

    <nav class="p-4 fixed top-0 w-full z-30 bg-purple-900/40 backdrop-blur-md border-b border-white/10 shadow-xl">
        <div class="flex items-center justify-between mx-auto px-6 py-1 md:px-12">
            <a href="/dashboard" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-xl bg-white p-1 shadow-lg group-hover:rotate-6 transition-transform">
                    <img src="img/logo.png"
                        onerror="this.onerror=null; this.src='https://placehold.co/40x40/7C3AED/FFFFFF?text=L'"
                        class="w-full h-full object-cover rounded-lg">
                </div>
                <span class="text-xl font-bold tracking-tight text-white">Buku<span
                        class="text-yellow-400">Bareng</span></span>
            </a>
        </div>
    </nav>

    <div class="pt-28 max-w-6xl mx-auto pb-20 px-4">

        <div class="mb-8">
            <a href="/dashboard"
                class="inline-flex items-center space-x-2 text-purple-300 hover:text-yellow-400 transition-colors group">
                <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                <span class="font-medium">Kembali ke Daftar Buku</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-4 space-y-6">
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-yellow-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000">
                    </div>
                    <img id="book-cover" src=""
                        onerror="this.onerror=null; this.src='https://placehold.co/350x500/1e1b4b/FFFFFF?text=COVER'"
                        class="relative w-full rounded-2xl shadow-2xl border border-white/10">
                </div>

                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-2xl">
                    <h3 id="book-title" class="text-2xl font-black text-white leading-tight"></h3>
                    <p id="book-author" class="text-purple-300 italic mt-1"></p>

                    <div id="book-rating" class="flex items-center mt-3 text-yellow-400 space-x-1">
                    </div>

                    <div class="mt-6 flex flex-wrap gap-2">
                        <span id="book-kategori"
                            class="px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-md bg-yellow-400 text-purple-950"></span>
                        <span id="book-stok"
                            class="px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-md bg-purple-600/50 border border-purple-400/30 text-white"></span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-6">

                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-8 rounded-3xl shadow-inner">
                    <h4 class="text-lg font-bold text-yellow-400 mb-4 flex items-center">
                        <i class="fa-solid fa-book-open mr-2"></i> Sinopsis
                    </h4>
                    <p id="book-sinopsis" class="text-slate-300 text-base leading-relaxed text-justify"></p>

                    <div class="mt-8 grid grid-cols-2 md:grid-cols-3 gap-4 border-t border-white/10 pt-6">
                        <div>
                            <p class="text-xs text-slate-500 uppercase font-bold">Penerbit</p>
                            <p id="book-penerbit" class="text-sm font-medium text-purple-200"></p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 uppercase font-bold">Tahun Terbit</p>
                            <p id="book-tahun" class="text-sm font-medium text-purple-200">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 uppercase font-bold">Halaman</p>
                            <p id="book-halaman" class="text-sm font-medium text-purple-200">-</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-purple-800/40 to-purple-950/40 border border-purple-500/30 p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <i class="fa-solid fa-receipt text-6xl text-white"></i>
                    </div>

                    <h4 class="text-lg font-bold text-white mb-6">Pilih Durasi Sewa</h4>

                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label
                                class="relative flex items-center p-4 rounded-2xl border-2 border-white/10 bg-white/5 cursor-pointer hover:bg-white/10 transition-all has-[:checked]:border-yellow-400 has-[:checked]:bg-yellow-400/10">
                                <input type="radio" name="duration" value="7" checked
                                    class="w-5 h-5 accent-yellow-400">
                                <div class="ml-4">
                                    <span class="block text-sm font-bold text-white uppercase tracking-wide">7
                                        Hari</span>
                                    <span id="price-7" class="text-yellow-400 font-black"></span>
                                </div>
                            </label>

                            <label
                                class="relative flex items-center p-4 rounded-2xl border-2 border-white/10 bg-white/5 cursor-pointer hover:bg-white/10 transition-all has-[:checked]:border-yellow-400 has-[:checked]:bg-yellow-400/10">
                                <input type="radio" name="duration" value="14" class="w-5 h-5 accent-yellow-400">
                                <div class="ml-4">
                                    <div class="flex items-center space-x-2">
                                        <span class="block text-sm font-bold text-white uppercase tracking-wide">14
                                            Hari</span>
                                        <span
                                            class="text-[10px] bg-red-500 text-white px-2 py-0.5 rounded-full animate-pulse">DISKON
                                            10%</span>
                                    </div>
                                    <span id="price-14" class="text-yellow-400 font-black"></span>
                                </div>
                            </label>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase text-slate-400 ml-1">Tanggal Mulai
                                    Pinjam</label>
                                <input type="date" id="start_date"
                                    class="w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/10 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 outline-none transition-all text-white">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase text-slate-400 ml-1">Estimasi
                                    Pengembalian</label>
                                <input type="date" id="end_date" disabled
                                    class="w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/5 opacity-50 text-slate-400 cursor-not-allowed">
                            </div>
                        </div>

                        <div
                            class="flex flex-col md:flex-row justify-between items-center gap-6 pt-6 border-t border-white/10">
                            <div>
                                <p class="text-sm text-slate-400 font-medium">Total Pembayaran:</p>
                                <span id="total-harga" class="text-3xl font-black text-white"></span>
                            </div>
                            <!-- BUTTON -->
                            <button type="button" id="btnKeranjang"
                                class="w-full md:w-auto py-4 px-10 rounded-2xl font-black bg-yellow-400 text-purple-950 hover:bg-yellow-300 hover:scale-105 active:scale-95 transition-all shadow-[0_0_20px_rgba(250,204,21,0.3)]">
                                TAMBAH KERANJANG <i class="fa-solid fa-cart-shopping ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div id="modalLogin" class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center">

        <div class="bg-purple-900 p-8 rounded-2xl text-center w-96">

            <h3 class="text-2xl font-bold text-yellow-300 mb-4">
                Akses Terbatas
            </h3>

            <p class="mb-6">
                Login / Register dulu untuk lanjut
            </p>

            <div class="flex gap-4">

                <a href="/register" class="bg-yellow-400 text-purple-900 py-2 rounded flex-1">
                    Register
                </a>

                <a href="/login" class="bg-white text-purple-900 py-2 rounded flex-1">
                    Login
                </a>

            </div>

            <button id="closeModal" class="mt-4 text-sm text-gray-300">
                Lanjut lihat buku
            </button>

        </div>
    </div>

    <!-- SCRIPT DETAIL -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const book = @json($buku); // 🔥 ambil dari controller

            const cover = document.getElementById('book-cover');
            const title = document.getElementById('book-title');
            const author = document.getElementById('book-author');
            const rating = document.getElementById('book-rating');
            const kategori = document.getElementById('book-kategori');
            const stok = document.getElementById('book-stok');
            const sinopsis = document.getElementById('book-sinopsis');
            const penerbit = document.getElementById('book-penerbit');

            const price7El = document.getElementById('price-7');
            const price14El = document.getElementById('price-14');
            const totalEl = document.getElementById('total-harga');

            const start = document.getElementById('start_date');
            const end = document.getElementById('end_date');
            const radios = document.querySelectorAll('input[name="duration"]');

            let hargaPerHari = Number(book.harga);

            // ======================
            // SET DATA
            // ======================
            const imgPath = '/uploads/buku/' + book.gambar;

            cover.src = book.gambar ?
                imgPath :
                'https://placehold.co/250x380/6B46C1/FFFFFF?text=NO+IMAGE';

            cover.onerror = function() {
                this.src = 'https://placehold.co/250x380/6B46C1/FFFFFF?text=NO+IMAGE';
            }

            title.textContent = book.judul;
            author.textContent = book.penulis;

            rating.innerHTML =
                `<i class="fa-solid fa-star text-yellow-400"></i> 4.5/5`;

            kategori.textContent = book.kategori;
            stok.textContent = book.stok > 0 ?
                `Tersedia: ${book.stok}` :
                'Stok Habis';

            sinopsis.textContent = book.deskripsi ?? '-';
            penerbit.textContent = book.penerbit;

            updateHarga();

            // ======================
            // FUNGSI HARGA
            // ======================
            function updateHarga() {
                const dur = document.querySelector('input[name="duration"]:checked').value;

                let total = 0;

                if (dur == 7) {
                    total = hargaPerHari * 7;
                } else {
                    total = Math.round(hargaPerHari * 14 * 0.9);
                }

                price7El.textContent =
                    `Rp ${(hargaPerHari * 7).toLocaleString('id-ID')}`;

                price14El.textContent =
                    `Rp ${(hargaPerHari * 14 * 0.9).toLocaleString('id-ID')}`;

                totalEl.textContent =
                    `Rp ${total.toLocaleString('id-ID')}`;

                calcEnd();
            }

            function calcEnd() {
                if (!start.value) return;

                const dur = document.querySelector('input[name="duration"]:checked').value;
                const d = new Date(start.value);
                d.setDate(d.getDate() + parseInt(dur));

                end.value = d.toISOString().split('T')[0];
                end.disabled = false;
                end.classList.remove('opacity-70');
            }

            radios.forEach(r => r.addEventListener('change', updateHarga));
            start.addEventListener('change', calcEnd);

            // ======================
            // TAMBAH KERANJANG (FIX)
            // ======================

            const btnKeranjang = document.getElementById('btnKeranjang');
            const modal = document.getElementById('modalLogin');
            const closeModal = document.getElementById('closeModal');

            btnKeranjang.addEventListener('click', function() {

                let durasi = document.querySelector('input[name="duration"]:checked').value;
                let tanggal = start.value;

                const token = localStorage.getItem('token');

                // JIKA BELUM LOGIN
                if (!token) {
                    modal.classList.remove('hidden');
                    return;
                }

                // JIKA SUDAH LOGIN
                fetch('/api/keranjang', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + token
                        },
                        body: JSON.stringify({
                            id_buku: book.id_buku,
                            durasi: durasi,
                            tanggal_mulai: tanggal
                        })
                    })
                    .then(res => res.json())
                    .then(res => {

                        if (!res.status) {
                            alert(res.message);
                            return;
                        }

                        alert('Berhasil masuk keranjang');
                        window.location.href = '/keranjang';

                    })
                    .catch(() => {
                        alert('Gagal koneksi server');
                    });

            });

            // TUTUP MODAL
            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });


        });
    </script>


</body>

</html>
