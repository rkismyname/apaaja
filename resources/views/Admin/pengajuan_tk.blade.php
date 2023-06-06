@extends('layouts.main')

@section('content')
<div class="container grid px-6 mx-auto">
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-10">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama User</th>
                        <th class="px-4 py-3">Nama Perorangan</th>
                        <th class="px-4 py-3">Kategori Layanan</th>
                        <th class="px-4 py-3">Layanan</th>
                        <th class="px-4 py-3">Bukti Transfer</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($peroranganAdmin as $admin)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $admin->name }}</td>
                            <td class="text-center">{{ $admin->nama_perorangan }}</td>
                            <td class="text-center">{{ $admin->kategori }}</td>
                            <td class="text-center">{{ $admin->layanan }}</td>
                            <td class="text-center">{{ $admin->bukti_trf }}</td>
                            <td>
                                <a href="/pengajuan/detail-pengajuan/{{$admin->perorangan_id}}" class="btn btn-warning">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
