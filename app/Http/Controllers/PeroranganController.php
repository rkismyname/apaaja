<?php

namespace App\Http\Controllers;

use App\Models\sertif_tk;
use Illuminate\Http\Request;

class PeroranganController extends Controller
{
    public function sertif_tk()
    {
        $sertif_tk = sertif_tk::all();
        return view('pengajuan.pengajuan_ttk', compact('sertif_tk'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
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
        sertif_tk::create($validatedData);

        // Tindakan selanjutnya setelah penyimpanan data, seperti mengirimkan notifikasi atau meredirect pengguna ke halaman yang sesuai

        return redirect()->back()->with('success', 'Data berhasil dikirim');
    }
}
