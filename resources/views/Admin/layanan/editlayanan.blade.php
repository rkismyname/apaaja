@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full max-w-md mx-auto mt-10">
            <form action="{{ route('layanan.update', $layanan->layanan_id) }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">
                        Kategori
                    </label>
                    <input type="text" name="kategori" id="kategori" value="{{ $layanan->kategori }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="layanan">
                        Layanan
                    </label>
                    <input type="text" name="layanan" id="layanan" value="{{ $layanan->layanan }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tipe">
                        Tipe
                    </label>
                    <input type="text" name="tipe" id="tipe" value="{{ $layanan->tipe }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hrg_jual">
                        Harga Jual
                    </label>
                    <input type="text" name="hrg_jual" id="hrg_jual" value="{{ $layanan->hrg_jual }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hrg_produksi">
                        Harga Produksi
                    </label>
                    <input type="text" name="hrg_produksi" id="hrg_produksi" value="{{ $layanan->hrg_produksi }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hrg_pokok">
                        Harga Pokok
                    </label>
                    <input type="text" name="hrg_pokok" id="hrg_pokok" value="{{ $layanan->hrg_pokok }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Layanan
                    </button>
                    <a href="{{ route('layanan') }}"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
