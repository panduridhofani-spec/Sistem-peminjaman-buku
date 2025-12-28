<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Alamat | BukuBareng</title>
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <!-- Konten Utama -->
    <div class="pt-12 px-4 md:px-12"> 

        <div class="max-w-xl mx-auto p-8">
            
            <!-- HEADER NAVIGASI (Konsisten dengan halaman profil/alamat) -->
            <div class="flex items-center justify-between mb-6 border-b border-purple-700 pb-4"> 
                
                <!-- Kiri: Header Kembali -->
                <!-- Kembali ke Daftar Alamat -->
                <a href="/daftar_alamat" class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Ubah Alamat</span>
                </a>
                
                <!-- Kanan: Grup Ikon Navigasi (Keranjang dan Home) -->
                <div class="flex items-center space-x-4 text-white">
                    
                    <!-- Ikon Keranjang Belanja -->
                    <a href="/keranjang" class="hover:text-yellow-400 transition">
                        <i class="fa-solid fa-bag-shopping text-xl"></i>
                    </a>
                    
                    <!-- Kembali ke Home Link -->
                    <a href="/dashboard_after_login" class="hover:text-yellow-400 transition flex items-center space-x-2">
                        <i class="fa-solid fa-home text-xl"></i>
                    </a>
                </div>
            </div>
            <!-- Akhir HEADER NAVIGASI -->


            <!-- KARTU FORM UBAH ALAMAT -->
            <div class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-yellow-400">
                
                <h2 class="text-2xl font-bold text-white mb-6 border-b border-purple-700 pb-3">Edit Detail Alamat</h2>

                <form action="/update_address" method="POST">
                    
                    <!-- Nama Penerima -->
                    <div class="mb-4">
                        <label for="penerima" class="block text-sm font-medium text-purple-200 mb-2">Nama Penerima</label>
                        <input type="text" id="penerima" name="penerima" required value="Fany Shandy Agastya"
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white"
                            placeholder="Contoh: Fany Shandy Agastya">
                    </div>

                    <!-- Nomor Telepon Penerima -->
                    <div class="mb-4">
                        <label for="telepon" class="block text-sm font-medium text-purple-200 mb-2">Nomor Telepon</label>
                        <input type="tel" id="telepon" name="telepon" required value="0821221346795"
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white"
                            placeholder="Contoh: 08123456789">
                    </div>

                    <!-- Alamat Lengkap (Textarea) -->
                    <div class="mb-4">
                        <label for="alamat_lengkap" class="block text-sm font-medium text-purple-200 mb-2">Alamat Lengkap (Jalan, No. Rumah)</label>
                        <textarea id="alamat_lengkap" name="alamat_lengkap" rows="3" required
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white resize-none"
                            placeholder="Contoh: Jl. Kenanga No. 45">Jl. Kenanga No. 45</textarea>
                    </div>

                    <!-- KECAMATAN / KELURAHAN (Dinamic Dropdown) -->
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-purple-200 mb-2">Kecamatan (Kota Malang)</label>
                            <select id="kecamatan" name="kecamatan" required
                                class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white">
                                <!-- Opsi diisi dan diset default oleh JavaScript -->
                            </select>
                        </div>
                        <div>
                            <label for="kelurahan" class="block text-sm font-medium text-purple-200 mb-2">Kelurahan</label>
                            <select id="kelurahan" name="kelurahan" required disabled
                                class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white">
                                <!-- Opsi diisi dan diset default oleh JavaScript -->
                            </select>
                        </div>
                    </div>
                    
                    <!-- Kode Pos -->
                    <div class="mb-6">
                        <label for="kode_pos" class="block text-sm font-medium text-purple-200 mb-2">Kode Pos</label>
                        <input type="text" id="kode_pos" name="kode_pos" required value="10520"
                            class="w-full px-4 py-2 rounded-lg bg-purple-800 border border-purple-400 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white"
                            placeholder="Contoh: 65111">
                    </div>

                    <!-- Set sebagai Alamat Utama (Checkbox) -->
                    <div class="flex items-center mb-6">
                        <!-- Diset 'checked' karena ini adalah alamat utama dummy dari address_list.html -->
                        <input type="checkbox" id="set_default" name="set_default" checked class="w-4 h-4 text-yellow-400 bg-purple-900 border-purple-500 rounded focus:ring-yellow-400">
                        <label for="set_default" class="ml-2 text-sm font-medium text-white">Jadikan sebagai alamat utama</label>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="py-3 px-8 rounded-full font-bold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition shadow-lg transform hover:scale-[1.03]">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
            <!-- Akhir KARTU FORM -->

        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kecamatanSelect = document.getElementById('kecamatan');
            const kelurahanSelect = document.getElementById('kelurahan');

            // Data Mapping Kecamatan ke Kelurahan Kota Malang (Sama seperti halaman Tambah Alamat)
            const areaData = {
                'sukun': ['Bandulan', 'Bakaalankrajan', 'Ciptomulyo', 'Gadang', 'Karangbesuki', 'Kebonsari', 'Mulyorejo', 'Pisangcandi', 'Sukun'],
                'lowokwaru': ['Dinoyo', 'Jatimulyo', 'Ketawanggede', 'Lowokwaru', 'Merjosari', 'Mojolangu', 'Sumbersari', 'Tasikmadu', 'Tlogomas', 'Tulusrejo', 'Tunggulwulung', 'Tunjungsekar'],
                'blimbing': ['Arjosari', 'Balearjosari', 'Blimbing', 'Bunulrejo', 'Jodipan', 'Kesatrian', 'Pandanwangi', 'Polehan', 'Polowijen', 'Purwantoro', 'Purwodadi'],
                'klojen': ['Bareng', 'Gadingsari', 'Kasin', 'Kauman', 'Kiduldalem', 'Klojen', 'Oro oro Dowo', 'Penanggungan', 'Rampal Celaket', 'Samaan', 'Sukoharjo'],
                'kedungkandang': ['Arjowinangun', 'Bumiayu', 'Buring', 'Cemorokandang', 'Kedungkandang', 'Kotalama', 'Lesanpuro', 'Madyopuro', 'Mergosono', 'Sawojajar', 'Tlogowaru', 'Wonokoyo']
            };

            // Nilai default yang akan dimuat (Contoh: Blimbing, Purwantoro)
            const defaultKecamatan = 'blimbing';
            const defaultKelurahan = 'purwantoro';
            
            // 1. Isi Dropdown Kecamatan
            function populateKecamatan() {
                kecamatanSelect.innerHTML = '<option value="" disabled>Pilih Kecamatan</option>'; // Kosongkan
                const kecamatanNames = {
                    'sukun': 'Sukun', 'lowokwaru': 'Lowokwaru', 'blimbing': 'Blimbing', 
                    'klojen': 'Klojen', 'kedungkandang': 'Kedungkandang'
                };

                for (const key in areaData) {
                    const option = document.createElement('option');
                    option.value = key;
                    option.textContent = kecamatanNames[key];
                    if (key === defaultKecamatan) {
                        option.selected = true;
                    }
                    kecamatanSelect.appendChild(option);
                }
            }

            // 2. Fungsi untuk mengisi Dropdown Kelurahan (diset default jika ada)
            function populateKelurahan(selectedKecamatan, selectedKelurahan = null) {
                kelurahanSelect.innerHTML = '<option value="" disabled>Pilih Kelurahan</option>';
                
                if (selectedKecamatan && areaData[selectedKecamatan]) {
                    areaData[selectedKecamatan].forEach(kelurahan => {
                        const kelurahanValue = kelurahan.toLowerCase().replace(/\s/g, '_');
                        const option = document.createElement('option');
                        option.value = kelurahanValue;
                        option.textContent = kelurahan;
                        
                        if (selectedKelurahan && kelurahanValue === selectedKelurahan) {
                            option.selected = true;
                        }
                        kelurahanSelect.appendChild(option);
                    });
                    kelurahanSelect.disabled = false;
                } else {
                    kelurahanSelect.disabled = true;
                }
            }

            // 3. Tambahkan Event Listener ke Dropdown Kecamatan
            kecamatanSelect.addEventListener('change', function() {
                const selectedKecamatan = this.value;
                // Saat kecamatan diubah, reset kelurahan tanpa nilai default
                populateKelurahan(selectedKecamatan); 
            });

            // 4. Jalankan inisialisasi dengan data default
            populateKecamatan();
            populateKelurahan(defaultKecamatan, defaultKelurahan.toLowerCase().replace(/\s/g, '_'));
            
            // Batasi input nomor telepon agar hanya angka
            document.getElementById("telepon").addEventListener("input", function() {
                this.value = this.value.replace(/[^0-9]/g, "");
            });
        });
    </script>
</body>
</html>