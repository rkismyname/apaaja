@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full max-w-md mx-auto mt-10">
            <form action="{{ route('list.tk.update', $perorangan->perorangan_id) }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_perorangan">
                        Nama Perorangan
                    </label>
                    <input type="text" name="nama_perorangan" id="nama_perorangan"
                        value="{{ $perorangan->nama_perorangan }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('nama_perorangan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror

                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">
                        Alamat
                    </label>
                    <textarea name="alamat" id="alamat"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $perorangan->alamat }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                         @enderror
                
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_lahir">
                        Tanggal Lahir
                    </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $perorangan->tanggal_lahir }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('tanggal_lahir')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror

                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="no_ktp">
                        Nomor KTP
                    </label>
                    <input type="text" name="no_ktp" id="no_ktp" value="{{ $perorangan->no_ktp }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('no_ktp')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror

                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="no_npwp">
                        Nomor NPWP
                    </label>
                    <input type="text" name="no_npwp" id="no_npwp" value="{{ $perorangan->no_npwp }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('no_npwp')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="no_telepon">
                        Nomor Telepon
                    </label>
                    <input type="text" name="no_telepon" id="no_telepon" value="{{ $perorangan->no_telepon }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('no_ktp')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror

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
                <div class="mb-4">
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
                    <a href="{{ route('list.tk') }}"
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
