<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sistem Peminjaman Buku')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-purple-800 to-purple-950">
  <main>
    @yield('content')
  </main>
</body>

</html>