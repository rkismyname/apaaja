@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form id="details-form" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @foreach($detailsMasterData as $perusahaan)
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
                    <label class="text-gray-700 dark:text-gray-200" for="nama_pj">
                        Nama PJ/Direktur
                    </label>
                    <span id="nama_pj">{{ $perusahaan->nama_pj }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="bidang">
                        Bidang/Spesialisasi
                    </label>
                    <span id="bidang">{{ $perusahaan->bidang }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="tlp_perusahaan">
                        Nomor Telepon Perusahaan
                    </label>
                    <span id="tlp_perusahaan">{{ $perusahaan->tlp_perusahaan }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="email_perusahaan">
                        Email Perusahaan
                    </label>
                    <span id="email_perusahaan">{{ $perusahaan->email_perusahaan }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="tlp_pj">
                        Nomor Telepon Direktur/PJ
                    </label>
                    <span id="tlp_pj">{{ $perusahaan->tlp_pj }}</span>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="alamat_perusahaan">
                        Alamat Perusahaan
                    </label>
                    <span id="alamat_perusahaan">{{ $perusahaan->alamat_perusahaan }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <a href="{{ route('md_bu') }}"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Back
                    </a>
                </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection
