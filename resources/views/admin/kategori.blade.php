@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kategori Buku</h1>
</div>


<div class="bg-white rounded-xl shadow p-6 mb-6">
    <form class="max-w-md ml-auto">   
        <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
            </div>
            <input type="search" id="search" class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Search" required />
            <button type="button" class="absolute end-1.5 bottom-1.5 text-white bg-green-600 hover:bg-green-500 box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-md text-xs px-3 py-1.5 focus:outline-none">Search</button>
        </div>
    </form>
</div>

<!-- TABEL RIWAYAT -->
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4">Kategori Buku</h2>

    <table class="w-full border border-gray-200 text-center">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">ID Kategori</th>
                <th class="border p-3">Nama kategori</th>
                <th class="border p-3">Jumlah Buku</th>
                <th class="border p-3">Keterangan</th>
                <th class="border p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
            </tr>
            <tr>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
                <td class="border p-3"></td>
            </tr>
        </tbody>
    </table>
</div>


@endsection