<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Peminjaman Buku')</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- FontAwesome -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 flex min-h-screen caret-transparent">

    <!-- Sidebar (POSISI FIXED, TETAP KIRI) -->
    @include('partials.sidebar')

    <!-- Main content (DIBERI OFFSET SESUAI LEBAR SIDEBAR: 317px) -->
    <main class="flex-1 bg-gray-100 p-6 overflow-auto ml-[317px]">
        @yield('content')
    </main>

    <script>
        (function() {

            // sembunyikan halaman dulu
            document.documentElement.style.display = 'none';

            const token = localStorage.getItem('token');

            // 1. Cek token
            if (!token) {
                window.location.replace('/login');
                return;
            }

            // 2. Cek role
            fetch('/api/me', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(r => {

                    // kalau bukan admin → lempar ke dashboard user
                    if (!r.data || r.data.role !== 'admin') {
                        window.location.replace('/dashboard');
                        return;
                    }

                    // kalau admin → tampilkan halaman
                    document.documentElement.style.display = 'block';

                })
                .catch(err => {

                    console.error("Auth Check Failed", err);

                    localStorage.clear();
                    window.location.replace('/login');

                });

        })();
    </script>


</body>

</html>
