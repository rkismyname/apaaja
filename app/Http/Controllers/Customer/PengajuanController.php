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
    // CRUD PENGAJUAN TENAGA KERJA
    public function listPerorangan()
    {
        $userId = Auth::id();
        $listPerorangan = Perorangan::where('id', $userId)->get();
        return view('customer.pengajuan.listpengajuan_tk', compact('listPerorangan'));
    }

    public function editPerorangan($perorangan_id)
    {
        $perorangan = Perorangan::findOrFail($perorangan_id);

        return view('customer.pengajuan.editList_tk', compact('perorangan'));
    }
    public function updatePerorangan(Request $request, $perorangan_id)
    {
        $data = $request->validate([
            'nama_perorangan' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'no_ktp' => 'required|regex:/^[0-9]+$/|size:16',
            'no_npwp' => 'required|regex:/^[0-9\-,.]+$/|size:20',
            'no_telepon' => 'required|regex:/^[0-9]+$/|between:10,12',
            'kategori' => 'required',
            'layanan' => 'required',
        ], [
            '*.required' => 'Wajib diisi',
            'no_ktp.size' => 'Nomor KTP harus 16 digit',
            'no_npwp.size' => 'Nomor NPWP harus 20 karakter',
            'no_telepon.between' => 'Nomor telepon harus 10-12 digit'
        ]);

        $selectedKategori = $request->input('kategori');
        $selectedLayanan = $request->input('layanan');

        $layanan = Layanan::where('kategori', $selectedKategori)
            ->where('layanan', $selectedLayanan)
            ->first();
        $layananId = $layanan->layanan_id;
        $perorangan = Perorangan::findOrFail($perorangan_id);
        $perorangan->nama_perorangan = $data['nama_perorangan'];
        $perorangan->alamat = $data['alamat'];
        $perorangan->tanggal_lahir = $data['tanggal_lahir'];
        $perorangan->no_ktp = $data['no_ktp'];
        $perorangan->no_npwp = $data['no_npwp'];
        $perorangan->no_telepon = $data['no_telepon'];
        $perorangan->layanan_id = $layananId;

        $perorangan->save();

        return redirect()->route('list.tk')->with('success', 'Data perorangan berhasil diperbarui.');
    }


    public function deletePerorangan($id)
    {
        $perorangan = Perorangan::findOrFail($id);
        $perorangan->sertif_tk()->delete();
        $perorangan->delete();

        return redirect()->route('list.tk')->with('success', 'Data perorangan berhasil dihapus.');
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
            'nama_perorangan' => 'required',
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'npwp' => 'required|file|mimes:pdf|max:2048',
            'ijazah' => 'required|file|mimes:pdf|max:2048',
            'foto_terbaru' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bukti_trf' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'ktp.required' => 'WAJIB UPLOAD FILE KTP',
            'npwp.required' => 'WAJIB UPLOAD FILE NPWP',
            'ijazah.required' => 'WAJIB UPLOAD FILE IJAZAH',
            'foto_terbaru.required' => 'WAJIB UPLOAD FILE FOTO TERBARU',
            'foto_terbaru.image' => 'FORMAT FILE HARUS JPG. JPEG, atau PNG',
            'bukti_trf.required' => 'Wajib Mengunggah File Bukti Transfer',
            '*.max' => 'Ukuran File Tidak Boleh Lebih dari 2MB'
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
        
        //UPLOAD BUKTI TRF
        if ($request->hasFile('bukti_trf')) {
            $bukti_trfFile = $request->file('bukti_trf')->getClientOriginalName();
            $request->file('bukti_trf')->storeAs('public/tk/file_bukti_trf', $bukti_trfFile);
            $validatedData['bukti_trf'] = $foto_terbaruFile;
        }

        $selectedNama = $request->input('nama_perorangan');
        $namaPerorangan = DB::table('perorangan')
            ->where('nama_perorangan', '=',  $selectedNama)
            ->value('perorangan_id');

        $sertifTk = new sertif_tk();

        $sertifTk->id = auth()->user()->id;
        $sertifTk->ktp = $validatedData['ktp'];
        $sertifTk->npwp = $validatedData['npwp'];
        $sertifTk->ijazah = $validatedData['ijazah'];
        $sertifTk->foto_terbaru = $validatedData['foto_terbaru'];
        $sertifTk->bukti_trf = $validatedData['bukti_trf'];
        // $sertifTk->status = $validatedData['status'];
        $sertifTk->perorangan_id = $namaPerorangan;
        $sertifTk->save();

        return redirect()->route('list.tk')->with('success', 'Data berhasil dikirim');
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
            'no_telepon' => 'required|regex:/^[0-9]+$/|between: 10,12',
            'no_npwp' => 'required|regex:/^[0-9\-,.]+$/|size: 20',
            'no_ktp' => 'required|regex:/^[0-9]+$/|size:16',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
        ],[
            '*.required' => 'Wajib diisi',
            'no_telepon.regex' => 'Inputan harus berupa angka',
            'no_npwp.regex' => 'Inputan harus berupa angka',
            'no_ktp.regex' => 'Inputan harus berupa angka',
            'no_ktp.size' => 'Nomor KTP harus 16 digit',
            'no_npwp.size' => 'Nnomor NPWP harus 20 karakter',
            'no_telepon.between' => 'Nomor telepon harus 10-12 digit'
        ]);

        $perorangan = new Perorangan();

        $selectedKategori = $request->input('kategori');
        $selectedLayanan = $request->input('layanan');

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
        return redirect()->route('list.tk')->with('success', 'Data berhasil dikirim');
    }


    //UPLOAD SYARAT PENGAJUAN BADAN USAHA
    public function sertif_bu()
    {
        $sertif_bu = sertif_bu::all();
        return view('customer.pengajuan.pengajuan_tbu', compact('sertif_bu'));
    }

    public function listPerusahaan()
    {
        $userId = Auth::id();
        $listPerusahaan = Perusahaan::where('id', $userId)->get();
        return view('customer.pengajuan.listpengajuan_bu', compact('listPerusahaan'));
    }

    public function editPerusahaan($perusahaan_id)
    {
        $perusahaan = Perusahaan::findOrFail($perusahaan_id);

        return view('customer.pengajuan.editList_bu', compact('perusahaan'));
    }
    public function updatePerusahaan(Request $request, $perusahaan_id)
    {
        // dd($request->all());
        $data = $request->validate([
            'nama_perusahaan' => 'required',
            'nama_pj' => 'required',
            'bidang' => 'required',
            'tlp_perusahaan' => 'required|regex:/^[0-9]+$/|between: 7,12',
            'email_perusahaan' => 'required',
            'tlp_pj' => 'required|regex:/^[0-9]+$/|between: 10,12',
            'alamat_perusahaan' => 'required',
            'kategori' => 'required',
            'layanan' => 'required',
        ], [
            '*.required' => 'Wajib diisi',
            'tlp_perusahaan.regex' => 'Inputan harus berupa angka',
            'tlp_pj.regex' => 'Inputan harus berupa angka',
            'tlp_perusahaan.between' => 'Nomor telepon perusahaan harus 7-12 digit',
            'tlp_pj.between' => 'Nomor telepon PJ / direktur harus 10-12 digit'
        ]);

        $selectedKategori = $request->input('kategori');
        $selectedLayanan = $request->input('layanan');

        $layanan = Layanan::where('kategori', $selectedKategori)
            ->where('layanan', $selectedLayanan)
            ->first();
        $layananId = $layanan->layanan_id;
        $perusahaan = Perusahaan::findOrFail($perusahaan_id);
        $perusahaan->nama_perusahaan = $data['nama_perusahaan'];
        $perusahaan->nama_pj = $data['nama_pj'];
        $perusahaan->bidang = $data['bidang'];
        $perusahaan->tlp_perusahaan = $data['tlp_perusahaan'];
        $perusahaan->email_perusahaan = $data['email_perusahaan'];
        $perusahaan->tlp_pj = $data['tlp_pj'];
        $perusahaan->alamat_perusahaan = $data['alamat_perusahaan'];
        $perusahaan->layanan_id = $layananId;

        $perusahaan->save();

        return redirect()->route('list.bu')->with('success', 'Data perusahaan berhasil diperbarui.');
    }


    public function deletePerusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->sertif_bu()->delete();
        $perusahaan->delete();

        return redirect()->route('list.bu')->with('success', 'Data perusahaan berhasil dihapus.');
    }

    public function getNamaPerusahaan()
    {
        $userID = auth()->user()->id;

        $namaPerusahaan = DB::table('perusahaan')
            ->where('id', $userID)
            ->pluck('nama_perusahaan')
            ->toArray();

        return response()->json($namaPerusahaan);
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
            'bukti_trf' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            // 'id' => auth()->user()->id
        ], [
            'nib.required' => 'Wajib Mengunggah File NIB',
            'npwp_bu.required' => 'Wajib Mengunggah File NPWP Perusahaan',
            'akte_pend.required' => 'Wajib Mengunggah File Akte Pendirian',
            'akte_peru.required' => 'Wajib Mengunggah File Akte Perusahaan',
            'ktp.required' => 'Wajib Mengunggah File KTP',
            'npwp_dir.required' => 'Wajib Mengunggah File NPWP Direktur',
            'bukti_trf.required' => 'Wajib Mengunggah File Bukti Transfer',
            '*.max' => 'Ukuran File Tidak Boleh Lebih dari 2MB'
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

        // file bukti transfer
        if ($request->hasFile('bukti_trf')) {
            $buktiTrfFile = $request->file('bukti_trf')->getClientOriginalName();
            $request->file('bukti_trf')->storeAs('public/bu/file_bukti_trf', $buktiTrfFile);
            $validatedData['bukti_trf'] = $buktiTrfFile;
        }

        // Simpan data ke database
        $selectedNama = $request->input('nama_perusahaan');

        // Find the Layanan instance based on the selected value
        $namaPerusahaan = DB::table('perusahaan')
            ->where('nama_perusahaan', '=',  $selectedNama)
            ->value('perusahaan_id');

        // Create a new instance of the sertif_tk model
        $sertifBu = new sertif_bu();

        $sertifBu->id = auth()->user()->id;
        $sertifBu->nib = $validatedData['nib'];
        $sertifBu->npwp_bu = $validatedData['npwp_bu'];
        $sertifBu->akte_pend = $validatedData['akte_pend'];
        $sertifBu->akte_peru = $validatedData['akte_peru'];
        $sertifBu->ktp = $validatedData['ktp'];
        $sertifBu->npwp_dir = $validatedData['akte_peru'];
        $sertifBu->bukti_trf = $validatedData['bukti_trf'];
        $sertifBu->perusahaan_id = $namaPerusahaan;
        $sertifBu->save();

        return redirect()->route('list.bu')->with('success', 'Data berhasil dikirim');
    }

    public function dataPerusahaan()
    {
        return view('customer.pengajuan.datapengajuan_bu');
    }
    public function storedData(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'kategori' => 'required',
            'layanan' => 'required',
            'nama_perusahaan' => 'required|string',
            'nama_pj' => 'required|string',
            'bidang' => 'required|string',
            'tlp_perusahaan' => 'required|regex:/^[0-9\(,)]+$/|between: 7,12',
            'email_perusahaan' => 'required',
            'tlp_pj' => 'required|regex:/^[0-9]+$/|between: 10,12',
            'alamat_perusahaan' => 'required|string'
        ], [
            '*.required' => 'Wajib diisi',
            'tlp_perusahaan.regex' => 'Inputan harus berupa angka',
            'tlp_pj.regex' => 'Inputan harus berupa angka',
            'tlp_perusahaan.between' => 'Nomor telepon perusahaan harus 7-12 digit',
            'tlp_pj.between' => 'Nomor telepon PJ / direktur harus 10-12 digit'
        ]);

        $perusahaan = new perusahaan();

        $selectedKategori = $request->input('kategori');
        $selectedLayanan = $request->input('layanan');

        $layanan = DB::table('layanan')
            ->where('layanan', '=',  $selectedLayanan)
            ->where('kategori', '=', $selectedKategori)
            ->value('layanan_id');

        $perusahaan->nama_perusahaan = $validatedData['nama_perusahaan'];
        $perusahaan->nama_pj = $validatedData['nama_pj'];
        $perusahaan->bidang = $validatedData['bidang'];
        $perusahaan->tlp_perusahaan = $validatedData['tlp_perusahaan'];
        $perusahaan->email_perusahaan = $validatedData['email_perusahaan'];
        $perusahaan->tlp_pj = $validatedData['tlp_pj'];
        $perusahaan->alamat_perusahaan = $validatedData['alamat_perusahaan'];
        $perusahaan->id = auth()->user()->id;
        $perusahaan->layanan_id = $layanan;

        $perusahaan->save();

        return redirect()->route('list.bu')->with('success', 'Data berhasil dikirim');
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
