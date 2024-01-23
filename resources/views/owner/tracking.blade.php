@extends('layout.main')
@include('layout.sidebar_owner')

@section('isi')
    <div class="sm:ml-64 ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        checkin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        checkout
                    </th>
                    <th scope="col" class="px-6 py-3">
                        total hari
                    </th>
                    <th scope="col" class="px-6 py-3">
                        aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracking as $track)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $track->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkin)->isoformat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkout)->isoformat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkin)->diffInDays(\Carbon\Carbon::parse($track->checkout)) }}
                            Hari
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('owner.history.show', $track) }}">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection