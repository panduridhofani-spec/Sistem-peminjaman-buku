@extends('layouts.admin')

@section('title', 'Tambah Buku Baru')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Buku Baru</h1>
    </div>

    <div class="bg-white rounded-xl shadow p-8">

        {{-- Optional: Alert untuk notifikasi global error --}}
        @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-300 bg-red-100 px-4 py-3 text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="judul" class="block mb-2"> Judul Buku: </label>
                    <input id="judul" name="judul" type="text" class="w-full p-2 border rounded-lg" value="{{ old('judul') }}">
                </div>

                <div class="mb-4">
                    <label for="penulis" class="block mb-2"> Penulis: </label>
                    <input id="penulis" name="penulis" type="text" class="w-full p-2 border rounded-lg" value="{{ old('penulis') }}">
                </div>

                <div class="mb-4">
                    <label for="penerbit" class="block mb-2"> Penerbit: </label>
                    <input id="penerbit" name="penerbit" type="text" class="w-full p-2 border rounded-lg" value="{{ old('penerbit') }}">
                </div>

                <div class="mb-4">
                    <label for="stok" class="block mb-2"> Stok: </label>
                    <input id="stok" name="stok" type="number" min="0" class="w-full p-2 border rounded-lg" value="{{ old('stok') }}">
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block mb-2"> Kategori: </label>
                    <select id="kategori" name="kategori" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('kategori') }}">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Fiksi">Fiksi</option>
                        <option value="Non-Fiksi">Non-Fiksi</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Sejarah">Sejarah</option>
                        <option value="Biografi">Biografi</option>
                        <option value="Sains">Sains</option>
                        <option value="Agama">Agama</option>
                        <option value="Seni">Seni</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block mb-2"> File Gambar: </label>
                    <input type="file" id="gambar" name="gambar"
                        class="p-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        value="{{ old('gambar') }}">
                    <small class="mt-1 text-xs text-gray-500">Max 2MB (JPG, PNG, GIF). Opsional.</small>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('buku.index') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-400">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-500 shadow-md">
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>

@endsection
