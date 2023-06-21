@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form id="details-form" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @foreach ($detailPeroranganAdmin as $perorangan)
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="name">
                            Nama User
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="name">{{ $perorangan->name ?: '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="nama_perorangan">
                            Nama Perorangan
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="nama_perorangan">{{ $perorangan->nama_perorangan ?: '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="kategori">
                            Kategori
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="kategori">{{ $perorangan->kategori ?: '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="layanan">
                            Layanan
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="layanan">{{ $perorangan->layanan ?: '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="ktp">
                            KTP
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/tk/file_ktp/' . $perorangan->ktp) }}')">View</a>
                            <a href="{{ asset('storage/tk/file_ktp/' . $perorangan->ktp) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="npwp">
                            NPWP
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/tk/file_npwp/' . $perorangan->npwp) }}')">View</a>
                            <a href="{{ asset('storage/tk/file_npwp/' . $perorangan->npwp) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="ijazah">
                            Ijazah
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/tk/file_ijazah/' . $perorangan->ijazah) }}')">View</a>
                            <a href="{{ asset('storage/tk/file_ijazah/' . $perorangan->ijazah) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="foto_terbaru">
                            Foto Terbaru
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/tk/file_foto_terbaru/' . $perorangan->foto_terbaru) }}')">View</a>
                            <a href="{{ asset('storage/tk/file_foto_terbaru/' . $perorangan->foto_terbaru) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="bukti_trf">
                            Bukti Transfer
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/tk/file_bukti_trf/' . $perorangan->bukti_trf) }}')">View</a>
                            <a href="{{ asset('storage/tk/file_bukti_trf/' . $perorangan->bukti_trf) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-white text-right sm:px-6 dark:bg-gray-800">
                        <a href="/pengajuan/detail-pengajuan/update-status-tk/{{ $perorangan->tk_id }}"
                            class="inline-flex justify-center border text-sm border-transparent shadow-sm bg-yellow-400 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">setujuin
                            pak</a>
                        <a href="/pengajuan/detail-pengajuan/update-tk-cancelled/{{ $perorangan->tk_id }}"
                            class="inline-flex justify-center border text-sm border-transparent shadow-sm bg-yellow-400 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">cancel
                            pak</a>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
    <!-- Add a modal element for view pop-up -->
    <div id="viewModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <iframe id="viewContent" src="" frameborder="0"></iframe>
        </div>
    </div>

    <!-- Add CSS styles for the modal -->
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        iframe {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Add AJAX script -->
    <!-- Add AJAX script -->
    <script>
        // Function to open view modal
        function openViewModal(filePath) {
            document.getElementById("viewContent").src = filePath;
            document.getElementById("viewModal").style.display = "block";
        }

        // Function to close view modal
        function closeViewModal() {
            document.getElementById("viewModal").style.display = "none";
        }

        // Close the modal when the user clicks on the close button (x)
        var closeBtn = document.getElementsByClassName("close")[0];
        closeBtn.onclick = function() {
            closeViewModal();
        }

        // Close the modal when the user clicks outside the modal content
        window.onclick = function(event) {
            var modal = document.getElementById("viewModal");
            if (event.target == modal) {
                closeViewModal();
            }
        }
    </script>
@endsection
