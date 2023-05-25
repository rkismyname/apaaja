@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-10">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="text-center">#</th>
                            {{-- <th class="text-center">Nama User</th> --}}
                            <th class="text-center">Nama Perorangan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($perorangan as $perorangan)
                            <tr class="text-gray-700 dark:text-gray-400">

                                <td class="text-center">{{ $perorangan->id_individual }}</td>
                                <td class="text-center">{{ $perorangan->alamat }}</td>
                                <td class="text-center">{{ $perorangan->nama_perusahaan }}</td>
                                <td class="text-center">{{ $perorangan->no_telepon }}</td>
                                {{-- <td>{{ $perorangan->nama_perorangan}}</td>
                            <td>{{ $perorangan->nama_perorangan}}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
