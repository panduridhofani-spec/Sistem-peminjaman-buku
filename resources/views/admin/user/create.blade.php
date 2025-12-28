@extends('layouts.admin')

@section('title', 'Tambah Pengguna Baru')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Tambah Pengguna Baru</h1>
    {{-- Tombol kembali --}}
    <a href="{{ route('user.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali ke Daftar</a>
</div>

<div class="bg-white rounded-xl shadow p-8">
    @if ($errors->any())
        <div class="mb-6 p-4 text-sm text-red-700 bg-red-100 rounded-lg border border-red-200">
            <h4 class="font-bold mb-1">Terjadi Kesalahan:</h4>
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form mengarah ke route user.store menggunakan metode POST --}}
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        
        {{-- Input Nama Pengguna --}}
        <div class="mb-4">
            <label for="nama_user" class="block text-sm font-medium text-gray-700 mb-1">Nama Pengguna <span class="text-red-500">*</span></label>
            <input type="text" id="nama_user" name="nama_user" value="{{ old('nama_user') }}" required
                   class="w-full p-2 border rounded-lg focus:ring-green-500 focus:border-green-500 {{ $errors->has('nama_user') ? 'border-red-500' : 'border-gray-300' }}">
            @error('nama_user')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="w-full p-2 border rounded-lg focus:ring-green-500 focus:border-green-500 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Password --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
            <input type="password" id="password" name="password" required
                   class="w-full p-2 border rounded-lg focus:ring-green-500 focus:border-green-500 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Input Alamat --}}
        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                      class="w-full p-2 border rounded-lg focus:ring-green-500 focus:border-green-500 {{ $errors->has('alamat') ? 'border-red-500' : 'border-gray-300' }}">{{ old('alamat') }}</textarea>
            @error('alamat')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Nomor HP --}}
        <div class="mb-6">
            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                   class="w-full p-2 border rounded-lg focus:ring-green-500 focus:border-green-500 {{ $errors->has('no_hp') ? 'border-red-500' : 'border-gray-300' }}">
            @error('no_hp')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Submit --}}
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">Simpan Pengguna</button>
    </form>
</div>

@endsection