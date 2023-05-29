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
        ->join('perorangan', 'users.id', '=', 'perorangan.id')
        ->join('sertif_tk', 'perorangan.perorangan_id', '=', 'sertif_tk.perorangan_id')
        ->join('layanan', 'perorangan.layanan_id', '=', 'layanan.layanan_id')
        ->select('users.name', 'perorangan.nama_perorangan', 'sertif_tk.bukti_trf', 'layanan.kategori', 'layanan.layanan')
        ->where('users.role_id', '=', 2)
        ->get();
        return view('Admin.pengajuan_tk', compact('peroranganSertif', 'peroranganAdmin'));
    }

    public function perusahaanAdmin() {
        $perusahaanSertif = sertif_bu::all();
        $perusahaanAdmin = DB::table('users')
        ->join('perusahaan', 'users.id', '=', 'perusahaan.id')
        ->join('sertif_bu', 'perusahaan.id', '=', 'sertif_bu.id')
        ->join('layanan', 'perusahaan.id', '=', 'layanan.id')
        ->select('users.name', 'perusahaan.nama_perusahaan', 'sertif_bu.bukti_trf', 'layanan.kategori', 'layanan.layanan')
        ->where('users.role_id', '=', 2)
        ->get();
        return view('Admin.pengajuan_bu', compact('perusahaanAdmin', 'perusahaanSertif'));
    }
}
