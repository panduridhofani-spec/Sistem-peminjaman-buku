<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Tertunda | BukuBareng</title>
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom style untuk progress bar */
        .progress-step {
            position: relative;
            z-index: 10;
        }
        .progress-step::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -100%; /* Memastikan garis dimulai dari kiri */
            right: 0;
            height: 4px;
            background-color: #8B5CF6; /* purple-500 */
            z-index: -1;
        }
        .progress-step:first-child::before {
            content: none;
        }
        /* Style untuk status aktif/completed */
        .progress-step.active .step-dot, .progress-step.completed .step-dot {
            background-color: #FACC15; /* yellow-400 */
        }
        .progress-step.completed + .progress-step::before {
            background-color: #FACC15; /* Garis kuning untuk status completed */
        }
    </style>
</head>
<body class="bg-gradient-to-b from-purple-700 to-purple-950 min-h-screen text-white">

    <!-- Konten Utama -->
    <div class="pt-12 px-4 md:px-12"> 

        <div class="max-w-4xl mx-auto p-8">
            
            <!-- HEADER NAVIGASI (Sama seperti Checkout) -->
            <div class="flex items-center justify-between mb-8 border-b border-purple-700 pb-4"> 
                
                <!-- Kiri: Header Kembali -->
                <a href="/checkout" class="flex items-center space-x-2 text-yellow-400 hover:text-white transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Kembali</span>
                </a>
                
                <!-- Kanan: Grup Ikon Navigasi (Hanya Home) -->
                <div class="flex items-center space-x-4 text-white">
                    <a href="/dashboard_after_login" class="hover:text-yellow-400 transition flex items-center space-x-2">
                        <i class="fa-solid fa-home text-xl"></i>
                    </a>
                </div>
            </div>
            <!-- Akhir HEADER NAVIGASI -->
            
            <!-- PROGRESS BAR -->
            <!-- PROGRESS BAR (Fixed Version) -->
            <div class="relative flex items-center justify-between mb-12">

                <!-- Garis dasar ungu -->
                <div class="absolute inset-x-0 top-1/2 h-1 bg-purple-500"></div>

                <!-- Garis progress completed (kuning) -->
                <div class="absolute left-0 top-1/2 h-1 bg-yellow-400"
                    style="width: 33%; transform: translateY(-50%);"></div>

                <!-- Step 1 - Completed -->
                <div class="relative z-10 text-center w-1/3">
                    <div class="w-6 h-6 rounded-full bg-yellow-400 mx-auto mb-2 border-4 border-purple-900"></div>
                    <p class="text-xs font-semibold">Pesanan Dibuat</p>
                </div>

                <!-- Step 2 - Active -->
                <div class="relative z-10 text-center w-1/3">
                    <div class="w-6 h-6 rounded-full bg-yellow-400 mx-auto mb-2 border-4 border-purple-900"></div>
                    <p class="text-xs font-semibold">Pembayaran</p>
                </div>

                <!-- Step 3 - Belum selesai -->
                <div class="relative z-10 text-center w-1/3">
                    <div class="w-6 h-6 rounded-full bg-purple-500 mx-auto mb-2 border-4 border-purple-900"></div>
                    <p class="text-xs font-semibold">Berhasil Dibayar</p>
                </div>

            </div>
            <!-- AKHIR PROGRESS BAR -->

            <!-- KARTU RINCIAN PEMBAYARAN -->
            <div class="bg-purple-900/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-yellow-400">
                
                <h2 class="text-xl font-bold mb-4">Estimasi Waktu Pembayaran: <span class="text-red-400">23:59:59</span></h2>

                <div class="md:grid md:grid-cols-2 md:gap-8">
                    
                    <!-- Kolom Kiri: Rincian Pesanan dan Biaya -->
                    <div class="space-y-6 border-r border-purple-700 pr-4">
                        
                        <!-- Informasi Data Anda -->
                        <div class="bg-purple-800 p-4 rounded-xl shadow-md">
                            <p class="font-bold text-yellow-400 mb-2">Informasi Data Anda</p>
                            <div class="flex items-center space-x-3">
                                <img src="img/books/book9.jpg" onerror="this.onerror=null; this.src='https://placehold.co/60x90/551A8B/FFFFFF?text=B1'" alt="Buku" class="w-12 h-16 object-cover rounded-md flex-shrink-0">
                                <div>
                                    <p class="text-sm font-semibold">The Seven Husbands of Evelyn Hugo</p>
                                    <p class="text-xs text-purple-300">Rumah, atas nama Fany...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Rincian Pembayaran -->
                        <div class="bg-purple-800 p-4 rounded-xl shadow-md">
                            <p class="font-bold text-yellow-400 mb-3">Rincian Pembayaran</p>
                            
                            <div class="text-sm space-y-2 pb-3 border-b border-purple-700">
                                <div class="flex justify-between">
                                    <p>Harga Sewa</p>
                                    <p>Rp 52.500</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>Biaya Admin</p>
                                    <p>Rp 2.500</p>
                                </div>
                                <div class="flex justify-between font-bold text-lg pt-2">
                                    <p>Total Pembayaran</p>
                                    <p class="text-yellow-400">Rp 55.000</p>
                                </div>
                            </div>
                            
                            <p class="text-sm text-purple-300 italic pt-2">Total 2 produk (14 hari sewa)</p>
                        </div>
                    </div>
                    
                    <!-- Kolom Kanan: Metode dan Status Pembayaran -->
                    <div class="space-y-6 pt-6 md:pt-0 pl-4">
                        
                        <!-- Detail Transaksi -->
                        <div class="bg-purple-800 p-4 rounded-xl shadow-md">
                            <p class="font-bold text-yellow-400 mb-3">Detail Transaksi</p>
                            
                            <div class="text-sm space-y-2">
                                <div class="flex justify-between">
                                    <p>Metode Pembayaran</p>
                                    <p>QRIS ALL PAYMENT</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>Nomor Invoice</p>
                                    <p class="font-bold">12131244ff3g4g4g</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>Status Pembayaran</p>
                                    <p class="text-red-400 font-bold">Unpaid</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>Status Transaksi</p>
                                    <p class="text-orange-400 font-bold">Pending</p>
                                </div>
                            </div>
                        </div>

                        <!-- QR Code dan Petunjuk -->
                        <div class="text-center">
                            <p class="text-sm text-purple-300 mb-3">Silakan Melakukan Pembayaran</p>
                            <img src="img/qrcode_dummy.png" onerror="this.onerror=null; this.src='https://placehold.co/200x200/FACC15/4B0082?text=QRIS'" alt="QRIS Code" class="w-48 h-48 mx-auto mb-4 rounded-lg shadow-xl">
                            
                            <button class="py-2 px-6 rounded-full font-bold bg-yellow-400 text-purple-900 hover:bg-yellow-300 transition shadow-lg">
                                Unduh Kode QR
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Akhir KARTU RINCIAN PEMBAYARAN -->

        </div>
    </div>
</body>
</html>