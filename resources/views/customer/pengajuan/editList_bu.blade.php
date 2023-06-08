@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full max-w-md mx-auto mt-10">
            <form action="{{ route('list.bu.update', $perusahaan->perusahaan_id) }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_perusahaan">
                        Nama Perusahaan
                    </label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                        value="{{ $perusahaan->nama_perusahaan }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pj">
                        Nama PJ/Direktur
                    </label>
                    <input type="text" name="nama_pj" id="nama_pj" value="{{ $perusahaan->nama_pj }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="bidang">
                        Bidang
                    </label>
                    <input type="text" name="bidang" id="bidang" value="{{ $perusahaan->bidang }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tlp_perusahaan">
                        Telepon Perusahaan
                    </label>
                    <input type="text" name="tlp_perusahaan" id="tlp_perusahaan"
                        value="{{ $perusahaan->tlp_perusahaan }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email_perusahaan">
                        Email Perusahaan
                    </label>
                    <input type="email" name="email_perusahaan" id="email_perusahaan"
                        value="{{ $perusahaan->email_perusahaan }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tlp_pj">
                        Nomor Telepon Direktur
                    </label>
                    <input type="text" name="tlp_pj" id="tlp_pj" value="{{ $perusahaan->tlp_pj }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat_perusahaan">
                        Alamat Perusahaan
                    </label>
                    <textarea name="alamat_perusahaan" id="alamat_perusahaan"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $perusahaan->alamat_perusahaan }}</textarea>
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">
                        Kategori
                    </label>
                    <select name="kategori" id="kategori"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                        <option value="">--Pilih Kategori--</option>
                        <option value="Pelatihan" {{ old('kategori') === 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                        <option value="SKK Konstruksi" {{ old('kategori') === 'SKK Konstruksi' ? 'selected' : '' }}>SKK
                            Konstruksi</option>
                    </select>
                    @error('kategori')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="layanan">
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
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Pengajuan
                    </button>
                    <a href="{{ route('list.bu') }}"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
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
