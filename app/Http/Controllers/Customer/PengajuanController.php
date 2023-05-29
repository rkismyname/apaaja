<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\sertif_bu;
use App\Models\sertif_tk;
use App\Models\perorangan;
use App\Models\perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PengajuanController extends Controller
{

    //UPLOAD SYARAT PENGAJUAN TENAGA KERJA
    public function sertif_tk()
    {
        $sertif_tk = sertif_tk::all();
        return view('customer.pengajuan.pengajuan_ttk', compact('sertif_tk'));
    }

    //Selected Nama Perorangan
    public function getNamaPerorangan()
    {
        $userID = auth()->user()->id;

        $namaPerorangan = DB::table('perorangan')
            ->where('id', $userID)
            ->pluck('nama_perorangan')
            ->toArray();

        return response()->json($namaPerorangan);
    }


    public function stored(Request $request)
    {

        $validateData = $request->validate([
            // 'id' => auth()->user()->id,
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'npwp' => 'required|file|mimes:pdf|max:2048',
            'ijazah' => 'required|file|mimes:pdf|max:2048',
            'foto_terbaru' => 'required|file|mimes:pdf|max:2048',
        ], [
            'ktp.required' => 'WAJIB UPLOAD FILE KTP',
            'npwp.required' => 'WAJIB UPLOAD FILE NPWP',
            'ijazah.required' => 'WAJIB UPLOAD FILE IJAZAH',
            'foto_terbaru.required' => 'WAJIB UPLOAD FILE TERBARU',
            '*.mimes' => 'FILE YANG DIUPLOAD HARUS BERFORMAT PDF',
        ]);

        //UPLOAD FILE KTP
        if ($request->hasFile('ktp')) {
            $ktpFile = $request->file('ktp')->getClientOriginalName();
            $request->file('ktp')->storeAs('public/tk/file_ktp', $ktpFile);
            $validatedData['ktp'] = $ktpFile;
        }

        //UPLOAD FILE NPWP
        if ($request->hasFile('npwp')) {
            $npwpFile = $request->file('npwp')->getClientOriginalName();
            $request->file('npwp')->storeAs('public/tk/file_npwp', $npwpFile);
            $validatedData['npwp'] = $npwpFile;
        }

        //UPLOAD FILE IJAZAH
        if ($request->hasFile('ijazah')) {
            $ijazahFile = $request->file('ijazah')->getClientOriginalName();
            $request->file('ijazah')->storeAs('public/tk/file_ijazah', $ijazahFile);
            $validatedData['ijazah'] = $ijazahFile;
        }

        //UPLOAD FILE FOTO TERBARU
        if ($request->hasFile('foto_terbaru')) {
            $foto_terbaruFile = $request->file('foto_terbaru')->getClientOriginalName();
            $request->file('foto_terbaru')->storeAs('public/tk/file_foto_terbaru', $foto_terbaruFile);
            $validatedData['foto_terbaru'] = $foto_terbaruFile;
        }
        // Simpan data ke database
        sertif_tk::create([
            'id' => auth()->user()->id,
            'ktp' => $validatedData['ktp'],
            'npwp' => $validatedData['npwp'],
            'ijazah' => $validatedData['ijazah'],
            'foto_terbaru' => $validatedData['foto_terbaru']
        ]);

        // Tindakan selanjutnya setelah penyimpanan data, seperti mengirimkan notifikasi atau meredirect pengguna ke halaman yang sesuai

        return redirect()->back()->with('success', 'Data berhasil dikirim');
    }

    //Controller Form Untuk Master Data
    public function dataDiri()
    {
        return view('customer.pengajuan.datapengajuan_tk');
    }
    public function storeData(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'kategori' => 'required',
            'layanan' => 'required',
            'nama_perorangan' => 'required|string',
            'no_telepon' => 'required|string',
            'no_npwp' => 'required|string',
            'no_ktp' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
        ]);

        // Create a new Perorangan instance and fill it with the validated data
        $perorangan = new Perorangan();

        // Retrieve the selected layanan from the form
        $selectedKategori = $request->input('kategori');
        $selectedLayanan = $request->input('layanan');

        // Find the Layanan instance based on the selected value
        $layanan = DB::table('layanan')
            ->where('layanan', '=',  $selectedLayanan)
            ->where('kategori', '=', $selectedKategori)
            ->value('layanan_id');

        $perorangan->nama_perorangan = $validatedData['nama_perorangan'];
        $perorangan->no_telepon = $validatedData['no_telepon'];
        $perorangan->no_npwp = $validatedData['no_npwp'];
        $perorangan->no_ktp = $validatedData['no_ktp'];
        $perorangan->tanggal_lahir = $validatedData['tanggal_lahir'];
        $perorangan->alamat = $validatedData['alamat'];
        $perorangan->id = auth()->user()->id;
        $perorangan->layanan_id = $layanan;

        // Save the Perorangan instance to the database
        $perorangan->save();

        // Optionally, you can redirect to a success page or perform any additional actions
        return redirect()->back()->with('success', 'Data berhasil dikirim');
    }


    //UPLOAD SYARAT PENGAJUAN BADAN USAHA
    public function sertif_bu()
    {
        $sertif_bu = sertif_bu::all();
        return view('customer.pengajuan.pengajuan_tbu', compact('sertif_bu'));
    }

    public function store(Request $request)
    {
        // $user_id = auth()->user()->id;
        $validatedData = $request->validate([
            'nib' => 'required|file|mimes:pdf|max:2048',
            'npwp_bu' => 'required|file|mimes:pdf|max:2048',
            'akte_pend' => 'required|file|mimes:pdf|max:2048',
            'akte_peru' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'npwp_dir' => 'required|file|mimes:pdf|max:2048',
            // 'id' => auth()->user()->id
        ], [
            'nib.required' => 'Wajib mengunggah file NIB',
            'npwp_bu.required' => 'Wajib mengunggah file NPWP Perusahaan',
            'akte_pend.required' => 'Wajib mengunggah file Akte Pendirian',
            'akte_peru.required' => 'Wajib mengunggah file Akte Perusahaan',
            'ktp.required' => 'Wajib mengunggah file KTP',
            'npwp_dir.required' => 'Wajib mengunggah file NPWP Direktur',
            '*.mimes' => 'File yang diunggah harus berformat PDF',
        ]);

        // Mengunggah file NIB
        if ($request->hasFile('nib')) {
            $nibFile = $request->file('nib')->getClientOriginalName();
            $request->file('nib')->storeAs('public/bu/file_nib', $nibFile);
            $validatedData['nib'] = $nibFile;
        }

        // Mengunggah file NPWP BU
        if ($request->hasFile('npwp_bu')) {
            $npwpBuFile = $request->file('npwp_bu')->getClientOriginalName();
            $request->file('npwp_bu')->storeAs('public/bu/file_npwp_bu', $npwpBuFile);
            $validatedData['npwp_bu'] = $npwpBuFile;
        }

        // Mengunggah file akte pendirian
        if ($request->hasFile('akte_pend')) {
            $aktePendFile = $request->file('akte_pend')->getClientOriginalName();
            $request->file('akte_pend')->storeAs('public/bu/file_akte_pend', $aktePendFile);
            $validatedData['akte_pend'] = $aktePendFile;
        }

        // Mengunggah file akte perusahaan
        if ($request->hasFile('akte_peru')) {
            $aktePeruFile = $request->file('akte_peru')->getClientOriginalName();
            $request->file('akte_peru')->storeAs('public/bu/file_akte_peru', $aktePeruFile);
            $validatedData['akte_peru'] = $aktePeruFile;
        }

        // Mengunggah file KTP
        if ($request->hasFile('ktp')) {
            $ktpFile = $request->file('ktp')->getClientOriginalName();
            $request->file('ktp')->storeAs('public/bu/file_ktp', $ktpFile);
            $validatedData['ktp'] = $ktpFile;
        }

        // Mengunggah file NPWP direktur
        if ($request->hasFile('npwp_dir')) {
            $npwpDirFile = $request->file('npwp_dir')->getClientOriginalName();
            $request->file('npwp_dir')->storeAs('public/bu/file_npwp_dir', $npwpDirFile);
            $validatedData['npwp_dir'] = $npwpDirFile;
        }

        // Simpan data ke database
        sertif_bu::create([
            'id' => auth()->user()->id,
            'nib' => $validatedData['nib'],
            'npwp_bu' => $validatedData['npwp_bu'],
            'akte_pend' => $validatedData['akte_pend'],
            'akte_peru' => $validatedData['akte_peru'],
            'ktp' => $validatedData['ktp'],
            'npwp_dir' => $validatedData['npwp_dir'],
        ]);


        // Tindakan selanjutnya setelah penyimpanan data, seperti mengirimkan notifikasi atau meredirect pengguna ke halaman yang sesuai

        return redirect()->back()->with('success', 'Data berhasil dikirim');
    }

    public function getPengajuanByKategori($kategori)
    {
        $layanan = [];

        if ($kategori === 'Akuntan Publik') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'Audit SMK3') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'SBU Pekerjaan Konstruksi Umum') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'SBU Pekerjaan Konstruksi Spesialis') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'SKK Konstruksi') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'ISO Non Akreditasi') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'ISO Terakreditasi Internasional') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'ISO Akreditasi KAN') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'Pelatihan') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'Sertifikasi Kompetensi Ketenagalistrikan') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'SBU Ketenagalistrikan') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'SBU JASA KONSULTASI UMUM') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } elseif ($kategori === 'PENDIRIAN BADAN USAHA') {
            $layanan = DB::table('layanan')->where('kategori', $kategori)->pluck('layanan')->toArray();
        } else {
            $layanan = [''];
        }

        // Mengembalikan data layanan dalam format JSON
        return response()->json($layanan);
    }
}
