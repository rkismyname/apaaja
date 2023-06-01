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
            <form method="POST" action="{{ route('form_tk') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label class="text-gray-700 dark:text-gray-200" for="nama_perorangan">
                        Nama Perorangan
                    </label>
                    <select name="nama_perorangan" id="nama_perorangan"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                        <option value="">--Pilih Perorangan--</option>
                    </select>
                    @error('nama_perorangan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Field dan tombol submit lainnya -->
                <!-- Field untuk unggahan file NIB -->
                <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm" for="ktp">File KTP (PDF)</label>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="file" name="ktp" id="ktp" accept=".pdf">
                    @error('ktp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field untuk unggahan file NPWP BU -->
                <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm" for="npwp">File NPWP (PDF)</label>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="file" name="npwp" id="npwp" accept=".pdf">
                    @error('npwp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field untuk unggahan file akte pendirian -->
                <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm" for="ijazah">File Ijazah (PDF)</label>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="file" name="ijazah" id="ijazah" accept=".pdf">
                    @error('ijazah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field untuk unggahan file akte perusahaan -->
                <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm" for="foto_terbaru">File Foto Terbaru (PDF)</label>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="file" name="foto_terbaru" id="foto_terbaru" accept=".pdf">
                    @error('foto_terbaru')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field untuk upload file bukti trf -->
                <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm" for="bukti_trf">File Bukti Transfer (PDF)</label>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="file" name="bukti_trf" id="bukti_trf" accept=".pdf">
                    @error('bukti_trf')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Tombol submit dan lainnya -->
                <div class="px-4 py-3 bg-white text-right sm:px-6 dark:bg-gray-800">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Submit
                    </button>
                    <a href="{{ route('data.tk') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const namaPeroranganSelect = document.getElementById('nama_perorangan');

            // Fungsi untuk mengambil pilihan nama perorangan melalui permintaan AJAX
            function getNamaPerorangan() {
                fetch('/get-nama-perorangan')
                    .then(response => response.json())
                    .then(data => {
                        // Menghapus semua opsi nama perorangan sebelumnya
                        namaPeroranganSelect.innerHTML = '';

                        // Menambahkan opsi-opsi nama perorangan baru
                        data.forEach(namaPerorangan => {
                            const option = document.createElement('option');
                            option.value = namaPerorangan;
                            option.text = namaPerorangan;
                            namaPeroranganSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.log(error));
            }

            // Memanggil fungsi untuk mendapatkan nama perorangan saat halaman dimuat
            getNamaPerorangan();
        });
    </script>
@endsection
