@extends('layouts.admin')

@section('title', 'Data Buku')

@section('content')


    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Data Buku</h1>
    </div>

    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <form class="max-w-md ml-auto" method="GET" action="{{ route('buku.index') }}">
            <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="search" name="query" value="{{ request('query') }}"
                    class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                    placeholder="Search" />
                <button type="submit"
                    class="absolute end-1.5 bottom-1.5 text-white bg-green-600 hover:bg-green-400 box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-md text-xs px-3 py-1.5 focus:outline-none">Search</button>
            </div>
        </form>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- TABEL RIWAYAT -->
    <div class="bg-white rounded-xl shadow p-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('buku.create') }}"
                class="bg-green-600 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">Tambah Buku Baru</a>
        </div>

        <table class="mb-4 w-full border border-gray-200 text-center">
            <thead class="bg-yellow-300">
                <tr>
                    <th class="border p-3">No</th>
                    <th class="border p-3">Judul</th>
                    <th class="border p-3">Gambar</th>
                    <th class="border p-3">Penulis</th>
                    <th class="border p-3">Penerbit</th>
                    <th class="border p-3">Kategori</th>
                    <th class="border p-3">Stok</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Ambil nilai 'from' dari data API sebagai nomor awal --}}
                <?php $i = $data['from']; ?> 

                @forelse ($data['data'] as $item)
                    <tr>
                        {{-- Tampilkan nomor urut, lalu tambah 1 untuk baris berikutnya --}}
                        <td class="border p-3 text-center">{{ $i++ }}</td>
                        
                        <td class="border p-3">{{ $item['judul'] }}</td>
                        <td class="border p-3">
                            @if ($item['gambar'])
                                <img src="{{ asset('uploads/buku/' . $item['gambar']) }}" alt="{{ $item['judul'] }}"
                                    class="w-20 h-auto block mx-auto rounded shadow-sm">
                            @else
                                <p class="text-xs text-gray-400 text-center italic">Tidak ada gambar</p>
                            @endif
                        </td>
                        <td class="border p-3">{{ $item['penulis'] }}</td>
                        <td class="border p-3">{{ $item['penerbit'] }}</td>
                        <td class="border p-3">{{ $item['kategori'] }}</td>
                        <td class="border p-3 text-center">{{ $item['stok'] }}</td>
                        <td class="border p-3 text-center whitespace-nowrap">
                            <a href="{{ route('buku.edit', $item['id']) }}"
                                class="bg-green-600 hover:bg-green-500 text-white font-bold py-1 px-3 rounded text-sm transition-colors">Edit</a>
                            
                            <form action="{{ route('buku.destroy', $item['id']) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="bg-red-600 hover:bg-red-500 text-white font-bold py-1 px-3 rounded text-sm transition-colors">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="border p-10 text-center text-gray-500 italic">
                            Tidak ada data buku yang ditemukan.
                            @if (request('query'))
                                <br><span class="font-semibold text-red-400">Hasil pencarian untuk "{{ request('query') }}" tidak ditemukan.</span>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <!-- Pagination -->
        <div class="flex justify-center mt-8 caret-transparent select-none">
            @if ($data['links'])
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex items-center-space-x-px">
                        @foreach ($data['links'] as $item)
                            <li class="mx-1 list-none">
                                <a href="{{ $item['url2'] }}" 
                                class="{{ $item['active'] ? 'bg-yellow-400 text-purple-900' : 'bg-gray-700 text-white hover:bg-gray-600' }} 
                                        block px-4 py-2 rounded select-none cursor-pointer transition-colors">
                                    {!! str_replace(['&laquo;', '&raquo;', '«', '»'], '', $item['label']) !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endif
        </div>

    </div>

@endsection
