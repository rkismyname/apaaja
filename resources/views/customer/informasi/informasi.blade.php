@extends('layouts.main')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Informasi
        </h2>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Tata Cara Pengajuan
            </h4>
            <div class="scrollable-container">
                <p class="text-gray-600 dark:text-gray-400">
                    1. Klik Pengajuan Sertifikasi Tenaga Kerja/Badan Usaha pada sidebar. Klik tombol Tambah Pengajuan untuk menambahkan pengajuan baru.<br>
                    2. Pilih dan Isi inputan, jika sudah klik Tambah pengajuan.<br>
                    3. Jika berhasil, yang harus anda lakukan selanjutnya adalah mengisi berkas dengan cara klik isi berkas pengajuan.<br>
                    4. Jika berkas sudah berhasil di upload, status akan berubah menjadi "proses".<br>
                    5. Admin akan mereview berkas pengajuan yang telah anda upload.<br>
                    6. Jika berkas disetujui/ditolak, maka status akan berubah.<br>
                </p>
            </div>
        </div>
        <style>
            .scrollable-container {
                overflow-x: auto;
                white-space: nowrap;
            }
        </style>
@endsection
