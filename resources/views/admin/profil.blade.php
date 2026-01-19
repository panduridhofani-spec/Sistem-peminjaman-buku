@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('content')

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Profil Administrator</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola kredensial dan informasi akun sistem Anda</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
                    <div class="bg-gray-50/50 p-8 text-center border-b border-gray-50">
                        <div class="relative inline-block">
                            <div class="w-24 h-24 rounded-2xl bg-white p-1 shadow-sm border border-gray-100 mx-auto">
                                <img id="avatar" class="w-full h-full rounded-xl object-cover"
                                    src="https://ui-avatars.com/api/?name=Admin&background=ebf2ff&color=2563eb&bold=true&size=128">
                            </div>
                            <div class="absolute -bottom-1 -right-1 bg-green-500 p-1.5 rounded-lg shadow-sm border-2 border-white">
                                <i class="ri-checkbox-circle-fill text-white text-[10px]"></i>
                            </div>
                        </div>
                        
                        <h2 id="profileNameSide" class="text-lg font-bold text-gray-800 mt-4 tracking-tight">Loading...</h2>
                        <span id="detailRoleBadge" class="inline-flex px-3 py-1 mt-2 rounded-full text-[10px] font-bold uppercase tracking-widest bg-blue-50 text-blue-600 border border-blue-100">
                            ADMINISTRATOR
                        </span>
                    </div>

                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 font-medium">Status Akun</span>
                            <span class="font-bold text-green-600">Aktif</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 font-medium">Level Akses</span>
                            <span class="font-bold text-blue-600">Full Access</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-8 py-5 border-b border-gray-50 bg-gray-50/30">
                        <h3 class="font-bold text-gray-800">Detail Informasi Pribadi</h3>
                    </div>
                    
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-1">
                                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">ID Administrator</label>
                                <p id="detailId" class="text-blue-600 font-bold bg-blue-50/50 px-3 py-1 rounded-lg inline-block text-sm">-</p>
                            </div>

                            <div class="space-y-1">
                                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Nama Lengkap</label>
                                <p id="detailName" class="text-gray-800 font-semibold text-base">-</p>
                            </div>

                            <div class="space-y-1">
                                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Email Sistem</label>
                                <p id="detailEmail" class="text-gray-600 font-medium">-</p>
                            </div>

                            <div class="space-y-1">
                                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">WhatsApp</label>
                                <p id="detailPhone" class="text-gray-600 font-medium">-</p>
                            </div>

                            <div class="md:col-span-2 space-y-1">
                                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Alamat Lengkap</label>
                                <p id="detailAlamat" class="text-gray-600 font-medium leading-relaxed">-</p>
                            </div>

                            <div class="md:col-span-2 pt-4 border-t border-gray-50">
                                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Terdaftar Pada</label>
                                <p id="detailDate" class="text-gray-500 text-sm mt-1">-</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <button onclick="openEditModal()"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-bold py-4 px-6 rounded-xl transition-all shadow-sm flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit Profil Saya
                    </button>

                    <button id="logoutBtn"
                        class="bg-white hover:bg-red-50 text-red-600 border border-red-100 font-bold py-4 px-8 rounded-xl transition-all active:scale-95 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-black/60 hidden z-50 flex items-center justify-center backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden transform transition-all">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
                <h3 class="text-lg font-bold text-gray-800">Perbarui Profil</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="editForm" class="p-8 space-y-5">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1">Nama Lengkap</label>
                    <input type="text" id="editNama" name="nama_user" required
                        class="block w-full p-4 border border-gray-200 rounded-xl text-sm transition-all focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1">Nomor WhatsApp</label>
                    <input type="text" id="editPhone" name="no_hp"
                        class="block w-full p-4 border border-gray-200 rounded-xl text-sm transition-all focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1">Alamat Lengkap</label>
                    <textarea id="editAlamatInput" name="alamat" rows="3"
                        class="block w-full p-4 border border-gray-200 rounded-xl text-sm transition-all focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none resize-none"></textarea>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="button" onclick="closeEditModal()"
                        class="flex-1 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-bold text-sm transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-[2] py-3.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold text-sm transition-all shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const token = localStorage.getItem('token');
        const modal = document.getElementById('editModal');
        let currentUserData = null;

        if (!token) location.href = '/login';

        function fetchProfile() {
            fetch('/api/me', {
                headers: { 
                    'Authorization': 'Bearer ' + token, 
                    'Accept': 'application/json' 
                }
            })
            .then(res => res.json())
            .then(r => {
                if(r.data) {
                    currentUserData = r.data;
                    updateUI(r.data);
                }
            })
            .catch(err => console.error("Error loading profile:", err));
        }

        function updateUI(a) {
            document.getElementById('detailId').innerText = `#ORD-${a.id_user}`;
            document.getElementById('profileNameSide').innerText = a.nama_user;
            document.getElementById('detailName').innerText = a.nama_user;
            document.getElementById('detailEmail').innerText = a.email;
            document.getElementById('detailPhone').innerText = a.no_hp || 'Tidak ada nomor';
            document.getElementById('detailAlamat').innerText = a.alamat || 'Alamat belum diatur';
            
            document.getElementById('detailDate').innerText = new Date(a.created_at).toLocaleDateString('id-ID', {
                day: 'numeric', month: 'long', year: 'numeric'
            });

            document.getElementById('avatar').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(a.nama_user)}&background=ebf2ff&color=2563eb&bold=true&size=128`;
        }

        function openEditModal() {
            if (!currentUserData) return;
            document.getElementById('editNama').value = currentUserData.nama_user;
            document.getElementById('editPhone').value = currentUserData.no_hp || '';
            document.getElementById('editAlamatInput').value = currentUserData.alamat || '';
            modal.classList.remove('hidden');
        }

        function closeEditModal() {
            modal.classList.add('hidden');
        }

        document.getElementById('editForm').onsubmit = (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalText = btn.innerText;
            btn.innerText = 'Menyimpan...';
            btn.disabled = true;

            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());

            fetch('/api/admin/profile/update', { 
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(res => {
                closeEditModal();
                fetchProfile();
            })
            .catch(err => alert("Gagal memperbarui profil"))
            .finally(() => {
                btn.innerText = originalText;
                btn.disabled = false;
            });
        };

        document.getElementById('logoutBtn').onclick = () => {
            if (!confirm('Apakah Anda yakin ingin keluar?')) return;
            fetch('/api/logout', {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token }
            }).finally(() => {
                localStorage.clear();
                location.href = '/';
            });
        }

        fetchProfile();
    </script>

@endsection