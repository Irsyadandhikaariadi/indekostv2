@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-10 px-[140px]">
        <section class="image">
            <div class="grid grid-cols-4 gap-6">
                <div class="col-span-3 row-span-3">
                    <img src="{{ asset('kosts/' . $kos->foto_depan) }}" alt="" class="w-full h-full">
                </div>
                <div>
                    <img src="{{ asset('kosts/' . $kos->foto_dalam) }}" alt="">
                </div>
                @forelse (json_decode($kos->foto_tambahan) ?? [] as $tambahan)
                    <div>
                        <img src="{{ asset('kosts/' . $tambahan) }}" alt="">
                    </div>
                @empty
                @endforelse
            </div>
        </section>
        <section class="informan my-5">
            <div class="flex justify-between items-center mx-3">
                <div class="judul">
                    <h1 class="text-2xl text-gray-900 font-semibold">{{ $kos->nama_kost }}</h1>
                </div>
                <div class="owner flex">
                    <span class="text-gray-900 text-base font-medium me-1">Dikelola Oleh {{ $kos->user->name }}</span>
                    <img src="{{ asset('foto/dummy.jpeg') }}" alt="" class="w-7 h-7 rounded-full">
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Peraturan Kost
                </div>
                <div class="informasi">
                    {{ $kos->peraturan }}
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Fasilitas Umum
                </div>
                <div class="grid grid-cols-4 gap-2">
                    @forelse (json_decode($kos->fasilitas_umum) ??[] as $kost)
                        <div class="fasilitas text-gray-700 flex itmes-center">
                            <i class="fa-solid fa-users-rays me-2 text-2xl"></i><span
                                class="font-medium text-lg">{{ $kost->value }}</span>
                        </div>
                    @empty
                        -
                    @endforelse
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Fasilitas Kamar Mandi
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="fasilitas text-gray-700">
                        <i class="fa-solid fa-bath me-2 text-2xl"></i><span
                            class="font-medium text-lg">{{ $kos->fasilitas_kamar_mandi }}</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Fasilitas Parkir
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="fasilitas text-gray-700">
                        <i class="fa-solid fa-square-parking me-2 text-2xl"></i><span
                            class="font-medium text-lg">{{ $kos->fasilitas_tempat_parkir }}</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Lokasi Kost
                </div>
                <div class="informasi">
                    {{ $kos->lokasi }}
                </div>
            </div>
            <hr class="mb-3">
            <span class="text-xl text-gray-900 font-semibold mx-3">
                Kamar Yang Tersedia
            </span>
            <div class="grid grid-cols-3 gap-3 my-3 mx-3">
                @forelse ($kamars as $kamar)
                    <div class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow ">
                        @foreach (json_decode($kamar->foto_kamar) as $item)
                            <img class="rounded-t-lg" src="{{ asset('kamar/' . $item) }}" alt="" />
                        @break
                    @endforeach
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">{{ $kamar->nama_kamar }}
                            </h5>
                            <h5 class=" text-base font-semibold tracking-tight text-gray-900"><i
                                    class="fa-solid fa-users me-1"></i>2 Orang</h5>
                        </div>
                        <span class="text-lg font-semibold text-gray-900">Fasilitas</span>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach (json_decode($kamar->fasilitas) as $fasilitas)
                                <div class="flex flex-wrap">
                                    <span class="text-base font-medium text-gray-900">
                                        <i class="fa-solid fa-check me-1"></i>
                                        {{ $fasilitas->value }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        <span class="text-lg font-semibold text-gray-900 text-balance">Peraturan Kamar</span>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex flex-wrap">
                                <span class="text-base font-medium text-gray-900">
                                    <i class="fa-solid fa-check me-1"></i>
                                    {{ $kamar->peraturan_kamar }}
                                </span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex flex-wrap">
                                <span class="text-base font-black  text-gray-900">
                                    Rp
                                    {{ $kamar->harga }}
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between mt-3">
                            <div class="info mt-1">
                                <button data-modal-target="default-modal{{ $kamar->id }}"
                                    data-modal-toggle="default-modal{{ $kamar->id }}"
                                    class="border border-[#4F6F52] py-1 px-3 rounded-lg text-gray-900">Info</button>
                            </div>
                            <div class="aju">
                                <form
                                    action="{{ route('user.detailkost.payment', ['kos' => $kos, 'kamar' => $kamar]) }}"
                                    method="post">
                                    @csrf
                                    <button type="submit" class="py-1 px-3 rounded-lg text-white"
                                        style="background-color: #4F6F52;">Ajukan Sewa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="span-col-3 text-center">
                    <span class="font-semibold text-2xl text-gray-900">Data Kamar Kosong</span>
                </div>
            @endforelse
        </div>
        <div class="flex justify-center mt-4">
            {{ $kamars->links() }}
        </div>
        <hr>
        <div class="my-3">
            <span class="font-semibold text-lg">Review</span>
        </div>
        <style>
            .rating .fa-star {
                color: rgb(218, 218, 4);
                cursor: pointer;
            }

            .fa-star:hover {
                transform: scale(1.1);
            }
        </style>

        <form action="{{ route('ratting.buat') }}" method="POST">
            @csrf
            <input type="hidden" name="kos_id" value="{{ $kos->id }}">
            <div class="rating mb-3">
                <input type="number" name="rating" hidden>
                <i class="far fa-star fa-lg"></i>
                <i class="far fa-star fa-lg"></i>
                <i class="far fa-star fa-lg"></i>
                <i class="far fa-star fa-lg"></i>
                <i class="far fa-star fa-lg"></i>
            </div>
            <textarea name="ulasan" class="rounded-lg" id="" cols="50" rows="2"
                placeholder="Tulis Ulasan Anda Mengenai Kost Ini"></textarea><br>
            <button type="submit" class="bg-green-600 text-white py-1 px-3 rounded-lg my-3">Kirim</button>
        </form>

        <script>
            const allstr = document.querySelectorAll('.rating .fa-star');
            const ratingInput = document.querySelector('.rating input[name="rating"]');

            allstr.forEach((item, idx) => {
                item.addEventListener('click', function() {
                    for (let i = 0; i < allstr.length; i++) {
                        if (i <= idx) {
                            allstr[i].classList.replace('far', 'fas');
                        } else {
                            allstr[i].classList.replace('fas', 'far');
                        }
                    }
                    ratingInput.value = idx + 1;
                });
            });
        </script>
        @php
            $totalRating = 0;
            $numberOfRatings = count($kos->ulasan);

            foreach ($kos->ulasan as $rating) {
                $totalRating += $rating->rating;
            }

            $averageRating = $numberOfRatings > 0 ? number_format(round($totalRating / $numberOfRatings, 2), 1, '.', ',') : 0;
        @endphp
        <div class="flex items-center gap-4">
            <span class="font-bold text-[80px] ">{{ $averageRating }} <i
                    class="fas fa-star text-yellow-300"></i></span>
            <span class="text-base font-medium">Dari {{ $numberOfRatings }} User</span>
        </div>
        <div class="flex flex-col gap-5">
            @forelse ($kos->ulasan as $rating)
                <div class="bg-gray-50 py-3 px-5 rounded-lg border border-gray-900">
                    <div class="flex gap-4">
                        <div class="profile">
                            <img src="{{ asset('foto/dummy.jpeg') }}" alt="" width="50"
                                class="rounded-full">
                        </div>
                        <div class="Informasinya">
                            <h1 class="text-2xl font-semibold text-gray-900">Username</h1>
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating->rating)
                                        <span>⭐</span>
                                    @else
                                        <span></span>
                                    @endif
                                @endfor
                                <span class="ms-3">{{ $rating->updated_at }}</span>
                            </div>
                            <p class="text-balance">{{ $rating->ulasan }}</p>
                        </div>
                    </div>
                </div>
            @empty
                Tidak ada Ulasan di Kos ini
            @endforelse
        </div>
    </section>
</div>

@foreach ($kamars as $kamar)
    <!-- Main modal -->
    <div id="default-modal{{ $kamar->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold uppercase text-gray-900 dark:text-white">
                        {{ $kamar->nama_kamar }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal{{ $kamar->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal{{ $kamar->id }}" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button data-modal-hide="default-modal{{ $kamar->id }}" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


@endsection
