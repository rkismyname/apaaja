<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sertif_bu;
use App\Models\sertif_tk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewPengajuanController extends Controller
{
    public function peroranganAdmin()
    {
        $peroranganSertif = sertif_tk::all();
        $peroranganAdmin = DB::table('users')
            ->leftJoin('perorangan', 'users.id', '=', 'perorangan.id')
            ->leftJoin('sertif_tk', 'perorangan.perorangan_id', '=', 'sertif_tk.perorangan_id')
            ->leftJoin('layanan', 'perorangan.layanan_id', '=', 'layanan.layanan_id')
            // ->select('perorangan.perorangan_id', 'users.name', 'perorangan.nama_perorangan', 'sertif_tk.bukti_trf', 'layanan.kategori', 'layanan.layanan')
            ->where('users.role_id', 2)
            ->orderBy('perorangan.perorangan_id', 'asc')
            ->get();

        // dd($peroranganAdmin);

        return view('Admin.pengajuan_tk', compact('peroranganSertif', 'peroranganAdmin'));
    }

    public function perusahaanAdmin()
    {
        $perusahaanSertif = sertif_bu::all();
        $perusahaanAdmin = DB::table('users')
            ->leftJoin('perusahaan', 'users.id', '=', 'perusahaan.id')
            ->leftJoin('sertif_bu', 'perusahaan.perusahaan_id', '=', 'sertif_bu.perusahaan_id')
            ->leftJoin('layanan', 'perusahaan.layanan_id', '=', 'layanan.layanan_id')
            ->select('perusahaan.perusahaan_id', 'users.name', 'perusahaan.nama_perusahaan', 'sertif_bu.bukti_trf', 'layanan.kategori', 'layanan.layanan')
            ->where('users.role_id', 2)
            ->orderBy('perusahaan.perusahaan_id', 'asc')
            ->get();
        // dd($perusahaanAdmin);
        return view('Admin.pengajuan_bu', compact('perusahaanAdmin', 'perusahaanSertif'));
    }
    public function detailsPengajuan($perusahaan_id)
    {
        $detailPerusahaanAdmin = DB::table('users')
            ->leftJoin('perusahaan', 'users.id', '=', 'perusahaan.id')
            ->leftJoin('sertif_bu', 'perusahaan.perusahaan_id', '=', 'sertif_bu.perusahaan_id')
            ->leftJoin('layanan', 'perusahaan.layanan_id', '=', 'layanan.layanan_id')
            ->select('perusahaan.perusahaan_id', 'users.name', 'perusahaan.nama_perusahaan', 'sertif_bu.bukti_trf', 'layanan.kategori', 'layanan.layanan')
            ->where('users.role_id', 2)
            ->where('perusahaan.perusahaan_id', $perusahaan_id)
            ->get();

        return view('Admin.details-pengajuan', [
            'title' => 'Detail Pengajuan Badan Usaha',
            'detailPerusahaanAdmin' => $detailPerusahaanAdmin
        ]);
    }

    public function detailPengajuan($perorangan_id)
    {
        $detailPeroranganAdmin = DB::table('users')
            ->leftJoin('perorangan', 'users.id', '=', 'perorangan.id')
            ->leftJoin('sertif_tk', 'perorangan.perorangan_id', '=', 'sertif_tk.perorangan_id')
            ->leftJoin('layanan', 'perorangan.layanan_id', '=', 'layanan.layanan_id')
            // ->select('perorangan.perorangan_id', 'users.name', 'perorangan.nama_perorangan', 'sertif_tk.bukti_trf', 'layanan.kategori', 'layanan.layanan')
            ->where('users.role_id', 2)
            ->where('perorangan.perorangan_id', $perorangan_id)
            ->get();

        return view('Admin.detail-pengajuan', [
            'title' => 'Detail Pengajuan Tenaga Kerja',
            'detailPeroranganAdmin' => $detailPeroranganAdmin
        ]);
    }

    public function statusBerkasTk(Request $request)
    {
        $approvalTk = sertif_tk::find($request->tk_id);
        $approvalTk->status = $request->status; // Update the status to 1
        $approvalTk->update(['status' => 1]);

        return redirect('/pengajuan/pengajuan-tk');
    }
}
