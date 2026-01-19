@extends('layouts.admin')

@section('title', 'Tambah Buku Baru')

@section('content')

    <div class="flex justify-between items-center mb-2">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Tambah Buku Baru
            </h1>
            <p class="text-gray-500 mt-1">
                Lengkapi informasi di bawah untuk menambahkan buku ke katalog
            </p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

        <!-- ERROR BOX -->
        <div id="error-box" class="hidden mb-6 rounded-xl border-l-4 border-red-500 bg-red-50 p-4 text-red-800">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-bold">Terjadi Kesalahan:</span>
            </div>
            <ul id="error-list" class="list-disc list-inside text-sm space-y-1"></ul>
        </div>

        <!-- FORM -->
        <form id="create-form" enctype="multipart/form-data">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                <div>
                    <label class="text-sm font-semibold">Judul Buku</label>
                    <input name="judul" required class="w-full px-4 py-2.5 border rounded-xl">
                </div>

                <div>
                    <label class="text-sm font-semibold">Penulis</label>
                    <input name="penulis" required class="w-full px-4 py-2.5 border rounded-xl">
                </div>

                <div>
                    <label class="text-sm font-semibold">Penerbit</label>
                    <input name="penerbit" required class="w-full px-4 py-2.5 border rounded-xl">
                </div>

                <div>
                    <label class="text-sm font-semibold">Kategori</label>
                    <select name="kategori" required class="w-full px-4 py-2.5 border rounded-xl">
                        <option value="">-- Pilih --</option>
                        <option>Fiksi</option>
                        <option>Non-Fiksi</option>
                        <option>Pendidikan</option>
                        <option>Teknologi</option>
                        <option>Sejarah</option>
                        <option>Biografi</option>
                        <option>Sains</option>
                        <option>Agama</option>
                        <option>Seni</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-semibold">Harga</label>
                    <input name="harga" type="number" required class="w-full px-4 py-2.5 border rounded-xl">
                </div>

                <div>
                    <label class="text-sm font-semibold">Stok</label>
                    <input name="stok" type="number" required class="w-full px-4 py-2.5 border rounded-xl">
                </div>

                <div class="md:col-span-2">
                    <label class="text-sm font-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full px-4 py-2.5 border rounded-xl"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="text-sm font-semibold">Gambar</label>
                    <input type="file" name="gambar" id="gambar">
                    <p id="file-name" class="text-sm text-green-600 hidden"></p>
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('buku.index') }}" class="px-6 py-2 border rounded-xl">
                    Batal
                </a>

                <button class="px-8 py-2 bg-green-600 text-white rounded-xl">
                    Simpan Buku
                </button>
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /* TOKEN */
            const token = localStorage.getItem('token');
            if (!token) {
                location.href = '/login';
                return;
            }

            const form = document.getElementById('create-form');
            const gambar = document.getElementById('gambar');
            const fileName = document.getElementById('file-name');
            const errorBox = document.getElementById('error-box');
            const errorList = document.getElementById('error-list');

            /* PREVIEW FILE */
            gambar.onchange = () => {
                if (gambar.files[0]) {
                    fileName.innerText =
                        'File: ' + gambar.files[0].name;
                    fileName.classList.remove('hidden');
                }
            }

            /* SUBMIT */
            form.onsubmit = e => {
                e.preventDefault();

                errorBox.classList.add('hidden');
                errorList.innerHTML = '';

                const fd = new FormData(form);

                fetch('/api/admin/buku', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        body: fd
                    })

                    .then(r => r.json())
                    .then(res => {

                        if (!res.status) {
                            showErrors(res.errors);
                            return;
                        }

                        location.href = "{{ route('buku.index') }}";
                    })
                    .catch(err => {
                        console.log(err);
                        alert('Server error, cek console!');
                    });
            }

            /* ERROR */
            function showErrors(err) {
                errorBox.classList.remove('hidden');

                Object.values(err).forEach(e => {
                    errorList.innerHTML +=
                        `<li>${e[0]}</li>`;
                });

                scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

        });
    </script>

@endsection
