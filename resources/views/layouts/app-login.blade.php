<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | BukuBareng</title> <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script> <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* CSS untuk memastikan transisi banner dan kategori halus */
        #main-slider-container,
        #kategori-slider-container {
            transition: transform 1s ease-in-out;
        }

        /* Style untuk Modal agar overlay menutupi seluruh layar */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-950 text-white min-h-screen"> <!-- Navbar -->
    @include('partials.navbar-login')

    <div class="pt-40 px-6 md:px-20">
        @yield('content')
    </div>

    <script>
        (function() {

            // sembunyikan halaman dulu (anti flicker)
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

                    // kalau ADMIN → lempar ke dashboard admin
                    if (r.data && r.data.role === 'admin') {
                        window.location.replace('/admin');
                        return;
                    }

                    // kalau USER → boleh akses halaman ini
                    document.documentElement.style.display = 'block';

                })
                .catch(err => {

                    console.error("Auth Check Failed", err);

                    localStorage.clear();
                    window.location.replace('/login');

                });

        })();


        function api(url, method = 'GET', body = null) {

            return fetch('/api' + url, {
                    method,
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    body: body ? JSON.stringify(body) : null
                })
                .then(res => res.json());
        }

        document.getElementById('logout').addEventListener('click', () => {

            api('/logout', 'POST').then(() => {
                localStorage.clear();
                window.location.href = '/masuk';
            });

        });
    </script>
</body>

</html>
