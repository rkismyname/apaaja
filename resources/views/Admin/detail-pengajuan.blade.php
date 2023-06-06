@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form id="details-form" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @foreach($detailPeroranganAdmin as $perorangan)
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="name">
                        Nama User
                    </label>
                    <span id="name">{{ $perorangan->name }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="nama_perorangan">
                        Nama Perorangan
                    </label>
                    <span id="nama_perorangan">{{ $perorangan->nama_perorangan }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="kategori">
                        Kategori
                    </label>
                    <span id="kategori">{{ $perorangan->kategori }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="layanan">
                        Layanan
                    </label>
                    <span id="layanan">{{ $perorangan->layanan }}</span>
                </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection
