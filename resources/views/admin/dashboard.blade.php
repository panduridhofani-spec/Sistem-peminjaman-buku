@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
</div>

<!-- CARD STATISTIK -->
<div class="grid grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow p-6 text-center">
        <p class="text-gray-500">Jumlah Buku</p>
        <h2 class="text-2xl font-bold text-gray-800">520</h2>
    </div>

    <div class="bg-white rounded-xl shadow p-6 text-center">
        <p class="text-gray-500">Pengguna</p>
        <h2 class="text-2xl font-bold text-gray-800">134</h2>
    </div>

    <div class="bg-white rounded-xl shadow p-6 text-center">
        <p class="text-gray-500">Peminjaman Aktif</p>
        <h2 class="text-2xl font-bold text-gray-800">24</h2>
    </div>

    <div class="bg-white rounded-xl shadow p-6 text-center">
        <p class="text-gray-500">Pendapatan Bulan Ini</p>
        <h2 class="text-2xl font-bold text-gray-800">Rp 2.400.000</h2>
    </div>
</div>

<!-- GRAFIK -->
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <h2 class="text-lg font-semibold text-center mb-4">Peminjaman per Bulan</h2>
    <canvas id="chartPeminjaman"></canvas>
</div>

<!-- TABEL RIWAYAT -->
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4">Riwayat Peminjaman</h2>

    <table class="w-full border border-gray-200 text-center">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-3">Pengguna</th>
                <th class="border p-3">Buku</th>
                <th class="border p-3">Tanggal</th>
                <th class="border p-3">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border p-3">Rafi</td>
                <td class="border p-3">Dilan 1990</td>
                <td class="border p-3">28 Okt 2025</td>
                <td class="border p-3">
                    <span class="bg-green-500 text-white px-4 py-1 rounded-full text-sm">Selesai</span>
                </td>
            </tr>
            <tr>
                <td class="border p-3">Maya</td>
                <td class="border p-3">Laskar Pelangi</td>
                <td class="border p-3">29 Okt 2025</td>
                <td class="border p-3">
                    <span class="bg-yellow-500 text-white px-4 py-1 rounded-full text-sm">Dipinjam</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- CHART SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartPeminjaman');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr'],
        datasets: [{
            label: 'Jumlah Peminjaman',
            data: [10, 12, 22, 20],
        }]
    }
});
</script>

@endsection
