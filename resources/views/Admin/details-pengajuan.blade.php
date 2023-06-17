@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form id="details-form" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @foreach($detailPerusahaanAdmin as $perusahaan)
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="name">
                        Nama User
                    </label>
                    <span id="name">{{ $perusahaan->name }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="nama_perusahaan">
                        Nama Perusahaan
                    </label>
                    <span id="nama_perusahaan">{{ $perusahaan->nama_perusahaan }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="kategori">
                        Kategori
                    </label>
                    <span id="kategori">{{ $perusahaan->kategori }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="layanan">
                        Layanan
                    </label>
                    <span id="layanan">{{ $perusahaan->layanan }}</span>
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6 dark:bg-gray-800">
                    <a href="/pengajuan/details-pengajuan/update-status-bu/{{ $perusahaan->bu_id }}"
                        class="inline-flex justify-center border text-sm border-transparent shadow-sm bg-yellow-400 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">setujuin
                        pak</a>
                </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection
