@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        @if (session('success'))
            <div class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg">
                {{ session('error') }}
            </div>
        @endif
        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-10">
            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('layanan.create') }}"
                    class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Tambah +
                </a>
            </div>
            <div class="w-full overflow-x-auto mt-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Layanan</th>
                            <th class="px-4 py-3">Tipe</th>
                            <th class="px-4 py-3">Harga Jual</th>
                            <th class="px-4 py-3">Harga Produksi</th>
                            <th class="px-4 py-3">Harga Pokok</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($layanans as $layanan)
                            <tr class="text-gray-400 dark:text-gray-400">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $layanan->kategori }}</td>
                                <td class="px-4 py-3">{{ $layanan->layanan }}</td>
                                <td class="px-4 py-3">{{ $layanan->tipe }}</td>
                                <td class="px-4 py-3">{{ $layanan->hrg_jual }}</td>
                                <td class="px-4 py-3">{{ $layanan->hrg_produksi }}</td>
                                <td class="px-4 py-3">{{ $layanan->hrg_pokok }}</td>
                                <td>
                                    <div class="flex items-center">
                                        <a href="{{ route('layanan.edit', $layanan->layanan_id) }}"
                                            class="mr-2 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('layanan.destroy', $layanan->layanan_id) }}" method="POST"
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
            <div class="flex justify-between items-center col-span-8 mt-4">
                <nav aria-label="Table navigation">
                    <ul
                        class="inline-flex items-center bg-white divide-x divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        {{ $layanans->links() }}
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    {{-- <script>
        var tables = document.getElementsByTagName('table');
        var table = tables[tables.length - 1];
        var rows = table.rows;
        var startingNumber = 1;
        var pageNumber = parseInt('{{ $layanans->currentPage() }}');
        var itemsPerPage = parseInt('{{ $layanans->perPage() }}');
        var currentNumber = (pageNumber - 1) * itemsPerPage + startingNumber;
    
        for (var i = 1, td; i < rows.length; i++) {
            td = document.createElement('td');
            td.appendChild(document.createTextNode(currentNumber));
            rows[i].insertBefore(td, rows[i].firstChild);
            currentNumber++;
        }
    </script> --}}
    
@endsection
