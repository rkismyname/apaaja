@extends('layouts.main')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            @if ($errors->any())
                <div class="px-4 py-3 mb-2 bg-grey-100 text-red-800 rounded-lg">
                    <ul class="list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="px-4 py-3 mb-2 bg-grey-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container grid px-6 mx-auto">
                <div class="w-full overflow-x-auto mt-4">
                    <form method="POST" action="{{ route('form_bu') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label class="text-gray-700 dark:text-gray-200" for="nama_perusahaan">
                                Nama Perusahaan
                            </label>
                            <select name="nama_perusahaan" id="nama_perusahaan"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                <option value="">--Pilih Perusahaan--</option>
                            </select>
                            @error('nama_perusahaan')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Field dan tombol submit lainnya -->
                        <!-- Field untuk unggahan file NIB -->
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm" for="nib">File NIB (PDF Maks 2MB)</label>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="nib" id="nib" accept=".pdf">
                            @error('nib')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Field untuk unggahan file NPWP BU -->
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm" for="npwp_bu">File NPWP Perusahaan (PDF Maks 2MB)</label>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="npwp_bu" id="npwp_bu" accept=".pdf">
                            @error('npwp_bu')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Field untuk unggahan file akte pendirian -->
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm" for="akte_pend">File Akte Pendirian (PDF Maks 2MB)</label>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="akte_pend" id="akte_pend" accept=".pdf">
                            @error('akte_pend')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Field untuk unggahan file akte perusahaan -->
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm" for="akte_peru">File Akte Perusahaan (PDF Maks 2MB)</label>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="akte_peru" id="akte_peru" accept=".pdf">
                            @error('akte_peru')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Field untuk unggahan file KTP -->
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm" for="ktp">File KTP (PDF Maks 2MB)</label>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="ktp" id="ktp" accept=".pdf">
                            @error('ktp')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Field untuk unggahan file NPWP direktur -->
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm" for="npwp_dir">File NPWP Direktur (PDF Maks 2MB)</label>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="npwp_dir" id="npwp_dir" accept=".pdf">
                            @error('npwp_dir')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Field Upload file bukti transfer-->
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm" for="bukti_trf">File Bukti Transfer (JPG, JPEG, atau PNG Maks 2MB)</label>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="bukti_trf" id="bukti_trf" accept=".pdf">
                            @error('bukti_trf')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Tombol submit dan lainnya -->
                        <div class="px-4 py-3 bg-white text-right sm:px-6 dark:bg-gray-800">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">
                                Submit
                            </button>
                            <a href="{{ route('list.bu') }}"
                                class="inline-flex justify-center border text-sm border-transparent shadow-sm bg-yellow-400 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const namaPerusahaanSelect = document.getElementById('nama_perusahaan');

            // Fungsi untuk mengambil pilihan nama perorangan melalui permintaan AJAX
            function getNamaPerusahaan() {
                fetch('/get-nama-perusahaan')
                    .then(response => response.json())
                    .then(data => {
                        // Menghapus semua opsi nama perorangan sebelumnya
                        namaPerusahaanSelect.innerHTML = '';

                        // Menambahkan opsi-opsi nama perorangan baru
                        data.forEach(namaPerusahaan => {
                            const option = document.createElement('option');
                            option.value = namaPerusahaan;
                            option.text = namaPerusahaan;
                            namaPerusahaanSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.log(error));
            }

            // Memanggil fungsi untuk mendapatkan nama perorangan saat halaman dimuat
            getNamaPerusahaan();
        });
    </script>
@endsection
