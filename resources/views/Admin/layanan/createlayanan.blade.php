@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form action="{{ route('layanan.store') }}" method="POST"
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @csrf
                <div class="mb-2">
                    <label class="text-gray-700 dark:text-gray-200" for="kategori">
                        Kategori
                    </label>
                    <select name="kategori" id="kategori"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                        <option value="">--Pilih Kategori--</option>
                        <option value="Akuntan Publik" {{ old('kategori') === 'Akuntan Publik' ? 'selected' : '' }}>Akuntan
                            Publik</option>
                        <option value="Audit SMK3" {{ old('kategori') === 'Audit SMK3' ? 'selected' : '' }}>Audit SMK3
                        </option>
                        <option value="SBU Pekerjaan Konstruksi Umum"
                            {{ old('kategori') === 'SBU Pekerjaan Konstruksi Umum' ? 'selected' : '' }}>SBU Pekerjaan
                            Konstruksi Umum</option>
                        <option value="SBU Pekerjaan Konstruksi Spesialis"
                            {{ old('kategori') === 'SBU Pekerjaan Konstruksi Spesialis' ? 'selected' : '' }}>SBU Pekerjaan
                            Konstruksi Spesialis</option>
                        <option value="SKK Konstruksi" {{ old('kategori') === 'SKK Konstruksi' ? 'selected' : '' }}>SKK
                            Konstruksi</option>
                        <option value="ISO Non-Akreditasi"
                            {{ old('kategori') === 'ISO Non-Akreditasi (Konstruksi & Perdagangan)' ? 'selected' : '' }}>ISO
                            Non-Akreditasi (Konstruksi & Perdagangan)</option>
                        <option value="ISO Terakreditasi Internasional"
                            {{ old('kategori') === 'ISO Terakreditasi Internasional' ? 'selected' : '' }}>ISO Terakreditasi
                            Internasional</option>
                        <option value="ISO Akreditasi KAN" {{ old('kategori') === 'ISO Akreditasi KAN' ? 'selected' : '' }}>
                            ISO Akreditasi KAN</option>
                        <option value="Pelatihan" {{ old('kategori') === 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                        <option value="Sertifikasi Konstruksi Ketenagalistrikan"
                            {{ old('kategori') === 'Sertifikasi Konstruksi Ketenagalistrikan' ? 'selected' : '' }}>
                            Sertifikasi Konstruksi Ketenagalistrikan</option>
                        <option value="SBU Ketenagalistrikan"
                            {{ old('kategori') === 'SBU Ketenagalistrikan' ? 'selected' : '' }}>SBU Ketenagalistrikan
                        </option>
                        <option value="SBU JASA KONSULTASI UMUM"
                            {{ old('kategori') === 'SBU JASA KONSULTASI UMUM' ? 'selected' : '' }}>SBU JASA KONSULTASI UMUM
                        </option>
                        {{-- <option value="SBU JASA KONSULTASI SPESIALIS"
                            {{ old('kategori') === 'SBU JASA KONSULTASI SPESIALIS' ? 'selected' : '' }}>SBU JASA KONSULTASI
                            SPESIALIS</option> --}}
                        <option value="PENDIRIAN BADAN USAHA"
                            {{ old('kategori') === 'PENDIRIAN BADAN USAHA' ? 'selected' : '' }}>PENDIRIAN BADAN USAHA
                        </option>
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
                <div class="mb-2">
                    <label class="text-gray-700 dark:text-gray-200" for="tipe">
                        Tipe
                    </label>
                    <input type="text" name="tipe" id="tipe" readonly
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ old('tipe') }}">
                    @error('tipe')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-gray-700 dark:text-gray-200" for="hrg_jual">
                        Harga Jual
                    </label>
                    <input type="text" name="hrg_jual" id="hrg_jual" value="{{ old('hrg_jual') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('hrg_jual')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-gray-700 dark:text-gray-200" for="hrg_produksi">
                        Harga Produksi
                    </label>
                    <input type="text" name="hrg_produksi" id="hrg_produksi" value="{{ old('hrg_produksi') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('hrg_produksi')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="hrg_pokok">
                        Harga Pokok
                    </label>
                    <input type="text" name="hrg_pokok" id="hrg_pokok" value="{{ old('hrg_pokok') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('hrg_pokok')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Add Layanan
                    </button>
                    <a href="{{ route('layanan') }}"
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
            const tipeInput = document.getElementById('tipe');

            // Fungsi untuk mengambil pilihan layanan berdasarkan kategori melalui permintaan AJAX
            function getLayananByKategori(kategori) {
                fetch(`/layanan/${kategori}`)
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
                        if (kategori === 'Akuntan Publik') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'Audit SMK3') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'SBU Pekerjaan Konstruksi Umum') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'SBU Pekerjaan Konstruksi Spesialis') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'SKK Konstruksi') {
                            tipeInput.value = 'Perorangan';
                        } else if (kategori === 'ISO Non-Akreditasi') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'ISO Terakreditasi Internasional') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'ISO Akreditasi KAN') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'Pelatihan') {
                            tipeInput.value = 'Perorangan';
                        } else if (kategori === 'Sertifikasi Konstruksi Ketenagalistrikan') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'SBU Ketenagalistrikan') {
                            tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'SBU JASA KONSULTASI UMUM') {
                            tipeInput.value = 'Perusahaan';
                            // } else if (kategori === 'SBU JASA KONSULTASI SPESIALIS') {
                            //     tipeInput.value = 'Perusahaan';
                        } else if (kategori === 'PENDIRIAN BADAN USAHA') {
                            tipeInput.value = 'Perusahaan';
                        } else {
                            tipeInput.value = '';
                        }
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
