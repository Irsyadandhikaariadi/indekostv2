<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IN DE KOST</title>
    <link rel="shortcut icon" href="{{ asset('foto/favicon.png') }}" type="image/x-icon">

    {{-- Script --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/3703331060.js" crossorigin="anonymous"></script>
    <!-- Include Swiper JS -->
    <script src="https://unpkg.com/swiper@11.0.5/swiper-bundle.min.js"></script>
    {{-- Script --}}

    {{-- Link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.js" integrity="sha512-mDe5mwqn4f61Fafj3rll7+89g6qu7/1fURxsWbbEkTmOuMebO9jf1C3Esw95oDfBLUycDza2uxAiPa4gdw/hfg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.css" integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    {{-- Link --}}

    {{-- style Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        body {
            font-family: 'Poppins';
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            /* Ganti dengan warna latar yang sesuai */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease-out;
            /* Animasi untuk menghilangkan preloader */
        }

        /* Animasi untuk menghilangkan preloader */
        #preloader.hidden {
            display: none;
            pointer-events: none;
            opacity: 0;
        }
    </style>
    {{-- Style Font --}}

    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key={{ config('midtrans.serverKey') }}></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</head>

<body>
    <!-- SVG Preloader -->
    <div id="preloader">
        <dotlottie-player src="https://lottie.host/06b1a0cc-67dd-4f3a-9565-c31559a8f1d0/Ylh9CjKg6h.json"
            background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal"
            loop autoplay></dotlottie-player>
    </div>
    <div id="main-content">
        @yield('isi')
        @extends('layout.footer')
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Simulasikan waktu pemuatan konten (ganti dengan kode aktual Anda)
            setTimeout(function() {
                document.getElementById("preloader").classList.add("hidden");
            }, 1000);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>
