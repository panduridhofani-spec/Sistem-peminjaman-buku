@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manajemen Data Pengguna</h1>
</div>

<div class="bg-white rounded-xl shadow p-6 mb-6">
    <form class="max-w-md ml-auto" method="GET" autocomplete="off" action="{{ route('user.index') }}"> 
        <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
            </div>
            <input type="search" id="search" name="query" value="{{ request('query') }}"
                   class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Search" />
            <button type="submit" class="absolute end-1.5 bottom-1.5 text-white bg-green-600 hover:bg-green-400 box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-md text-xs px-3 py-1.5 focus:outline-none">Search</button>
        </div>
    </form>
</div>

<div class="bg-white rounded-xl shadow p-8">
    <div class="flex justify-between items-center mb-4">
        {{-- Pesan Sukses atau Error --}}
        <div>
            @if(session('success'))
                <div class="text-sm font-semibold text-green-600 bg-green-100 p-2 rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="text-sm font-semibold text-red-600 bg-red-100 p-2 rounded">{{ session('error') }}</div>
            @endif
        </div>
        
        <a href="{{ route('user.create') }}" class="bg-green-600 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">Tambah Pengguna Baru</a>
    </div>
    
    <table class="mb-4 w-full border border-gray-200 text-center">
        <thead class="bg-yellow-300">
            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">Nama</th>
                <th class="border p-3">Email</th>
                <th class="border p-3">No. HP</th>
                <th class="border p-3">Alamat</th>
                <th class="border p-3">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $item)
            <tr>
                <td class="border p-3">{{ $loop->iteration }}</td>
                <td class="border p-3">{{ $item['nama_user']}}</td>
                <td class="border p-3">{{ $item['email']}}</td>
                <td class="border p-3">{{ $item['no_hp']}}</td>
                <td class="border p-3">{{ $item['alamat']}}</td>
                <td class="border p-3">
                    <a href="{{ route('user.edit', $item['id_user']) }}" class="my-4 bg-green-600 hover:bg-green-400 text-white font-bold py-[4px] px-[8px] rounded">Edit</a>
                    <form action="{{ route('user.destroy', $item['id_user']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="my-4 bg-red-600 hover:bg-red-400 text-white font-bold py-[3px] px-[8px] rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="border p-3 text-center text-gray-500">
                    Tidak ada data buku yang ditemukan.
                    @if(request('query'))
                        Hasil pencarian untuk "{{ request('query') }}" tidak ditemukan.
                    @endif
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection