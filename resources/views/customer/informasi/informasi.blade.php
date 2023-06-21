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
                    1. Klik Pengajuan Perusahaan/Perorangan pada sidebar. Klik tombol Tambah Pengajuan untuk menambahkan pengajuan baru.<br>
                    2. Pilih dan Isi inputan, jika sudah klik Tambah pengajuan.<br>
                    3. Jika berhasil, yang harus anda lakukan selanjutnya adalah mengisi berkas dengan cara klik isi berkas pengajuan.<br>
                    4. Klik tombol Kembali, pada list perusahaan di Actions klik Transfer untuk melanjutkan proses pengajuan.<br>
                    5. Silahkan transfer sesuai nominal yang tertera ke bank dan rekening yang sudah ditentukan. Jika sudah, upload bukti transfer dan klik Konfirmasi sudah transfer.<br>
                    6. Jika sudah konfirmasi transfer, tunggu Admin untuk konfirmasi pengajuan dan status pengajuan akan berubah menjadi sudah approve.
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
