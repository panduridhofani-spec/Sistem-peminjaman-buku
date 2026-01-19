@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    </div>

    <!-- CARD STATISTIK -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

        <div class="bg-white rounded-xl shadow p-6 text-center">
            <p class="text-gray-500">Jumlah Buku</p>
            <h2 id="totalBuku" class="text-2xl font-bold">-</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6 text-center">
            <p class="text-gray-500">Pengguna</p>
            <h2 id="totalUser" class="text-2xl font-bold">-</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6 text-center">
            <p class="text-gray-500">Total Pesanan</p>
            <h2 id="totalPesanan" class="text-2xl font-bold">-</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6 text-center">
            <p class="text-gray-500">Pendapatan</p>
            <h2 id="totalRevenue" class="text-2xl font-bold">Rp -</h2>
        </div>

    </div>

    <!-- GRAFIK -->
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="text-lg font-semibold text-center mb-4">Transaksi per Bulan</h2>
        <canvas id="chartPeminjaman"></canvas>
    </div>

    <!-- TABEL -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Riwayat Terbaru</h2>

        <table class="w-full border text-sm text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-3">User</th>
                    <th class="border p-3">Buku</th>
                    <th class="border p-3">Tanggal</th>
                    <th class="border p-3">Status</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td colspan="4" class="p-6 text-gray-400">Loading...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const token = localStorage.getItem('token');
        if (!token) location.href = '/login';

        // ==================
        // HELPER API
        // ==================
        function api(url) {
            return fetch('/api' + url, {
                headers: {
                    Authorization: 'Bearer ' + token,
                    Accept: 'application/json'
                }
            }).then(r => r.json());
        }

        // ==================
        // LOAD DASHBOARD
        // ==================
        api('/admin/dashboard').then(r => {

            // CARD
            totalBuku.innerText = r.total_buku;
            totalUser.innerText = r.total_user;
            totalPesanan.innerText = r.total_pesanan;
            totalRevenue.innerText =
                'Rp ' + Number(r.revenue).toLocaleString('id-ID');

            // CHART
            renderChart(r.chart);

            // TABLE
            renderTable(r.riwayat);
        });

        // ==================
        // TABLE
        // ==================
        function renderTable(data) {

            if (!data.length) {
                tableBody.innerHTML = `
<tr>
<td colspan="4" class="p-6 text-gray-400">
Belum ada data
</td>
</tr>`;
                return;
            }

            let html = '';

            data.forEach(p => {

                html += `
<tr>
<td class="border p-3">${p.user}</td>
<td class="border p-3">${p.buku}</td>
<td class="border p-3">${formatDate(p.tanggal)}</td>
<td class="border p-3">
<span class="px-3 py-1 rounded-full text-white
${p.status=='selesai'?'bg-green-500':'bg-yellow-500'}">
${p.status}
</span>
</td>
</tr>
`;
            });

            tableBody.innerHTML = html;
        }

        // ==================
        // CHART
        // ==================
        let chart;

        function renderChart(data) {

            const ctx = document.getElementById('chartPeminjaman');

            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Jumlah Transaksi',
                        data: data.values
                    }]
                }
            });
        }

        // ==================
        // FORMAT
        // ==================
        function formatDate(d) {
            return new Date(d).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });
        }
    </script>

@endsection
