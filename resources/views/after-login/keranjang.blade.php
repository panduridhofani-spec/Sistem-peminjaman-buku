@extends('layouts.app-login')

@section('title', 'Keranjang | BukuBareng')

@section('content')

    <div class="max-w-3xl mx-auto px-4">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">
            <a href="/dashboard" class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span class="text-lg font-semibold">Keranjang</span>
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 border-t-4 border-yellow-400">

            <div class="md:grid md:grid-cols-3 md:gap-8">

                <!-- LIST -->
                <div id="cart-list" class="md:col-span-2 space-y-6"></div>

                <!-- SIDEBAR -->
                <div
                    class="md:col-span-1 mt-8 md:mt-0 bg-purple-800 p-4 rounded-xl shadow-lg border border-purple-700 h-max">

                    <!-- ALAMAT -->
                    <div class="mb-4">
                        <p class="text-sm text-purple-300 mb-1">Dikirim ke:</p>
                        <div class="flex justify-between items-center">
                            <p class="font-semibold text-yellow-400">Alamat Utama</p>
                            <a href="/alamat"
                                class="bg-yellow-400 text-purple-900 text-sm font-bold py-1 px-3 rounded-full hover:bg-yellow-300 transition">
                                Ubah
                            </a>
                        </div>
                        <p id="alamat-default" class="text-xs text-white mt-1">-</p>
                    </div>

                    <div class="h-px bg-purple-700 my-4"></div>

                    <!-- TOTAL -->
                    <div class="flex justify-between items-center text-xl font-bold mb-6">
                        <p>Total Sewa Barang</p>
                        <p id="total-harga" class="text-yellow-400">Rp 0</p>
                    </div>

                    <!-- CHECKOUT -->
                    <button id="pinjamBtn" class="w-full py-3 rounded-full font-extrabold bg-yellow-400 text-purple-900">
                        Pinjam
                    </button>

                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const token = localStorage.getItem('token');
            if (!token) {
                location.href = '/login';
                return;
            }

            function api(url, method = 'GET', body = null) {
                return fetch('/api' + url, {
                        method,
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + token
                        },
                        body: body ? JSON.stringify(body) : null
                    })
                    .then(r => {
                        if (r.status === 401) {
                            localStorage.clear();
                            location.href = '/login';
                            return;
                        }
                        return r.json();
                    });
            }

            const cartList = document.getElementById('cart-list');
            const totalEl = document.getElementById('total-harga');
            const alamatEl = document.getElementById('alamat-default');
            const pinjamBtn = document.getElementById('pinjamBtn');

            // ================= LOAD ALAMAT =================
            api('/profile/address-default').then(r => {

                if (!r || !r.address) {
                    alamatEl.innerHTML = `
            <span class="text-red-300">
                Belum ada alamat utama
            </span>`;
                    return;
                }

                const a = r.address;
                alamatEl.innerHTML = `
            ${a.penerima} (${a.telepon})
            ${a.alamat_lengkap},
            ${a.kelurahan}, ${a.kecamatan},
            ${a.kode_pos}`;
            });

            // ================= FORMAT TANGGAL =================
            function formatTanggal(tgl) {
                return new Date(tgl).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });
            }

            // ================= LOAD CART =================
            function loadCart() {
                api('/keranjang').then(r => {

                    cartList.innerHTML = '';
                    let total = 0;

                    if (!r?.data || r.data.length == 0) {
                        cartList.innerHTML =
                            `<p class="text-center text-purple-300">Keranjang kosong</p>`;
                        totalEl.innerText = 'Rp 0';
                        return;
                    }

                    r.data.forEach(i => {

                        const harga = i.harga_total;
                        total += harga;

                        cartList.innerHTML += `
                        <div class="flex items-center bg-purple-800 p-4 rounded-xl shadow-md border border-purple-700">

                            <img src="/uploads/buku/${i.buku.gambar}"
                                onerror="this.src='https://placehold.co/60x90/551A8B/FFFFFF?text=B'"
                                class="w-16 h-24 object-cover rounded-md mr-4">

                            <div class="flex-grow">
                                <p class="font-semibold text-lg text-yellow-300">
                                    ${i.buku.judul}
                                </p>
                                <p class="text-xs text-purple-300">
                                    Durasi: ${i.durasi} hari
                                </p>
                                <p class="text-xs text-purple-400">
                                    Mulai ${formatTanggal(i.tanggal_mulai)}
                                </p>
                                <p class="text-xs text-purple-400 mb-2">
                                    Hingga ${formatTanggal(i.tanggal_selesai)}
                                </p>

                                <p class="font-bold text-white">
                                    Rp ${harga.toLocaleString('id-ID')}
                                </p>
                            </div>

                            <div class="flex items-center space-x-2 ml-4">

                                <button 
                                    onclick="ubah(${i.id_keranjang},-1)"
                                    class="bg-purple-700 text-white text-xl px-2">
                                    -
                                </button>

                                <input 
                                    type="text" 
                                    value="${i.jumlah_buku}" 
                                    readonly
                                    class="w-10 text-center bg-purple-900 border rounded">

                                <button 
                                    onclick="ubah(${i.id_keranjang},1)"
                                    class="bg-purple-700 text-white text-xl px-2">
                                    +
                                </button>

                                <button 
                                    onclick="hapus(${i.id_keranjang})"
                                    class="py-1 px-3 rounded-full bg-red-600 text-white text-sm ml-2">
                                    Hapus
                                </button>

                            </div>

                        </div>`;
                    });

                    totalEl.innerText = 'Rp ' + total.toLocaleString('id-ID');
                });
            }

            loadCart();

            // ================= UPDATE =================
            window.ubah = function(id, val) {
                api('/keranjang/' + id, 'PUT', {
                        jumlah: val
                    })
                    .then(() => loadCart());
            }

            // ================= DELETE =================
            window.hapus = function(id) {
                if (!confirm('Hapus item?')) return;
                api('/keranjang/' + id, 'DELETE')
                    .then(() => loadCart());
            }

            // ================= PINJAM =================
            pinjamBtn.onclick = async () => {

                const r = await api('/keranjang/cek-stok');

                if (!r.status) {
                    alert(r.message);
                    return;
                }

                location.href = '/checkout';
            }

        });
    </script>


@endsection
