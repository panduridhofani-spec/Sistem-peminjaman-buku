@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Data Pengguna</h1>
    </div>

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
                    placeholder="Cari nama, email, atau no hp pengguna...">

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
            <h2 class="text-lg font-bold text-gray-800">Daftar Pengguna Sistem</h2>
            <a href="{{ route('user.create') }}"
                class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-2.5 px-5 rounded-xl transition-all shadow-md shadow-green-100 active:scale-95">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Pengguna
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-yellow-300 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider w-16">No</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Identitas Pengguna
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider">Alamat Utama</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider text-center">Role</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-700 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body" class="divide-y divide-gray-50">
                    <tr>
                        <td colspan="5" class="p-10 text-center text-gray-400">
                            Memuat data pengguna...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-50 bg-gray-50/30 flex flex-col md:flex-row items-center justify-between gap-4">
            <div id="pagination-footer" class="hidden flex w-full flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <label for="jump-page">Halaman</label>
                    <input type="number" id="jump-page" oninput="jumpToPage()" min="1"
                        class="w-16 p-2 border border-gray-200 rounded-lg text-center focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none transition-all">
                </div>
                <div id="pagination-container" class="flex justify-center select-none"></div>
            </div>
        </div>
    </div>

    <script>
        let searchTimer = null;
        let jumpTimer = null;
        let lastPageGlobal = 1;

        document.getElementById('search-input').addEventListener('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                loadData(1);
            }, 400);
        });

        document.addEventListener('DOMContentLoaded', () => {
            loadData(1);
        });

        function loadData(page = 1){

let token = localStorage.getItem('token');
const search = document.getElementById('search-input').value || '';

if(!token){
document.getElementById('table-body').innerHTML=`
<tr>
<td colspan="5" class="p-10 text-center text-red-500">
TOKEN TIDAK ADA - LOGIN ULANG
</td>
</tr>`;
return;
}

fetch(`/api/admin/user?page=${page}&search=${search}`,{
headers:{
'Authorization':'Bearer '+token,
'Accept':'application/json'
}
})
.then(async r=>{

let text = await r.text();
console.log('RESPONSE:',text); // DEBUG

let res = JSON.parse(text);

let data = res.data;

renderTable(data);
renderPagination(data);

})
.catch(err=>{
console.log('ERROR:',err);

document.getElementById('table-body').innerHTML=`
<tr>
<td colspan="5" class="p-10 text-center text-red-500">
GAGAL LOAD DATA
</td>
</tr>`;
});
}




        function renderTable(data) {
            const tbody = document.getElementById('table-body');
            tbody.innerHTML = '';

            if (!data.data || data.data.length === 0) {
                tbody.innerHTML =
                    '<tr><td colspan="5" class="p-10 text-center text-gray-400">Tidak ada data pengguna.</td></tr>';
                return;
            }

            data.data.forEach((item, index) => {
                // --- LOGIKA MENGAMBIL ALAMAT UTAMA DARI RELASI ---
                let alamatHtml = '';

                if (item.addresses && item.addresses.length > 0) {
                    // Karena di backend sudah di-sort is_default DESC, 
                    // maka index [0] otomatis adalah alamat utama.
                    const main = item.addresses[0];

                    alamatHtml = `
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="bg-green-100 text-green-700 text-[9px] px-1.5 py-0.5 rounded font-bold uppercase">Utama</span>
                            <span class="font-bold text-gray-800 text-[11px]">${main.penerima}</span>
                        </div>
                        <div class="text-gray-500 leading-snug line-clamp-2">
                            ${main.alamat_lengkap}, Kel. ${main.kelurahan}, Kec. ${main.kecamatan}, ${main.kode_pos}
                        </div>
                        <div class="text-[10px] text-blue-600 mt-1 font-medium">📞 ${main.telepon}</div>
                    `;
                } else {
                    alamatHtml = `
                        <div class="flex flex-col items-center justify-center p-2 border border-dashed border-gray-200 rounded-lg">
                            <span class="text-[10px] text-gray-400 italic">Belum setting alamat utama</span>
                        </div>
                    `;
                }

                tbody.innerHTML += `
                <tr class="hover:bg-gray-50 transition-colors border-b border-gray-50">
                    <td class="p-4 text-center text-gray-400 text-sm font-medium">${data.from + index}</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-700 font-bold text-xs">
                                ${item.nama_user.charAt(0)}
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">${item.nama_user}</div>
                                <div class="text-[11px] text-gray-400">${item.email}</div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="p-4 text-[11px] max-w-[280px]">
                        ${alamatHtml}
                    </td>

                    <td class="p-4 text-center">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase border ${item.role === 'admin' ? 'bg-purple-50 text-purple-700 border-purple-100' : 'bg-blue-50 text-blue-700 border-blue-100'}">
                            ${item.role}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex justify-center gap-2">
                            <a href="/admin/user/${item.id_user}/edit" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <button onclick="deleteUser(${item.id_user})" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>`;
            });
        }

        function renderPagination(data) {
            const container = document.getElementById('pagination-container');
            if (!data.links || data.last_page <= 1) return container.innerHTML = '';

            const current = data.current_page;
            const last = data.last_page;
            const baseClass =
                "flex items-center justify-center border border-gray-200 text-sm font-medium h-9 focus:outline-none transition-all relative z-10";
            const normalClass = "text-gray-600 bg-white hover:bg-gray-50 hover:text-gray-900";
            const activeClass = "text-green-600 bg-green-50 border-green-200 z-20 font-bold";
            const dotClass = "w-9 text-gray-400 bg-gray-50 cursor-default";

            let html = `<nav class="flex items-center"><ul class="flex -space-x-px text-sm">`;
            html +=
                `<li><button ${current > 1 ? `onclick="loadData(${current - 1})"` : 'disabled'} class="${baseClass} px-3 rounded-s-lg ${normalClass} disabled:opacity-50">Previous</button></li>`;
            html +=
                `<li><button onclick="loadData(1)" class="${baseClass} w-9 ${current === 1 ? activeClass : normalClass}">1</button></li>`;
            if (current > 3) html += `<li><span class="${baseClass} ${dotClass}">...</span></li>`;
            for (let i = Math.max(2, current - 1); i <= Math.min(last - 1, current + 1); i++) {
                html +=
                    `<li><button onclick="loadData(${i})" class="${baseClass} w-9 ${i === current ? activeClass : normalClass}">${i}</button></li>`;
            }
            if (current < last - 2) html += `<li><span class="${baseClass} ${dotClass}">...</span></li>`;
            if (last > 1) html +=
                `<li><button onclick="loadData(${last})" class="${baseClass} w-9 ${current === last ? activeClass : normalClass}">${last}</button></li>`;
            html +=
                `<li><button ${current < last ? `onclick="loadData(${current + 1})"` : 'disabled'} class="${baseClass} px-3 rounded-e-lg ${normalClass} disabled:opacity-50">Next</button></li>`;
            html += `</ul></nav>`;
            container.innerHTML = html;
        }

        function jumpToPage() {
            const input = document.getElementById('jump-page');
            const page = parseInt(input.value);
            clearTimeout(jumpTimer);
            if (!input.value || isNaN(page)) return;
            jumpTimer = setTimeout(() => {
                if (page >= 1 && page <= lastPageGlobal) loadData(page);
            }, 500);
        }

        function deleteUser(id) {

            if (!confirm('Yakin hapus user ini?')) return;

            fetch(`/api/admin/user/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'Accept': 'application/json'
                    }
                })
                .then(r => r.json())
                .then(res => {
                    alert(res.message);
                    loadData(1);
                });
        }
    </script>
@endsection
