@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900">Edit Detail Buku</h1>
            <p class="text-gray-500 mt-1">Form pembaruan informasi katalog buku</p>
        </div>
        <a href="{{ route('buku.index') }}" class="text-gray-600 hover:text-gray-800 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

        <div id="error-box" class="hidden mb-6 rounded-xl border-l-4 border-red-500 bg-red-50 p-4 text-red-800">
            <b class="block mb-1">Terjadi kesalahan:</b>
            <ul id="error-list" class="list-disc list-inside text-sm space-y-1"></ul>
        </div>

        <form id="edit-form">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Buku</label>
                        <input id="judul" name="judul" type="text" class="input"
                            placeholder="Masukkan judul lengkap">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penulis</label>
                        <input id="penulis" name="penulis" type="text" class="input" placeholder="Nama penulis">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Harga (Rp)</label>
                            <input id="harga" name="harga" type="number" class="input" placeholder="Contoh: 50000">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Stok</label>
                            <input id="stok" name="stok" type="number" class="input" placeholder="Jumlah stok">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penerbit</label>
                        <input id="penerbit" name="penerbit" type="text" class="input" placeholder="Nama penerbit">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <select id="kategori" name="kategori" class="input">
                            <option value="">Pilih Kategori</option>
                            <option>Fiksi</option>
                            <option>Non-Fiksi</option>
                            <option>Pendidikan</option>
                            <option>Teknologi</option>
                            <option>Sejarah</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Buku</label>
                        <textarea id="deskripsi" name="deskripsi" rows="6" class="input"
                            placeholder="Tuliskan sinopsis atau deskripsi singkat..."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cover Buku</label>
                        <div class="flex items-start gap-4">
                            <div
                                class="w-32 h-44 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl overflow-hidden flex items-center justify-center relative group">
                                <img id="img-preview" src="" class="hidden w-full h-full object-cover">
                                <div id="placeholder-text" class="text-center p-2 text-gray-400 text-xs">
                                    Belum ada gambar
                                </div>
                            </div>

                            <div class="flex-1">
                                <input id="gambar" name="gambar" type="file" accept="image/*" class="input text-xs">
                                <p class="mt-2 text-xs text-gray-500 italic" id="gambar-lama-info"></p>
                                <p class="mt-1 text-[10px] text-gray-400">*Format: JPG, PNG, WEBP (Maks. 2MB)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end gap-4">
                <a href="{{ route('buku.index') }}"
                    class="px-6 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-100 transition-all">
                    Batal
                </a>
                <button type="submit"
                    class="bg-green-600 text-white px-8 py-2.5 rounded-xl text-sm font-bold hover:bg-green-700 shadow-lg shadow-green-100 active:scale-95 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const bukuId = window.location.pathname.split('/').pop();
            const token = localStorage.getItem('token');

            const form = document.getElementById('edit-form');
            const errorBox = document.getElementById('error-box');
            const errorList = document.getElementById('error-list');
            const imgPreview = document.getElementById('img-preview');
            const placeholderText = document.getElementById('placeholder-text');
            const gambarInput = document.getElementById('gambar');
            const infoGambar = document.getElementById('gambar-lama-info');

            if (!token) {
                location.href = '/login';
                return;
            }

            /* ===============================
               LOAD DATA
            =============================== */
            fetch(`/api/buku/${bukuId}`)
                .then(r => r.json())
                .then(res => {

                    if (!res.status) {
                        alert('Data tidak ditemukan');
                        return;
                    }

                    const d = res.data;

                    judul.value = d.judul ?? '';
                    penulis.value = d.penulis ?? '';
                    penerbit.value = d.penerbit ?? '';
                    kategori.value = d.kategori ?? '';
                    harga.value = d.harga ?? 0;
                    stok.value = d.stok ?? 0;
                    deskripsi.value = d.deskripsi ?? '';

                    /* PREVIEW GAMBAR LAMA */
                    if (d.gambar) {
                        imgPreview.src = `/uploads/buku/${d.gambar}`;
                        imgPreview.classList.remove('hidden');
                        placeholderText.classList.add('hidden');

                        infoGambar.innerText = 'File saat ini: ' + d.gambar;
                    }
                });

            /* ===============================
               PREVIEW GAMBAR BARU
            =============================== */
            gambarInput.addEventListener('change', function() {

                const file = this.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = e => {
                    imgPreview.src = e.target.result;
                    imgPreview.classList.remove('hidden');
                    placeholderText.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            });

            /* ===============================
               SUBMIT UPDATE
            =============================== */
            form.addEventListener('submit', e => {

                e.preventDefault();

                errorBox.classList.add('hidden');
                errorList.innerHTML = '';

                const fd = new FormData(form);
                fd.append('_method', 'PUT');

                fetch(`/api/admin/buku/${bukuId}`, {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'Accept': 'application/json'
                        },
                        body: fd
                    })
                    .then(r => r.json())
                    .then(res => {

                        if (!res.status) {
                            showError(res.errors);
                            return;
                        }

                        alert('Berhasil update buku');
                        location.href = "{{ route('buku.index') }}";
                    })
                    .catch(() => {
                        alert('Server error');
                    });
            });

            /* ===============================
               ERROR HANDLER
            =============================== */
            function showError(err) {

                errorBox.classList.remove('hidden');
                errorList.innerHTML = '';

                Object.values(err).forEach(e => {
                    errorList.innerHTML += `<li>${e[0]}</li>`;
                });

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

        });
    </script>


    <style>
        .input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            outline: none;
            font-size: 0.875rem;
            transition: all 0.2s;
            background-color: #f9fafb;
        }

        .input:focus {
            border-color: #059669;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1);
        }

        textarea.input {
            resize: vertical;
            min-height: 140px;
        }
    </style>

@endsection
