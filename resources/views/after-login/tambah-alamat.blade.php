<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alamat | BukuBareng</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

<div class="pt-12 px-4 md:px-12">
<div class="max-w-xl mx-auto p-8">

<!-- HEADER -->
<div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4">
    <a href="/alamat"
       class="flex items-center space-x-2 text-yellow-400 hover:text-white">
        <i class="fa-solid fa-arrow-left"></i>
        <span class="text-lg font-semibold">Tambah Alamat Baru</span>
    </a>

    <div class="flex items-center space-x-4">
        <a href="/keranjang">
            <i class="fa-solid fa-bag-shopping text-xl"></i>
        </a>
        <a href="/dashboard_after_login">
            <i class="fa-solid fa-home text-xl"></i>
        </a>
    </div>
</div>


<!-- FORM -->
<div class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 border-t-4 border-yellow-400">

<form id="addressForm" class="space-y-4">

<input id="penerima" required
class="w-full px-4 py-2 rounded bg-purple-800"
placeholder="Nama penerima">

<input id="telepon" required
class="w-full px-4 py-2 rounded bg-purple-800"
placeholder="Nomor HP">

<textarea id="alamat_lengkap" rows="3" required
class="w-full px-4 py-2 rounded bg-purple-800"
placeholder="Alamat lengkap"></textarea>

<div class="grid grid-cols-2 gap-3">

<select id="kecamatan" required
class="px-3 py-2 rounded bg-purple-800">
<option value="">Pilih Kecamatan</option>
</select>

<select id="kelurahan" required disabled
class="px-3 py-2 rounded bg-purple-800">
<option value="">Pilih Kelurahan</option>
</select>

</div>

<input id="kode_pos" required
class="w-full px-4 py-2 rounded bg-purple-800"
placeholder="Kode pos">

<label class="flex items-center space-x-2">
<input type="checkbox" id="set_default">
<span>Jadikan alamat utama</span>
</label>

<button type="submit"
class="w-full py-3 rounded-full bg-yellow-400 text-purple-900 font-bold">
Simpan Alamat
</button>

</form>
</div>
</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const token = localStorage.getItem('token');
    if (!token) {
        location.href = '/login';
        return;
    }

    function api(url, method = 'GET', body = null) {
        return fetch('/api' + url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            },
            body: body ? JSON.stringify(body) : null
        })
        .then(r => {
            if (r.status === 401) {
                localStorage.clear();
                location.href = '/login';
                return;
            }
            return r.json();
        });
    }

    const area = {
    sukun: [
        'Bandulan','Bakaalankrajan','Ciptomulyo','Gadang','Karangbesuki',
        'Kebonsari','Mulyorejo','Pisangcandi','Sukun'
    ],
    lowokwaru: [
        'Dinoyo','Jatimulyo','Ketawanggede','Lowokwaru','Merjosari',
        'Mojolangu','Sumbersari','Tasikmadu','Tlogomas','Tulusrejo',
        'Tunggulwulung','Tunjungsekar'
    ],
    blimbing: [
        'Arjosari','Balearjosari','Blimbing','Bunulrejo','Jodipan',
        'Kesatrian','Pandanwangi','Polehan','Polowijen',
        'Purwantoro','Purwodadi'
    ],
    klojen: [
        'Bareng','Gadingsari','Kasin','Kauman','Kiduldalem','Klojen',
        'Oro oro Dowo','Penanggungan','Rampal Celaket',
        'Samaan','Sukoharjo'
    ],
    kedungkandang: [
        'Arjowinangun','Bumiayu','Buring','Cemorokandang','Kedungkandang',
        'Kotalama','Lesanpuro','Madyopuro','Mergosono',
        'Sawojajar','Tlogowaru','Wonokoyo'
    ]
};


    const kec = document.getElementById('kecamatan');
    const kel = document.getElementById('kelurahan');

    Object.keys(area).forEach(k => {
        let o = document.createElement('option');
        o.value = k;
        o.textContent = k.toUpperCase();
        kec.appendChild(o);
    });

    kec.onchange = () => {
        kel.innerHTML = '<option value="">Pilih Kelurahan</option>';

        area[kec.value].forEach(v => {
            let o = document.createElement('option');
            o.value = v;
            o.textContent = v;
            kel.appendChild(o);
        });

        kel.disabled = false;
    };

    document.getElementById('addressForm')
    .addEventListener('submit', function(e){

        e.preventDefault();

        api('/profile/address','POST',{
            penerima: document.getElementById('penerima').value,
            telepon: document.getElementById('telepon').value,
            alamat_lengkap: document.getElementById('alamat_lengkap').value,
            kecamatan: kec.value,
            kelurahan: kel.value,
            kode_pos: document.getElementById('kode_pos').value,
            is_default: document.getElementById('set_default').checked
        })
        .then(r=>{
            if(!r) return;

            alert(r.message);
            location.href='/alamat';
        });

    });

});
</script>


</body>
</html>
