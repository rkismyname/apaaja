@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-10">
            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('data.tk') }}"
                    class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Tambah Pengajuan +
                </a>
                <a href="{{ route('form_tk') }}"
                    class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Isi Berkas Pengajuan
                </a>
            </div>
            <div class="w-full overflow-x-auto mt-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Nama Perorangan</th>
                            <th class="px-4 py-3">Alamat</th>
                            <th class="px-4 py-3">Tanggal Lahir</th>
                            <th class="px-4 py-3">No KTP</th>
                            <th class="px-4 py-3">No NPWP</th>
                            <th class="px-4 py-3">No Telepon</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Layanan</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($listPerorangan as $perorangan)
                            <tr class="text-gray-400 dark:text-gray-400">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $perorangan->nama_perorangan }}</td>
                                <td class="px-4 py-3">{{ $perorangan->alamat }}</td>
                                <td class="px-4 py-3">{{ $perorangan->tanggal_lahir }}</td>
                                <td class="px-4 py-3">{{ $perorangan->no_ktp }}</td>
                                <td class="px-4 py-3">{{ $perorangan->no_npwp }}</td>
                                <td class="px-4 py-3">{{ $perorangan->no_telepon }}</td>
                                <td class="px-4 py-3">{{ $perorangan->layanan->kategori }}</td>
                                <td class="px-4 py-3">{{ $perorangan->layanan->layanan }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <a href="/perorangan/list/{{ $perorangan->perorangan_id }}/edit"
                                            class="mr-2 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="/perorangan/list/{{ $perorangan->perorangan_id }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection