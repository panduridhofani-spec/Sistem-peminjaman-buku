@extends('layouts.admin')

@section('title', 'Data Pesanan')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Data Pesanan</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
        <div class="max-w-xl mx-auto">
            <div class="relative group">
                <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-600 transition-colors"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>

                <input type="search" id="search-input"
                    class="block w-full p-4 ps-11 border border-gray-200 rounded-xl text-sm transition-all focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none placeholder:text-gray-400"
                    placeholder="Cari nama pelanggan atau status...">

                <button onclick="loadOrder()"
                    class="absolute end-2 top-2 bottom-2 bg-blue-600 hover:bg-blue-700 active:scale-95 text-white px-6 rounded-lg text-sm font-medium transition-all shadow-sm">
                    Cari
                </button>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
            <h2 class="text-lg font-bold text-gray-800">Daftar Transaksi Masuk</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-blue-50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider w-16 text-center">No</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Total Harga</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider text-center">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="orderBody" class="divide-y divide-gray-50">
                    <tr>
                        <td colspan="6" class="p-12 text-center text-gray-400">
                            Memuat data pesanan...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalDetail" class="fixed inset-0 bg-black/60 hidden z-50 flex items-center justify-center backdrop-blur-sm transition-all">
        <div class="bg-white rounded-2xl p-8 w-full max-w-2xl shadow-2xl transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Rincian Item Pesanan</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="overflow-hidden border border-gray-100 rounded-xl mb-6">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-left">
                            <th class="p-4 font-semibold">Produk / Buku</th>
                            <th class="p-4 font-semibold text-center">Jumlah</th>
                            <th class="p-4 font-semibold text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="detailBody" class="divide-y divide-gray-100"></tbody>
                </table>
            </div>

            <div class="flex justify-end">
                <button onclick="closeModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-xl font-medium transition-colors">
                    Tutup Detail
                </button>
            </div>
        </div>
    </div>

<script>
const tbody = document.getElementById('orderBody');
const modal = document.getElementById('modalDetail');
const detailBody = document.getElementById('detailBody');
const searchInput = document.getElementById('search-input');

let orders = [];

// API LOAD
function loadOrder() {
    const keyword = searchInput.value;
    
    // Tampilkan loading state
    tbody.innerHTML = `<tr><td colspan="6" class="p-12 text-center text-gray-400">Memproses data...</td></tr>`;

    fetch('/api/admin/pesanan', {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token'),
            'Accept': 'application/json'
        }
    })
    .then(r => r.json())
    .then(data => {
        orders = data;
        // Filter sederhana jika ada pencarian (opsional, sesuaikan dengan backend Anda)
        const filteredData = keyword 
            ? data.filter(o => o.user?.nama_user.toLowerCase().includes(keyword.toLowerCase()) || o.status.includes(keyword))
            : data;
            
        render(filteredData);
    })
    .catch(err => {
        tbody.innerHTML = `<tr><td colspan="6" class="p-12 text-center text-red-500">Gagal memuat data: ${err.message}</td></tr>`;
    });
}

function render(data) {
    tbody.innerHTML = '';

    if (data.length == 0) {
        tbody.innerHTML = `<tr><td colspan="6" class="p-12 text-center text-gray-400">Data pesanan tidak ditemukan</td></tr>`;
        return;
    }

    data.forEach((o, i) => {
        const totalFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(o.total_harga);
        const dateFormatted = new Date(o.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
        
        // Warna badge berdasarkan status
        let statusColor = 'bg-yellow-100 text-yellow-700';
        if(o.status === 'diproses') statusColor = 'bg-blue-100 text-blue-700';
        if(o.status === 'selesai') statusColor = 'bg-green-100 text-green-700';

        tbody.innerHTML += `
        <tr class="hover:bg-gray-50/50 transition-colors">
            <td class="px-6 py-4 text-center text-sm text-gray-500 font-medium">${i+1}</td>
            <td class="px-6 py-4">
                <div class="font-bold text-gray-800">${o.user?.nama_user ?? 'Guest'}</div>
                <div class="text-xs text-gray-400">ID: #ORD-${o.id_pesanan}</div>
            </td>
            <td class="px-6 py-4 font-semibold text-gray-700">${totalFormatted}</td>
            <td class="px-6 py-4 text-center">
                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold uppercase ${statusColor}">
                    ${o.status}
                </span>
            </td>
            <td class="px-6 py-4 text-sm text-gray-600">${dateFormatted}</td>
            <td class="px-6 py-4">
                <div class="flex items-center justify-center gap-4">
                    <button onclick="showDetail(${o.id_pesanan})" class="flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        Detail
                    </button>
                    <select onchange="updateStatus(${o.id_pesanan},this.value)" 
                        class="text-xs border border-gray-200 rounded-lg p-1.5 focus:ring-2 focus:ring-blue-500/20 outline-none cursor-pointer">
                        <option value="tertunda" ${o.status=='tertunda'?'selected':''}>Tunda</option>
                        <option value="diproses" ${o.status=='diproses'?'selected':''}>Proses</option>
                        <option value="selesai" ${o.status=='selesai'?'selected':''}>Selesai</option>
                    </select>
                </div>
            </td>
        </tr>`;
    });
}

function showDetail(id) {
    let order = orders.find(o => o.id_pesanan == id);
    detailBody.innerHTML = '';

    order.detail.forEach(d => {
        const subtotal = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(d.harga * d.jumlah);
        detailBody.innerHTML += `
        <tr class="hover:bg-gray-50/30">
            <td class="p-4">
                <div class="font-medium text-gray-800">${d.buku.judul}</div>
            </td>
            <td class="p-4 text-center text-gray-600 font-bold">${d.jumlah}</td>
            <td class="p-4 text-right font-semibold text-gray-700">${subtotal}</td>
        </tr>`;
    });

    modal.classList.remove('hidden');
}

function closeModal() {
    modal.classList.add('hidden');
}

function updateStatus(id, status) {
    if(!confirm(`Ubah status pesanan ke ${status.toUpperCase()}?`)) return;

    fetch(`/api/admin/pesanan/${id}`, {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ status })
    })
    .then(r => r.json())
    .then(res => {
        loadOrder(); // Reload data setelah update
    })
    .catch(err => alert("Gagal memperbarui status"));
}

// Inisialisasi awal
loadOrder();

// Event listener untuk search enter
searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') loadOrder();
});
</script>

@endsection