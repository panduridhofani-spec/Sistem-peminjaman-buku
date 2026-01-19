@extends('layouts.admin')

@section('title', 'Data Buku')

@section('content')

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Data Buku</h1>
    </div>

    <!-- SEARCH BOX -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
        <div class="max-w-xl mx-auto">
            <div class="relative group">
                <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-green-600 transition-colors"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>

                <input type="search" id="search-input"
                    class="block w-full p-4 ps-11 border border-gray-200 rounded-xl text-sm transition-all focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none placeholder:text-gray-400"
                    placeholder="Cari judul buku, penulis, atau penerbit...">

                <button onclick="loadData(1)"
                    class="absolute end-2 top-2 bottom-2 bg-green-600 hover:bg-green-700 active:scale-95 text-white px-6 rounded-lg text-sm font-medium transition-all shadow-sm">
                    Cari
                </button>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
            <h2 class="text-lg font-bold text-gray-800">Daftar Inventaris Buku</h2>
            <a href="{{ route('buku.create') }}"
                class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-2.5 px-5 rounded-xl transition-all shadow-md shadow-green-100 active:scale-95">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Buku
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                    <thead>
                        <tr class="bg-yellow-300 border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider w-16">No</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Cover</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Informasi Buku</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Penerbit & Kategori</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Harga & Stok</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider text-center">Aksi</th>
                        </tr>
                    </thead>
                <tbody id="table-body" class="divide-y divide-gray-50">
                    <tr>
                        <td colspan="5" class="p-10 text-center text-gray-400">
                            Memuat data...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-50 bg-gray-50/30 flex flex-col md:flex-row items-center justify-center">
            <div id="pagination-footer" class="hidden p-6 border-t border-gray-50 bg-gray-50/30">
                <div class="flex flex-col items-center justify-center gap-4">
                    <div id="pagination-container" class="flex items-center justify-center select-none">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* ===============================
            🔐 TOKEN
            =============================== */
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '/login';
                return;
            }

            /* ===============================
            🔹 API HELPER
            =============================== */
            function api(url) {
                return fetch('/api' + url, {
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                }).then(res => {
                    if (res.status === 401) {
                        localStorage.clear();
                        window.location.href = '/login';
                    }
                    return res.json();
                });
            }

            const tbody = document.getElementById('table-body');
            const pagination = document.getElementById('pagination-container');
            const footer = document.getElementById('pagination-footer');
            const searchInput = document.getElementById('search-input');

            let currentPage = 1;
            let currentSearch = '';

            /* ===============================
            LOAD DATA
            =============================== */
            window.loadData = function(page = 1) {

                currentPage = page;
                showLoading();

                api(`/buku?page=${page}&search=${encodeURIComponent(currentSearch)}`)
                    .then(res => {

                        if (!res.status) {
                            alert(res.message);
                            return;
                        }

                        renderTable(res.data);
                        renderPagination(res.data);

                        footer.classList.toggle('hidden', res.data.last_page <= 1);

                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    });
            }

            loadData();

            /* ===============================
            SEARCH
            =============================== */
            let timer = null;
            searchInput.oninput = () => {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    currentSearch = searchInput.value.trim();
                    loadData(1);
                }, 400);
            }

            /* ===============================
            TABLE
            =============================== */
            function showLoading() {
                tbody.innerHTML = `
        <tr>
            <td colspan="5"
            class="p-12 text-center text-gray-400">
            Memuat data...
            </td>
        </tr>`;
            }

            function renderTable(data) {
                tbody.innerHTML = '';

                if (!data.data.length) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="7" class="p-12 text-center text-gray-400">Tidak ada data buku</td>
                        </tr>`;
                    return;
                }

                let no = data.from;

                data.data.forEach(b => {
                    // Format Harga ke Rupiah
                    const harga = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(b.harga);

                    // Potong deskripsi jika terlalu panjang
                    const deskripsiSingkat = b.deskripsi 
                        ? (b.deskripsi.length > 60 ? b.deskripsi.substring(0, 60) + '...' : b.deskripsi) 
                        : '<span class="text-gray-300 italic">Tidak ada deskripsi</span>';

                    // Logika Gambar (Gunakan placeholder jika kosong)
                    const gambarUrl = b.gambar
                        ? `/uploads/buku/${b.gambar}`
                        : 'https://via.placeholder.com/150x200?text=No+Cover';

                    tbody.innerHTML += `
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="p-4 text-center text-sm text-gray-500">${no++}</td>
                        
                        <td class="p-4">
                            <img src="${gambarUrl}" alt="Cover" class="w-24 h-32 object-cover rounded-lg shadow-sm border border-gray-100">
                        </td>

                        <td class="p-4">
                            <div class="font-bold text-gray-800">${b.judul}</div>
                            <div class="text-xs text-gray-500">Penulis: ${b.penulis}</div>
                        </td>

                        <td class="p-4 text-sm">
                            <div class="text-gray-700">${b.penerbit}</div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700">
                                ${b.kategori}
                            </span>
                        </td>

                        <td class="p-4 text-sm">
                            <div class="font-semibold text-green-600">${harga}</div>
                            <div class="text-xs text-gray-500">Stok: <span class="${b.stok < 5 ? 'text-red-500 font-bold' : ''}">${b.stok}</span></div>
                        </td>

                        <td class="p-4">
                            <p class="text-xs text-gray-500 max-w-xs leading-relaxed">
                                ${deskripsiSingkat}
                            </p>
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="/admin/buku/${b.id_buku}" class="text-blue-600 hover:text-blue-800 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <button onclick="deleteBuku(${b.id_buku})" class="text-red-600 hover:text-red-800 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>`;
                });
            }

            /* ===============================
            PAGINATION (SAMA DENGAN DASHBOARD)
            =============================== */
            function renderPagination(d) {
                pagination.innerHTML = '';

                const c = d.current_page;
                const l = d.last_page;

                // Helper untuk membuat tombol
                const createButton = (page, content, isActive = false, isDisabled = false) => {
                    const activeClass = isActive ?
                        'bg-green-600 text-white shadow-md shadow-green-200 border-green-600' :
                        'bg-white text-gray-600 hover:bg-gray-50 border-gray-200 hover:border-green-300';

                    const disabledClass = isDisabled ? 'opacity-50 cursor-not-allowed' :
                        'cursor-pointer active:scale-95';

                    return `
            <button onclick="${isDisabled ? '' : `loadData(${page})`}" 
                class="inline-flex items-center justify-center w-10 h-10 mx-1 text-sm font-medium transition-all border rounded-xl ${activeClass} ${disabledClass}">
                ${content}
            </button>
        `;
                };

                // Tombol Previous
                pagination.innerHTML += createButton(
                    c - 1,
                    `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>`,
                    false,
                    c === 1
                );

                // Logika Angka (Hanya tampilkan beberapa angka jika halaman terlalu banyak)
                let startPage = Math.max(1, c - 2);
                let endPage = Math.min(l, c + 2);

                if (startPage > 1) {
                    pagination.innerHTML += createButton(1, '1');
                    if (startPage > 2) pagination.innerHTML += `<span class="px-2 text-gray-400">...</span>`;
                }

                for (let i = startPage; i <= endPage; i++) {
                    pagination.innerHTML += createButton(i, i, i === c);
                }

                if (endPage < l) {
                    if (endPage < l - 1) pagination.innerHTML += `<span class="px-2 text-gray-400">...</span>`;
                    pagination.innerHTML += createButton(l, l);
                }

                // Tombol Next
                pagination.innerHTML += createButton(
                    c + 1,
                    `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>`,
                    false,
                    c === l
                );
            }

            /* ===============================
            DELETE
            =============================== */
            window.deleteBuku = function(id) {

                if(!confirm('Yakin ingin menghapus buku ini?')) return;

                fetch(`/api/admin/buku/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(r => r.json())
                .then(res => {

                    if(!res.status){
                        alert(res.message || 'Gagal menghapus data');
                        return;
                    }

                    alert(res.message);
                    loadData(currentPage);
                })
                .catch(()=>{
                    alert('Server error');
                });
            }


        });
    </script>



@endsection
