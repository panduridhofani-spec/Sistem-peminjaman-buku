<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sistem Peminjaman Buku')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
    rel="stylesheet" />
</head>

<body class="bg-gray-100">

  <body class="flex h-screen">
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main content -->
    <main class="flex-1 bg-gray-100 p-6 overflow-auto">
      @yield('content')
    </main>
  </body>

</body>

</html>