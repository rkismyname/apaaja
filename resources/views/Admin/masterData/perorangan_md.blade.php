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
                            <th class="text-center">Nam User</th>
                            {{-- <th class="text-center">Nama User</th> --}}
                            <th class="text-center">Nama Perorangan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($tenagaKerja as $perorangan)
                            <tr class="text-gray-700 dark:text-gray-400">
                                {{-- <td class="text-center">{{ $user->id }}</td>  --}}
                                <td class="text-center">{{ $perorangan->name }}</td>
                                <td class="text-center">{{ $perorangan->nama_perorangan }}</td>
                                <td class="text-center">{{ $perorangan->alamat }}</td>
                                <td class="text-center">{{ $perorangan->no_telepon }}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var tables = document.getElementsByTagName('table');
        var table = tables[tables.length - 1];
        var rows = table.rows;
        for (var i = 1, td; i < rows.length; i++) {
            td = document.createElement('td');
            td.appendChild(document.createTextNode(i + 0));
            rows[i].insertBefore(td, rows[i].firstChild);
        }
    </script>
@endsection
