@extends('layouts.login')

@section('title', 'Kode Verifikasi | BukuBareng')

@section('content')
    {{-- LOGO --}}
    <a href="{{ url('/') }}" class="flex flex-col items-center mb-6">
        <img src="{{ asset('img/logo.png') }}" alt="Logo BukuBareng" class="w-24 h-24 rounded-full bg-white p-1 shadow-md">
        <h1 class="text-white text-xl font-semibold mt-2">BukuBareng</h1>
    </a>

    {{-- CARD VERIFIKASI --}}
    <div class="bg-white/10 backdrop-blur-md text-white rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
        <div class="flex items-center mb-6">
            <a href="{{ url('/lupa_password') }}"
                class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-400 text-gray-300 hover:text-yellow-300 hover:border-yellow-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="text-center text-2xl font-semibold flex-1 -ml-4">
                Masukkan Kode Verifikasi
            </h2>
        </div>

        {{-- FORM OTP --}}
        <form id="verifyForm" onsubmit="return false;">
            {{-- email dari query --}}
            <input type="hidden" id="email" value="{{ request('email') }}">

            <div class="flex justify-between mb-6">
                @for ($i = 1; $i <= 6; $i++)
                    <input type="text" maxlength="1"
                        class="otp-input w-10 h-12 text-center text-lg font-semibold bg-purple-800/50 border border-purple-400 rounded-md 
                           focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white"
                        autocomplete="off">
                @endfor
            </div>

            <p class="text-gray-300 text-sm mb-6 text-center">
                Masukkan 6 digit kode verifikasi yang telah dikirim ke email kamu.
            </p>

            <button type="submit"
                class="w-full bg-yellow-400 text-purple-900 font-semibold py-2 rounded-md 
                   hover:bg-yellow-300 transition">
                Verifikasi
            </button>

            <div class="text-center mt-4 text-sm">
                <p>Belum menerima kode?
                    <a href="#" id="resendOtp" class="text-yellow-400 hover:underline">Kirim Ulang</a>
                </p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const inputs = document.querySelectorAll('.otp-input');
            const form = document.getElementById('verifyForm');
            const email = document.getElementById('email').value;
            const resendBtn = document.getElementById('resendOtp');

            let cooldown = 60;
            let timer = null;

            function startCooldown() {
                resendBtn.classList.add('pointer-events-none', 'text-gray-400');
                resendBtn.classList.remove('text-yellow-400');
                resendBtn.textContent = `Kirim ulang dalam ${cooldown}s`;

                timer = setInterval(() => {
                    cooldown--;
                    resendBtn.textContent = `Kirim ulang dalam ${cooldown}s`;

                    if (cooldown <= 0) {
                        clearInterval(timer);
                        resendBtn.classList.remove('pointer-events-none', 'text-gray-400');
                        resendBtn.classList.add('text-yellow-400');
                        resendBtn.textContent = 'Kirim Ulang';
                        cooldown = 60;
                    }
                }, 1000);
            }

            // 🔁 RESEND OTP + COOLDOWN
            resendBtn.addEventListener('click', function(e) {
                e.preventDefault();

                if (resendBtn.classList.contains('pointer-events-none')) return;

                if (!email) {
                    alert('Email tidak ditemukan');
                    return;
                }

                fetch('/api/forgot-password', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message ?? 'OTP berhasil dikirim ulang');
                        startCooldown(); // mulai cooldown 60 detik
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Gagal mengirim ulang OTP');
                    });
            });

            // ===============================
            // KODE OTP VERIFIKASI (tetap)
            // ===============================



            // Auto pindah ke input berikutnya
            inputs.forEach((input, i) => {
                input.addEventListener('input', () => {
                    if (input.value.length === 1 && inputs[i + 1]) {
                        inputs[i + 1].focus();
                    }
                });

                input.addEventListener('keydown', e => {
                    if (e.key === 'Backspace' && input.value === '' && inputs[i - 1]) {
                        inputs[i - 1].focus();
                    }
                });
            });

            // Submit OTP ke API
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                let otp = '';
                inputs.forEach(i => otp += i.value);

                if (otp.length !== 6) {
                    alert('Masukkan 6 digit OTP');
                    return;
                }

                fetch('/api/verify-otp', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            email: email,
                            otp: otp
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.message === 'OTP valid') {
                            alert('OTP benar');
                            window.location.href = '/atur_pw_baru?email=' + encodeURIComponent(email) +
                                '&otp=' + otp;
                        } else {
                            alert(data.message ?? 'OTP salah');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Terjadi kesalahan saat verifikasi OTP');
                    });
            });

        });
    </script>
@endsection
