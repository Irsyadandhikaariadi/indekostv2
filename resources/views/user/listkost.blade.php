@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-12">
        <div class="filterasi flex justify-center items-center ">
            <div class="bg-[#739072] flex px-10 space-x-4 rounded-xl pt-4">
                {{-- search --}}
                <div>
                    <form class="flex items-center">
                        <div class="relative w-full">
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#86A789] focus:border-[#86A789] block w-full p-2.5"
                                placeholder="Cari Kost...">
                        </div>
                        <button type="submit"
                            class="p-2.5 ms-2 text-sm font-medium text-white bg-[#E8F1E3] rounded-lg border border-[#4F6F52] hover:bg-[#4F6F52] focus:ring-4 focus:outline-none focus:ring-[#4F6F52] duration-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div>
                    <form action="" class="space-x-4 flex">
                        <select id="Harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#86A789] focus:border-[#86A789] block w-full p-2.5 text-center">
                            <option selected>Harga</option>
                            <option value="">Termahal - Termurah</option>
                            <option value="">Termurah - Termahal</option>
                        </select>
                        <select id="Rating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#86A789] focus:border-[#86A789] block w-full p-2.5 text-center">
                            <option selected>Rating</option>
                            <option value="">Tertinggi - Terendah</option>
                            <option value="">Terendah - Tertinggi</option>
                        </select>
                    </form>
                </div>
                {{-- search --}}
            </div>
        </div>
        <section class="list py-10 px-[140px]">
            <div class="mb-3">
                <span class="text-xl font-semibold text-gray-900">List Kost</span>
            </div>
            <div class="grid grid-cols-4 gap-3">
                <a href="{{ route('user.detailkost',['kos' => 1]) }}">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a><a href="#">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a><a href="#">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a><a href="#">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <img class="rounded-t-lg" src="{{ asset('foto/dummy-kost.jpeg') }}" alt="" />
                        <div class="px-5 py-3">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900 truncate">Nama Kost</h5>
                            <p class="mb-1 text-sm font-normal text-gray-700 truncate"><i class="fa-solid fa-map-location-dot me-3"></i>Jl.Giok Blok KK No.15 Perum Griya Permata Alam, Ngijo,Karangploso</p>
                            <hr class="mb-2">
                            <span class="text-base text-gray-700 font-semibold truncate">Tersedia 24 Kamar</span>
                            <hr class="mb-2">
                            <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2">
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                                <span class="text-sm text-gray-700 font-medium truncate"><i class="fa-solid fa-check me-2"></i>Check</span>
                            </div>
                            <div class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-lg text-white rounded-lg text-center mt-5">Detail Kost</div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
        pagination
    </div>
@endsection
