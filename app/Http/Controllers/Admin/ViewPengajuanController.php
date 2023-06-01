<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sertif_bu;
use App\Models\sertif_tk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewPengajuanController extends Controller
{
    public function peroranganAdmin() {
        $peroranganSertif = sertif_tk::all();
        $peroranganAdmin = DB::table('users')
        ->selectRaw('UUID() AS unique_id, users.name, perorangan.nama_perorangan, sertif_tk.bukti_trf, layanan.kategori, layanan.layanan')
        ->join('perorangan', 'users.id', '=', 'perorangan.id')
        ->join('sertif_tk', 'perorangan.perorangan_id', '=', 'sertif_tk.perorangan_id')
        ->join('layanan', 'perorangan.layanan_id', '=', 'layanan.layanan_id')
        ->where('users.role_id', '=', 2)
        ->get();

        // dd($peroranganAdmin);
    
        return view('Admin.pengajuan_tk', compact('peroranganSertif', 'peroranganAdmin'));
    }

    public function perusahaanAdmin($id) {
        $perusahaanSertif = sertif_bu::all();
        $perusahaanAdmin = DB::table('users')
        ->select('users.name', 'perusahaan.nama_perusahaan', 'sertif_bu.bukti_trf', 'layanan.kategori', 'layanan.layanan')
        ->join('perusahaan', 'users.id', '=', 'perusahaan.perusahaan_id')
        ->join('sertif_bu', 'perusahaan.perusahaan_id', '=', 'sertif_bu.bu_id')
        ->join('layanan', 'perusahaan.perusahaan_id', '=', 'layanan.layanan_id')
        ->where('users.role_id', '=', 2)
        ->get();
        // dd($perusahaanAdmin);
        return view('Admin.pengajuan_bu', compact('perusahaanAdmin', 'perusahaanSertif'));
    }

    public function detailPengajuan($id) {
        // dd($id);
        $detailPeroranganAdmin = DB::table('users')
            ->select('users.name', 'perorangan.nama_perorangan', 'sertif_tk.bukti_trf', 'layanan.kategori', 'layanan.layanan')
            ->join('perorangan', 'users.id', '=', 'perorangan.id')
            ->join('sertif_tk', 'perorangan.perorangan_id', '=', 'sertif_tk.perorangan_id')
            ->join('layanan', 'perorangan.layanan_id', '=', 'layanan.layanan_id')
            ->where('users.role_id', 2)
            // ->where('users.id', $id)
            ->get();

            // dd($detailPeroranganAdmin->id);
    
        return view('Admin.detail-pengajuan', [
            'title' => 'Detail Pengajuan',
            'detailPeroranganAdmin' => $detailPeroranganAdmin,
        ]);
    }
}    
