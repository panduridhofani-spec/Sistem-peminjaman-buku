@extends('layouts.admin')

@section('title', 'Data Booking')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manajemen Data Booking</h1>
</div>

{{-- SEARCH --}}
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <form class="max-w-md ml-auto" method="GET" autocomplete="off">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-width="2"
                          d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="query" value="{{ request('query') }}"
                   class="block w-full p-3 ps-9 border border-gray-300 rounded-lg text-sm focus:ring-green-500 focus:border-green-500"
                   placeholder="Cari booking..." />
            <button type="submit"
                    class="absolute end-1.5 bottom-1.5 bg-green-600 hover:bg-green-400 text-white text-xs font-medium px-3 py-1.5 rounded-md">
                Search
            </button>
        </div>
    </form>
</div>

{{-- TABLE --}}
<div class="bg-white rounded-xl shadow p-8">
    <div class="flex justify-between items-center mb-4">
        {{-- NOTIFIKASI --}}
        <div>
            @if(session('success'))
                <div class="text-sm font-semibold text-green-600 bg-green-100 p-2 rounded">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="text-sm font-semibold text-red-600 bg-red-100 p-2 rounded">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <a href="{{ route('booking.create') }}"
           class="bg-green-600 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
            Tambah Booking
        </a>
    </div>

    <table class="mb-4 w-full border border-gray-200 text-center">
        <thead class="bg-yellow-300">
            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">Pengguna</th>
                <th class="border p-3">Judul Buku</th>
                <th class="border p-3">Jumlah</th>
                <th class="border p-3">Tanggal</th>
                <th class="border p-3">Status</th>
                <th class="border p-3">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $item)
            <tr>
                <td class="border p-3">{{ $loop->iteration }}</td>
                <td class="border p-3">{{ $item['user']['nama_user'] ?? '-' }}</td>
                <td class="border p-3">{{ $item['buku']['judul'] ?? '-' }}</td>
                <td class="border p-3">{{ $item['jumlah_buku'] }}</td>
                <td class="border p-3">{{ $item['tanggal'] }}</td>
                <td class="border p-3">
                    @if($item['status_booking'] == 'dipinjam')
                        <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs">
                            Dipinjam
                        </span>
                    @elseif($item['status_booking'] == 'selesai')
                        <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">
                            Selesai
                        </span>
                    @else
                        <span class="bg-gray-400 text-white px-3 py-1 rounded-full text-xs">
                            {{ ucfirst($item['status_booking']) }}
                        </span>
                    @endif
                </td>
                <td class="border p-3">
                    <a href="{{ route('admin.booking.edit', $item['id_booking']) }}"
                       class="bg-green-600 hover:bg-green-400 text-white font-bold py-1 px-3 rounded text-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.booking.destroy', $item['id_booking']) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus booking ini?')"
                                class="bg-red-600 hover:bg-red-400 text-white font-bold py-1 px-3 rounded text-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="border p-4 text-gray-500">
                    Tidak ada data booking.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
