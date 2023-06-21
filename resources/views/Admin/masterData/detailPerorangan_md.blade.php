@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form id="details-form" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @foreach ($detailMasterData as $perorangan)
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="name">
                            Nama User
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="name">{{ $perorangan->name }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="nama_perorangan">
                            Nama Perorangan
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="nama_perorangan">{{ $perorangan->nama_perorangan }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="alamat">
                            Alamat
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="alamat">{{ $perorangan->alamat }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="no_telepon">
                            Nomor Telepon
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="no_telepon">{{ $perorangan->no_telepon }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="no_npwp">
                            Nomor NPWP
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="no_npwp">{{ $perorangan->no_npwp }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="no_ktp">
                            Nomor KTP
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="no_ktp">{{ $perorangan->no_ktp }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('md_tk') }}"
                            class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Back
                        </a>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection
