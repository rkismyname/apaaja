@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form action="" method="POST" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @if ($detailPeroranganAdmin->isNotEmpty())
                    @foreach($detailPeroranganAdmin as $item)
                        <div class="mb-4">
                            <label class="text-gray-700 dark:text-gray-200" for="name">
                                Nama User
                            </label>
                            <span>{{ $item->name }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-700 dark:text-gray-200" for="nama_perorangan">
                                Nama Perorangan
                            </label>
                            <span>{{ $item->nama_perorangan }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-700 dark:text-gray-200" for="kategori">
                                Kategori
                            </label>
                            <span>{{ $item->kategori }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-700 dark:text-gray-200" for="layanan">
                                Layanan
                            </label>
                            <span>{{ $item->layanan }}</span>
                        </div>
                    @endforeach
                @else
                    <p>No details found.</p>
                @endif
            </form>
        </div>
    </div>
@endsection
