<?php

namespace App\Http\Controllers;

use App\Models\sertif_bu;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function sertif_bu()
    {
        $sertif_bu = sertif_bu::all();
        return view('pengajuan.pengajuan_tbu', compact('sertif_bu'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nib' => 'required|file|mimes:pdf|max:2048',
            'npwp_bu' => 'required|file|mimes:pdf|max:2048',
            'akte_pend' => 'required|file|mimes:pdf|max:2048',
            'akte_peru' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'npwp_dir' => 'required|file|mimes:pdf|max:2048',
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
        sertif_bu::create($validatedData);

        // Tindakan selanjutnya setelah penyimpanan data, seperti mengirimkan notifikasi atau meredirect pengguna ke halaman yang sesuai

        return redirect()->back()->with('success', 'Data berhasil dikirim');
    }
}
