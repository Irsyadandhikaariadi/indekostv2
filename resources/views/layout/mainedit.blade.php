<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IN DE KOST</title>
    <link rel="shortcut icon" href="{{ asset('foto/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/3703331060.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@11.0.5/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.2/jQuery.tagify.min.js"
        integrity="sha512-0BtcbSASOh9qTe0JB+E7SLAi8LsIRywQ9cOHVgWGLpWel4wp4hop2BZdplRTBudoiYb7nYNSp0C84pq7gUQnyg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.js"
        integrity="sha512-mDe5mwqn4f61Fafj3rll7+89g6qu7/1fURxsWbbEkTmOuMebO9jf1C3Esw95oDfBLUycDza2uxAiPa4gdw/hfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.css"
        integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
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
    @yield('css')
    {{-- alert --}}
    @include('layout.alert')
    {{-- end-alert --}}
    {{-- Style Font --}}
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key={{ config('midtrans.serverKey') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- SVG Preloader -->
    <div id="preloader">
        <dotlottie-player src="https://lottie.host/06b1a0cc-67dd-4f3a-9565-c31559a8f1d0/Ylh9CjKg6h.json"
            background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal"
            loop autoplay></dotlottie-player>
    </div>
    <div id="main-content" class="flex flex-col min-h-screen">
        <div class="main">
            @yield('isi')
        </div>
        <div class="footernya">
            @extends('layout.footer')
        </div>
    </div>
    @yield('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Simulasikan waktu pemuatan konten (ganti dengan kode aktual Anda)
            setTimeout(function() {
                document.getElementById("preloader").classList.add("hidden");
            }, 1000);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var input = document.querySelector('input[name=fasilitas_umum]');
        var tagify = new Tagify(input);

        tagify.on('change', function(e) {
            var fasilitas_umum = e.detail.fasilitas_umum.reduce(function(acc, tag) {
                acc.push(tag.value);
                return acc;
            }, []);
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Simulasikan waktu pemuatan konten (ganti dengan kode aktual Anda)
            setTimeout(function() {
                document.getElementById("preloader").classList.add("hidden");
            }, 1000); // Ganti 3000 dengan waktu pemuatan konten yang sesuai
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="https://unpkg.com/tagify@5.1.0/dist/tagify.min.js"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target;
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya hapus!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        }
    </script>
</body>

</html>
