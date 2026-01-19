<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Alamat | BukuBareng</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <div class="pt-12 px-4 md:px-12">
        <div class="max-w-xl mx-auto p-8">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">
                <a href="/alamat"
                    class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Ubah Alamat</span>
                </a>

                <div class="flex items-center space-x-4 text-white">
                    <a href="/keranjang" class="hover:text-yellow-400 transition">
                        <i class="fa-solid fa-bag-shopping text-xl"></i>
                    </a>
                    <a href="/dashboard_after_login"
                        class="hover:text-yellow-400 transition flex items-center space-x-2">
                        <i class="fa-solid fa-home text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- FORM -->
            <div
                class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-yellow-400">

                <h2 class="text-2xl font-bold mb-6 border-b border-purple-700 pb-3">
                    Edit Detail Alamat
                </h2>

                <form id="editAddressForm">

                    <input type="hidden" id="address_id">

                    <div class="mb-4">
                        <label class="block text-sm mb-2">Nama Penerima</label>
                        <input type="text" id="penerima" required
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-2">Nomor Telepon</label>
                        <input type="tel" id="telepon" required
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-2">Alamat Lengkap</label>
                        <textarea id="alamat_lengkap" rows="3" required
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 text-white resize-none"></textarea>
                    </div>

                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-2">Kecamatan</label>
                            <select id="kecamatan" required
                                class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 text-white"></select>
                        </div>
                        <div>
                            <label class="block text-sm mb-2">Kelurahan</label>
                            <select id="kelurahan" required disabled
                                class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 text-white"></select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm mb-2">Kode Pos</label>
                        <input type="text" id="kode_pos" required
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 text-white">
                    </div>

                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="set_default"
                            class="w-4 h-4 text-yellow-400 bg-purple-900 border-purple-500 rounded">
                        <label class="ml-2 text-sm">Jadikan sebagai alamat utama</label>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="py-3 px-8 rounded-full font-bold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition shadow-lg">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {

    const token = localStorage.getItem('token');
    if (!token) {
        alert('Silakan login ulang');
        location.href = '/login';
        return;
    }

    const kecamatanSelect = document.getElementById('kecamatan');
    const kelurahanSelect = document.getElementById('kelurahan');
    const form = document.getElementById('editAddressForm');

    const areaData = {
        sukun: ['Bandulan','Bakaalankrajan','Ciptomulyo','Gadang','Karangbesuki','Kebonsari','Mulyorejo','Pisangcandi','Sukun'],
        lowokwaru: ['Dinoyo','Jatimulyo','Ketawanggede','Lowokwaru','Merjosari','Mojolangu','Sumbersari','Tasikmadu','Tlogomas','Tulusrejo','Tunggulwulung','Tunjungsekar'],
        blimbing: ['Arjosari','Balearjosari','Blimbing','Bunulrejo','Jodipan','Kesatrian','Pandanwangi','Polehan','Polowijen','Purwantoro','Purwodadi'],
        klojen: ['Bareng','Gadingsari','Kasin','Kauman','Kiduldalem','Klojen','Oro oro Dowo','Penanggungan','Rampal Celaket','Samaan','Sukoharjo'],
        kedungkandang: ['Arjowinangun','Bumiayu','Buring','Cemorokandang','Kedungkandang','Kotalama','Lesanpuro','Madyopuro','Mergosono','Sawojajar','Tlogowaru','Wonokoyo']
    };

    const kecamatanNames = {
        sukun: 'Sukun',
        lowokwaru: 'Lowokwaru',
        blimbing: 'Blimbing',
        klojen: 'Klojen',
        kedungkandang: 'Kedungkandang'
    };

    function populateKecamatan(selected = null) {
        kecamatanSelect.innerHTML = '<option disabled value="">Pilih Kecamatan</option>';
        for (const key in areaData) {
            const opt = document.createElement('option');
            opt.value = key;
            opt.textContent = kecamatanNames[key];
            if (selected === key) opt.selected = true;
            kecamatanSelect.appendChild(opt);
        }
    }

    function populateKelurahan(kec, selected = null) {
        kelurahanSelect.innerHTML = '<option disabled value="">Pilih Kelurahan</option>';
        if (areaData[kec]) {
            areaData[kec].forEach(kel => {
                const val = kel.toLowerCase().replace(/\s/g, '_');
                const opt = document.createElement('option');
                opt.value = val;
                opt.textContent = kel;
                if (selected === val) opt.selected = true;
                kelurahanSelect.appendChild(opt);
            });
            kelurahanSelect.disabled = false;
        }
    }

    kecamatanSelect.addEventListener('change', function () {
        populateKelurahan(this.value);
    });

    const addressId = window.location.pathname.split('/').pop();

    // 🔥 LOAD DATA (FIX UTAMA)
    fetch('/api/profile/address/' + addressId, {
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
    .then(res => {
        if (!res.ok) throw new Error('Unauthorized');
        return res.json();
    })
    .then(data => {
        const a = data.address;

        penerima.value = a.penerima;
        telepon.value = a.telepon;
        alamat_lengkap.value = a.alamat_lengkap;
        kode_pos.value = a.kode_pos;
        set_default.checked = a.is_default == 1;

        const kec = a.kecamatan.toLowerCase();
        const kel = a.kelurahan.toLowerCase().replace(/\s/g, '_');

        populateKecamatan(kec);
        populateKelurahan(kec, kel);
    })
    .catch(() => {
        alert('Gagal mengambil alamat');
    });

    // 🔥 UPDATE DATA
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        fetch('/api/profile/address/' + addressId, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            },
            body: JSON.stringify({
                penerima: penerima.value,
                telepon: telepon.value,
                alamat_lengkap: alamat_lengkap.value,
                kecamatan: kecamatan.value,
                kelurahan: kelurahan.value,
                kode_pos: kode_pos.value,
                is_default: set_default.checked
            })
        })
        .then(res => res.json())
        .then(() => {
            alert('Alamat berhasil diperbarui');
            location.href = '/alamat';
        })
        .catch(() => alert('Gagal menyimpan perubahan'));
    });

});
</script>





</body>

</html>
