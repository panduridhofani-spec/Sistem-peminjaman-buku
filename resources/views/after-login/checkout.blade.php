<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pesanan | BukuBareng</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif
        }

        .modal-overlay {
            background: rgba(0, 0, 0, .7)
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <div class="pt-12 px-4 md:px-12">
        <div class="max-w-4xl mx-auto p-8">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">

                <a href="/keranjang" class="flex items-center space-x-2 text-yellow-400 hover:text-white">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Checkout Pesanan</span>
                </a>

                <a href="/dashboard" class="hover:text-yellow-400">
                    <i class="fa-solid fa-home text-xl"></i>
                </a>

            </div>

            <!-- CARD -->
            <div class="bg-purple-900/80 rounded-2xl p-6 md:p-8 border-t-4 border-yellow-400">

                <div class="md:grid md:grid-cols-5 md:gap-8">

                    <!-- LEFT -->
                    <div class="md:col-span-3 space-y-6">

                        <!-- ADDRESS -->
                        <div class="bg-purple-800 p-4 rounded-xl border border-purple-700">
                            <div class="flex justify-between mb-2">
                                <p class="text-sm font-semibold text-yellow-400">
                                    Alamat Pengiriman
                                </p>
                            </div>

                            <p id="address-box" class="text-sm text-purple-300">
                                Loading alamat...
                            </p>
                        </div>

                        <p class="text-sm font-semibold text-purple-300">
                            *Produk yang Disewa
                        </p>

                        <div id="cart-list" class="space-y-4"></div>

                    </div>

                    <!-- RIGHT -->
                    <div class="md:col-span-2 bg-purple-800 p-4 rounded-xl border border-purple-700 h-max">

                        <p class="text-xl font-bold text-yellow-400 mb-4 border-b border-purple-700 pb-2">
                            Ringkasan Sewa
                        </p>

                        <div class="text-sm space-y-2 mb-4">
                            <div class="flex justify-between">
                                <p>Total Sewa</p>
                                <p id="subtotal">Rp 0</p>
                            </div>

                            <div class="flex justify-between">
                                <p>Biaya Layanan</p>
                                <p>Rp 5.000</p>
                            </div>
                        </div>

                        <div class="h-px bg-purple-700 my-4"></div>

                        <div class="flex justify-between text-2xl font-extrabold mb-6">
                            <p>Total Bayar</p>
                            <p id="grand-total" class="text-yellow-400">Rp 0</p>
                        </div>

                        <button id="checkoutBtn"
                            class="w-full py-3 rounded-full font-extrabold bg-yellow-400 text-purple-900">
                            Konfirmasi Pesanan
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div id="address-modal" class="modal-overlay fixed inset-0 z-50 hidden flex items-center justify-center">

        <div class="bg-purple-900 rounded-2xl p-6 w-full max-w-lg mx-4 border-2 border-yellow-400">

            <div class="flex justify-between mb-6">
                <h3 class="text-2xl font-bold text-yellow-300">
                    Pilih Alamat
                </h3>

                <button id="close-address-modal">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>
            </div>

            <div id="modal-address-list" class="space-y-4 max-h-80 overflow-y-auto"></div>

            <button id="confirm-address-selection"
                class="w-full py-3 mt-6 rounded-full bg-yellow-400 text-purple-900 font-bold">
                Konfirmasi
            </button>

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
            const subtotalEl = document.getElementById('subtotal');
            const totalEl = document.getElementById('grand-total');
            const addrBox = document.getElementById('address-box');

            const modal = document.getElementById('address-modal');
            const modalList = document.getElementById('modal-address-list');

            let selectedAddress = null;

            /* ================= ALAMAT DEFAULT ================= */
            api('/profile/address-default')
                .then(r => {

                    if (!r || !r.address) {
                        addrBox.innerHTML = `
                        <span class="text-red-300">
                            Belum ada alamat utama
                        </span>`;
                        return;
                    }

                    const a = r.address;
                    selectedAddress = a.id;

                    addrBox.innerHTML = `
                    <b>${a.penerima}</b> (${a.telepon})<br>
                    ${a.alamat_lengkap},<br>
                    ${a.kelurahan}, ${a.kecamatan}<br>
                    ${a.kode_pos}`;
                });

            /* ================= FORMAT TANGGAL ================= */
            function formatTanggal(tgl) {
                const d = new Date(tgl);
                return d.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });
            }

            /* ================= CART ================= */
            function loadCart() {

                api('/keranjang')
                    .then(r => {

                        cartList.innerHTML = '';
                        let total = 0;

                        if (!r?.data || r.data.length == 0) {
                            cartList.innerHTML =
                                `<p class="text-center text-purple-300">Keranjang kosong</p>`;

                            subtotalEl.innerText = 'Rp 0';
                            totalEl.innerText = 'Rp 0';
                            return;
                        }

                        r.data.forEach(i => {

                            const harga = i.harga_total;
                            total += harga;

                            cartList.innerHTML += `
                            <div class="flex items-center bg-purple-800
                            p-4 rounded-xl border border-purple-700">

                            <img src="/uploads/buku/${i.buku.gambar}"
                            onerror="this.src='https://placehold.co/60x90'"
                            class="w-16 h-24 rounded mr-4">

                            <div class="flex-grow">
                            <p class="font-semibold text-white">
                            ${i.buku.judul}
                            </p>

                            <p class="text-xs text-purple-300">
                            ${formatTanggal(i.tanggal_mulai)}
                            - ${formatTanggal(i.tanggal_selesai)}
                            (${i.durasi} hari)
                            </p>

                            <p class="text-xs text-white">
                            Jumlah: ${i.jumlah_buku}
                            </p>
                            </div>

                            <p class="font-bold text-yellow-300">
                            Rp ${harga.toLocaleString('id-ID')}
                            </p>
                            </div>`;
                        });

                        subtotalEl.innerText =
                            'Rp ' + total.toLocaleString('id-ID');

                        totalEl.innerText =
                            'Rp ' + (total + 5000).toLocaleString('id-ID');

                    });
            }
            loadCart();

            document.getElementById('close-address-modal')
                .onclick = () => modal.classList.add('hidden');

            document.getElementById('confirm-address-selection')
                .onclick = () => {

                    const v = document.querySelector('input[name=addr]:checked');
                    if (!v) return alert('Pilih alamat');

                    selectedAddress = v.value;

                    api('/address/' + v.value)
                        .then(j => {

                            const a = j.address;

                            addrBox.innerHTML = `
                            <b>${a.penerima}</b> (${a.telepon})<br>
                            ${a.alamat_lengkap},<br>
                            ${a.kelurahan}, ${a.kecamatan}<br>
                            ${a.kode_pos}`;

                            modal.classList.add('hidden');
                        });
                };

            document.getElementById('checkoutBtn').onclick = async () => {

                if (!selectedAddress) {
                    alert('Pilih alamat dulu');
                    return;
                }

                // 1. CHECKOUT CART
                const c = await api('/keranjang/checkout', 'POST');

                if (!c.status) {
                    alert(c.message);
                    return;
                }

                // 2. BUAT PESANAN
                const p = await api('/pesanan', 'POST', {
                    id_address: selectedAddress
                });

                alert(p.message);

                if (p.status) {
                    location.href = '/pembayaran';
                }
            };





        });
    </script>


</body>

</html>
