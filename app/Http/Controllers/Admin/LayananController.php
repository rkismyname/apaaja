<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLayananRequest;
use App\Http\Requests\UpdateLayananRequest;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::paginate(10);
        // $layanan = layanan::all();
        return view('Admin.layanan.layanan', compact('layanans'));
    }

    public function create()
    {
        return view('Admin.Layanan.createlayanan');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'layanan' => 'required',
            'tipe' => 'required',
            'hrg_jual' => 'required',
            'hrg_produksi' => 'required',
            'hrg_pokok' => 'required',
        ]);

        $layanan = new Layanan();
        $layanan->kategori = $validatedData['kategori'];
        $layanan->layanan = $validatedData['layanan'];
        $layanan->tipe = $validatedData['tipe'];
        $layanan->hrg_jual = $validatedData['hrg_jual'];
        $layanan->hrg_produksi = $validatedData['hrg_produksi'];
        $layanan->hrg_pokok = $validatedData['hrg_pokok'];
        $layanan->id = auth()->user()->id;
        $layanan->save();

        return redirect()->route('layanan')->with('success', 'Layanan created successfully.');
    }
    public function edit($id)
    {
        $layanan = Layanan::where('layanan_id', $id)->firstOrFail();
        return view('Admin.layanan.editlayanan', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::where('layanan_id', $id)->firstOrFail();

        $validatedData = $request->validate([
            'kategori' => 'required',
            'layanan' => 'required',
            'tipe' => 'required',
            'hrg_jual' => 'required',
            'hrg_produksi'  => 'required',
            'hrg_pokok' => 'required',
        ]);

        $layanan->update($validatedData);
        return redirect()->route('layanan')->with('success', 'Layanan updated successfully.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->perorangan()->exists()) {
            return redirect()->route('layanan')->with('error', 'Layanan sedang dalam proses pengajuan.');
        } elseif ($layanan->perusahaan()->exists()){
            return redirect()->route('layanan')->with('error', 'Layanan sedang dalam proses pengajuan.');
        }

        $layanan->delete();

        return redirect()->route('layanan')->with('success', 'Layanan deleted successfully.');
    }


    public function getLayananByKategori($kategori)
    {
        if ($kategori === 'Akuntan Publik') {
            $layanan = ['Asset 0-1 Milyar', 'Asset 1-10 Milyar', 'Asset 10-20 Milyar', 'Asset 50-100 Milyar', 'Asset 100-200 Milyar'];
        } elseif ($kategori === 'Audit SMK3') {
            $layanan = [
                'Audit SMK3 64 KRITERIA (KONTRAKTOR)', 'Audit SMK3 122 KRITERIA (KONTRAKTOR)', 'Audit SMK3 166 KRITERIA (KONTRAKTOR)',
                'Audit SMK3 64 KRITERIA (MANUFAKTUR)', 'Audit SMK3 122 KRITERIA (MANUFAKTUR)', 'Audit SMK3 166 KRITERIA (MANUFAKTUR)'
            ];
        } elseif ($kategori === 'SBU Pekerjaan Konstruksi Umum') {
            $layanan = ['Kecil', 'Menengah', 'Besar', 'BUJKA', 'PENGISIAN LKPM', 'MIGRASI OSS RBA & PENGISIAN LKPM'];
        } elseif ($kategori === 'SBU Pekerjaan Konstruksi Spesialis') {
            $layanan = ['BUJKA', 'BUJKN'];
        } elseif ($kategori === 'SKK Konstruksi') {
            $layanan = ['Jenjang 4', 'Jenjang 5', 'Jenjang 6', 'Jenjang 7', 'Jenjang 8', 'Jenjang 9'];
        } elseif ($kategori === 'ISO Non Akreditasi') {
            $layanan = ['9001:2015', '14001:2015', '45001:2018', 'Paket (9001;14001;45001)'];
        } elseif ($kategori === 'ISO Terakreditasi Internasional') {
            $layanan = ['9001:2015', '14001:2015', '45001:2018', 'Paket (9001;14001;45001)', '37001'];
        } elseif ($kategori === 'ISO Akreditasi KAN') {
            $layanan = ['9001:2015', '14001:2015', '45001:2018', 'Paket (9001;14001;45001)', 'Paket (9001;37001)'];
        } elseif ($kategori === 'Pelatihan') {
            $layanan = [
                'Training AK3U Fresh Graduate', 'Training AK3U Perusahaan', 'Training Petugas P3K', 'Training Petugas Pemadam Kebakaran Kategori D',
                'Pelatihan Bimtek SMKK Non Penginapan (OFFLINE)', 'Training Auditor SMK3', 'Training Ahli Muda K3 Konstruksi', 'Training Ahli K3 Listrik', 'Training Teknisi Listrik',
                'Training Boiler Kelas 2', 'Training Teknisi K3 Pestisida', 'Training K3 Diteksi Gas', 'Training Ahli K3 Kimia', 'Panduan dan Konsultasi LKPM', 'INHOUSE TRAINING LKPM',
                'Pelatihan Bimtek SMKK + Penginapan (OFFLINE)', 'PENERBITAN BARU SKP DAN LISENSI AHLI K3 UMUM KEMNAKER'
            ];
        } elseif ($kategori === 'Sertifikasi Kompetensi Ketenagalistrikan') {
            $layanan = [
                'Serkom Minimal 25 Orang', '2 Serkom Minimal 25 Orang', '4 Serkom Minimal 25 Orang', 'Serkom Minimal 20 Orang',
                '2 Serkom Minimal 20 Orang', '4 Serkom Minimal 20 Orang', 'Serkom Minimal 15 Orang', '2 Serkom Minimal 15 Orang', '4 Serkom Minimal 15 Orang',
                'Serkom Minimal 10 Orang', '2 Serkom Minimal 10 Orang', '4 Serkom Minimal 10 Orang', 'Serkom Minimal 5 Orang', '2 Serkom Minimal 5 Orang', '4 Serkom Minimal 5 Orang'
            ];
        } elseif ($kategori === 'SBU Ketenagalistrikan') {
            $layanan = [
                'Bidang Pembangkit Jenis Usaha Konsultasi Kualifikasi Kecil', 'Bidang Transmisi Jenis Usaha Pembangun dan Pemasangan Kualifikasi Kecil',
                'Bidang Distribusi Jenis Usaha Pengoperasian Kualifikasi Kecil', 'Bidang Instalasi Pemanfaatan Jenis Usaha Pemeliharaan Kualifikasi Kecil',
                'Bidang Pembangkit Jenis Usaha Konsultasi Kualifikasi Menengah', 'Bidang Transmisi Jenis Usaha Pembangun dan Pemasangan Kualifikasi Menengah',
                'Bidang Distribusi Jenis Usaha Pengoperasian Kualifikasi Menengah', 'Bidang Instalasi Pemanfaatan Jenis Usaha Pemeliharaan Kualifikasi Menengah',
                'Bidang Pembangkit Jenis Usaha Konsultasi Kualifikasi Besar', 'Bidang Transmisi Jenis Usaha Pembangun dan Pemasangan Kualifikasi Besar',
                'Bidang Distribusi Jenis Usaha Pengoperasian Kualifikasi Besar', 'Bidang Instalasi Pemanfaatan Jenis Usaha Pemeliharaan Kualifikasi Besar'
            ];
        } elseif ($kategori === 'SBU JASA KONSULTASI UMUM') {
            $layanan = ['Kecil', 'Menengah', 'Besar'];
        } elseif ($kategori === 'PENDIRIAN BADAN USAHA') {
            $layanan = ['PENERBITAN CV', 'PENERBITAN PT PERSEORANGAN', 'PENERBITAN PT KECIL'];
        } else {
            $layanan = [''];
        }

        // Mengembalikan data layanan dalam format JSON
        return response()->json($layanan);
    }
}
