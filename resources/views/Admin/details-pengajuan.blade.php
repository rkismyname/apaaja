@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form id="details-form" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @foreach ($detailPerusahaanAdmin as $perusahaan)
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="name">
                            Nama User
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="name">{{ $perusahaan->name ? $perusahaan->name : '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="nama_perusahaan">
                            Nama Perusahaan
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="nama_perusahaan">{{ $perusahaan->nama_perusahaan ? $perusahaan->nama_perusahaan : '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="kategori">
                            Kategori
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="kategori">{{ $perusahaan->kategori ? $perusahaan->kategori : '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="layanan">
                            Layanan
                        </label>
                        <span
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            id="layanan">{{ $perusahaan->layanan ? $perusahaan->layanan : '-' }}</span>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="nib">
                            NIB
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/bu/file_nib/' . $perusahaan->nib) }}')">View</a>
                            <a href="{{ asset('storage/bu/file_nib/' . $perusahaan->nib) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="npwp_bu">
                            NPWP Badan Usaha
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/bu/file_npwp_bu/' . $perusahaan->npwp_bu) }}')">View</a>
                            <a href="{{ asset('storage/bu/file_npwp_bu/' . $perusahaan->npwp_bu) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="akte_pend">
                            Akte Pendirian
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/bu/file_akte_pend/' . $perusahaan->akte_pend) }}')">View</a>
                            <a href="{{ asset('storage/bu/file_akte_pend/' . $perusahaan->akte_pend) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="ktp">
                            KTP
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/bu/file_ktp/' . $perusahaan->ktp) }}')">View</a>
                            <a href="{{ asset('storage/bu/file_ktp/' . $perusahaan->ktp) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="npwp_dir">
                            NPWP Direktur
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/bu/file_npwp_dir/' . $perusahaan->npwp_dir) }}')">View</a>
                            <a href="{{ asset('storage/bu/file_npwp_dir/' . $perusahaan->npwp_dir) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="text-gray-700 dark:text-gray-200" for="bukti_trf">
                            Bukti Transfer
                        </label>
                        <div
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <a href="javascript:void(0)"
                                onclick="openViewModal('{{ asset('storage/bu/file_bukti_trf/' . $perusahaan->bukti_trf) }}')">View</a>
                            <a href="{{ asset('storage/bu/file_bukti_trf/' . $perusahaan->bukti_trf) }}" download>Download</a>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-white text-right sm:px-6 dark:bg-gray-800">
                        <a href="/pengajuan/details-pengajuan/update-status-bu/{{ $perusahaan->bu_id }}"
                            class="inline-flex justify-center border text-sm border-transparent shadow-sm bg-yellow-400 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">setujuin
                            pak</a>
                        <a href="/pengajuan/details-pengajuan/update-bu-cancelled/{{ $perusahaan->bu_id }}"
                            class="inline-flex justify-center border text-sm border-transparent shadow-sm bg-yellow-400 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">cancel
                            pak</a>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
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
