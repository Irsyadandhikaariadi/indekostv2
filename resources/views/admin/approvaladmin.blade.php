@extends('layout.main')


@section('isi')
    <div class="py-20 px-10 sm:ml-64 justify-center">
        <h1 class="mb-4 mt-4 ml-4 text-3xl font-black text-gray-900">Persetujuan Kos</h1>
        <br>
        <div class="mx-8 mb-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="text-xs text-white uppercase bg-[#4F6F52] ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-16 py-3">
                            {{-- <span class="sr-only">Image</span> --}}
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Owner
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kosts as $kost)
                        <tr class="bg-white border-b hover:bg-gray-50 ">
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $loop->iteration }}
                            </td>
                            <td class="p-4">
                                <img src="{{ asset('kosts/' . $kost->foto_depan) }}" class="object-cover  max-w-64 h-28"
                                    alt="Foto Kos">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $kost->user->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $kost->nama_kost }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ Str::limit($kost->lokasi, 5, '...') }}
                            </td>
                            <td
                                class="px-6 py-4 font-semibold
                            @if ($kost->status == 'pending') text-yellow-500
                            @elseif($kost->status == 'setuju') text-green-500
                            @elseif($kost->status == 'tolak') text-red-500 @endif">
                                {{ $kost->status }}
                            </td>

                            <td class="text-center px-6 py-4">
                                <div class="inline-flex items-center space-x-2">
                                    <a href="#" class="inline-block">
                                        <button data-modal-target="select-modal{{ $kost->id }}"
                                            data-modal-toggle="select-modal{{ $kost->id }}" type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5m0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3" />
                                            </svg>
                                        </button>
                                    </a>
                                    @if ($kost->status == 'pending')
                                        <form action="{{ route('admin.approvaladmin.setuju', $kost) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="submit"
                                                class="mt-4 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-md text-sm px-3 py-1.5 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="m9 20.42l-6.21-6.21l2.83-2.83L9 14.77l9.88-9.89l2.83 2.83z" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form id="reject-form" action="{{ route('admin.approvaladmin.tolak', $kost) }}"
                                            method="POST">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="rejection_reason" id="rejection_reason">

                                            <button type="button"
                                                class="mt-4 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-3 py-1.5"
                                                onclick="showRejectionReason()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12z" />
                                                </svg>
                                            </button>
                                        </form>

                                        <script>
                                            function showRejectionReason() {
                                                Swal.fire({
                                                    title: 'Alasan Penolakan',
                                                    input: 'textarea',
                                                    inputLabel: 'Masukan alasan penolakan disini',
                                                    inputPlaceholder: 'Type your message here...',
                                                    inputAttributes: {
                                                        'aria-label': 'Type your message here',
                                                    },
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Tolak',
                                                    cancelButtonText: 'Batal',
                                                    preConfirm: () => {
                                                        const rejectionReason = Swal.getPopup().querySelector('textarea').value;
                                                        if (!rejectionReason) {
                                                            Swal.showValidationMessage('Alasan penolakan harus diisi');
                                                        }
                                                        return rejectionReason;
                                                    },
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Set the rejection reason to the hidden input field
                                                        document.getElementById('rejection_reason').value = result.value;
                                                        // Submit the form
                                                        document.getElementById('reject-form').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    @endif
                                </div>
                            </td>

                        </tr>
                        @empty
                    <tr class="bg-white dark:bg-gray-800 items-center">
                    <tr scope="row" colspan="8"
                        class="px-6 flex items-center justify-center py-4 font-medium text-xs text-gray-900 whitespace-nowrap">
                    </tr>
                    <td></td>
                    <td></td>
                    <td><img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="size-52" alt=""></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @foreach ($kosts as $kost)
            <!-- Main modal-->
            <div id="select-modal{{ $kost->id }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">
                <div class="relative p-4 w-full max-w-md">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold">
                                Detail Kost
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="select-modal{{ $kost->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                {{-- <span class="sr-only">Close modal{{ $kost->id }}</span> --}}
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            {{-- <div class="mb-6 p-4 border border-gray-300 rounded-md shadow-md hover:shadow-lg transition duration-300 ease-in-out"> --}}
                            <img src="{{ asset('kosts/' . $kost->foto_depan) }}"
                                class="object-cover w-full h-44 mb-4 rounded-md " alt="Foto Kos">


                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <span class="font-semibold text-gray-900">Nama Owner:</span> {{ $kost->user->name }}
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-900">Nama Kos:</span> {{ $kost->nama_kost }}
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-900">Alamat:</span>
                                    <article class="text-wrap">
                                        <p >
                                            {{ $kost->lokasi }}
                                        </p>
                                    </article>
                                    <style>
                                        .text-wrap p {
                                            word-wrap: break-word;
                                            overflow:  break-word ;
                                        }
                                    </style>
                                </div>
                                <div class="text-wrap">
                                    <span class="font-semibold text-gray-900">Peraturan:</span> {{ $kost->peraturan }}
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-900">Ketentuan:</span> {{ $kost->ketentuan }}
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-900">Spesifikasi:</span> {{ $kost->spesifikasi }}
                                </div>
                            </div>
                            {{-- </div> --}}
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
