<aside class="w-[317px] bg-[#300467] text-white h-screen fixed top-0 left-0 overflow-y-auto">

  <!-- LOGO -->
  <div class="pt-6">
    <div class="rounded-full w-[100px] mx-auto mb-8 overflow-hidden border border-white">
      <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
    </div>
  </div>

  <!-- NAV -->
  <nav>
    <ul class="space-y-1">

      <li>
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-9 py-4 text-[20px] opacity-70 hover:opacity-100 hover:bg-purple-800 transition
           {{ request()->routeIs('dashboard') ? 'bg-purple-800 opacity-100' : '' }}">
          <i class="ri-dashboard-line"></i> Dashboard
        </a>
      </li>

      <li>
        <a href="{{ route('buku.index') }}"
           class="flex items-center gap-3 px-9 py-4 text-[20px] opacity-70 hover:opacity-100 hover:bg-purple-800 transition">
          <i class="ri-book-shelf-line"></i> Data Buku
        </a>
      </li>

      <li>
        <a href="{{ route('user.index') }}"
           class="flex items-center gap-3 px-9 py-4 text-[20px] opacity-70 hover:opacity-100 hover:bg-purple-800 transition">
          <i class="ri-contacts-book-3-line"></i> Data Pengguna
        </a>
      </li>

      <li>
        <a href="{{ route('booking.index') }}"
           class="flex items-center gap-3 px-9 py-4 text-[20px] opacity-70 hover:opacity-100 hover:bg-purple-800 transition">
          <i class="ri-user-community-line"></i> Bokingan
        </a>
      </li>

      <li>
        <a href="{{ route('pembayaran.index') }}"
           class="flex items-center gap-3 px-9 py-4 text-[20px] opacity-70 hover:opacity-100 hover:bg-purple-800 transition">
          <i class="ri-money-dollar-box-line"></i> Pembayaran
        </a>
      </li>

      <li>
        <a href="{{ route('laporan.index') }}"
           class="flex items-center gap-3 px-9 py-4 text-[20px] opacity-70 hover:opacity-100 hover:bg-purple-800 transition">
          <i class="ri-file-chart-line"></i> Laporan
        </a>
      </li>

      <li>
        <a href="{{ route('profil.index') }}"
           class="flex items-center gap-3 px-9 py-4 text-[20px] opacity-70 hover:opacity-100 hover:bg-purple-800 transition">
          <i class="ri-user-fill"></i> Profil Admin
        </a>
      </li>

    </ul>
  </nav>
</aside>
