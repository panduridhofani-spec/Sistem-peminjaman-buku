@extends('layouts.admin')

@section('title', 'Edit Buku ' . $data['judul'])

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Buku {{ $data['judul'] }}</h1>
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
        <form action="{{ route('buku.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="judul" class="block mb-2"> Judul Buku: </label>
                    <input id="judul" name="judul" type="text" class="w-full p-2 border rounded-lg"
                        value="{{ $data['judul'] }}">
                </div>

                <div class="mb-4">
                    <label for="penulis" class="block mb-2"> Penulis: </label>
                    <input id="penulis" name="penulis" type="text" class="w-full p-2 border rounded-lg"
                        value="{{ $data['penulis'] }}">
                </div>

                <div class="mb-4">
                    <label for="penerbit" class="block mb-2"> Penerbit: </label>
                    <input id="penerbit" name="penerbit" type="text" class="w-full p-2 border rounded-lg"
                        value="{{ $data['penerbit'] }}">
                </div>

                <div class="mb-4">
                    <label for="stok" class="block mb-2"> Stok: </label>
                    <input id="stok" name="stok" type="number" min="0" class="w-full p-2 border rounded-lg"
                        value="{{ $data['stok'] }}">
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block mb-2"> Kategori: </label>
                    <select id="kategori" name="kategori" class="w-full p-2 border rounded-lg">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Fiksi" {{ $data['kategori']=='Fiksi' ? 'selected' : '' }}>Fiksi</option>
                        <option value="Non-Fiksi" {{ $data['kategori']=='Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                        <option value="Pendidikan" {{ $data['kategori']=='Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        <option value="Teknologi" {{ $data['kategori']=='Teknologi' ? 'selected' : '' }}>Teknologi</option>
                        <option value="Sejarah" {{ $data['kategori']=='Sejarah' ? 'selected' : '' }}>Sejarah</option>
                        <option value="Biografi" {{ $data['kategori']=='Biografi' ? 'selected' : '' }}>Biografi</option>
                        <option value="Sains" {{ $data['kategori']=='Sains' ? 'selected' : '' }}>Sains</option>
                        <option value="Agama" {{ $data['kategori']=='Agama' ? 'selected' : '' }}>Agama</option>
                        <option value="Seni" {{ $data['kategori']=='Seni' ? 'selected' : '' }}>Seni</option>
                    </select>

                </div>

                <div class="mb-4">
                    <label for="gambar" class="block mb-2"> File Gambar: </label>
                    <input type="file" id="gambar" name="gambar"
                        class="p-2 block w-full text-sm border rounded-lg">

                    @if($data['gambar'])
                        <p class="mt-1 text-sm text-gray-500">
                            Gambar saat ini: {{ $data['gambar'] }}
                        </p>
                    @endif
                    <small class="mt-1 text-xs text-gray-500">Max 2MB (JPG, PNG, GIF). Opsional.</small>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('buku.index') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-400">
                    Batal Edit
                </a>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-500 shadow-md">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

@endsection
