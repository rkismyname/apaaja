@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form action="{{ route('dataBu.store') }}" method="POST"
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @csrf
                <div class="mb-2">
                    <label class="text-gray-700 dark:text-gray-200" for="kategori">
                        Kategori
                    </label>
                    <select name="kategori" id="kategori"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                        <option value="Akuntan Publik" {{ old('kategori') === 'Akuntan Publik' ? 'selected' : '' }}>Akuntan
                            Publik</option>
                        <option value="SBU Pekerjaan Konstruksi Umum"
                            {{ old('kategori') === 'SBU Pekerjaan Konstruksi Umum' ? 'selected' : '' }}>SBU Pekerjaan
                            Konstruksi Umum</option>
                    </select>
                    @error('kategori')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-gray-700 dark:text-gray-200" for="layanan">
                        Layanan
                    </label>
                    <select name="layanan" id="layanan"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                        <option value="">--Pilih Layanan--</option>
                    </select>
                    @error('layanan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="nama_perusahaan">
                        Nama Perusahaan
                    </label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="{{ old('nama_perusahaan') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('nama_perusahaan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="nama_pj">
                        Nama PJ/Direktur
                    </label>
                    <input type="text" name="nama_pj" id="nama_pj" value="{{ old('nama_pj') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('nama_pj')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="bidang">
                        Bidang
                    </label>
                    <input type="text" name="bidang" id="bidang" value="{{ old('bidang') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('bidang')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="tlp_perusahaan">
                        Telepon Perusahaan
                    </label>
                    <input type="text" name="tlp_perusahaan" id="tlp_perusahaan" value="{{ old('tlp_perusahaan') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('tlp_perusahaan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="email_perusahaan">
                        Email Perusahaan
                    </label>
                    <input type="email" name="email_perusahaan" id="email_perusahaan"
                        value="{{ old('email_perusahaan') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('email_perusahaan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="tlp_pj">
                        Nomor Telepon Direktur
                    </label>
                    <input type="text" name="tlp_pj" id="tlp_pj" value="{{ old('tlp_pj') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('tlp_pj')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="alamat_perusahaan">
                        Alamat Perusahaan
                    </label>
                    <textarea name="alamat_perusahaan" id="alamat_perusahaan"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">{{ old('alamat_perusahaan') }}</textarea>
                    @error('alamat_perusahaan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Tambahkan Pengajuan
                    </button>
                    <a href="{{ route('form_bu') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Isi Berkas Pengajuan
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kategoriSelect = document.getElementById('kategori');
            const layananSelect = document.getElementById('layanan');

            // Fungsi untuk mengambil pilihan layanan berdasarkan kategori melalui permintaan AJAX
            function getLayananByKategori(kategori) {
                fetch(`/customer/pengajuan/${kategori}`)
                    .then(response => response.json())
                    .then(data => {
                        // Menghapus semua opsi layanan sebelumnya
                        while (layananSelect.firstChild) {
                            layananSelect.removeChild(layananSelect.firstChild);
                        }

                        // Menambahkan opsi-opsi layanan baru
                        data.forEach(layanan => {
                            const option = document.createElement('option');
                            option.value = layanan;
                            option.text = layanan;
                            layananSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.log(error));
            }

            // Event listener untuk mengupdate opsi layanan ketika kategori berubah
            kategoriSelect.addEventListener('change', function() {
                const kategori = kategoriSelect.value;
                getLayananByKategori(kategori);
            });
        });
    </script>
@endsection
