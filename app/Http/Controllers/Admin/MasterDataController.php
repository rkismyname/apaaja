<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\perorangan;
use App\Models\perusahaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function showPerorangan(Request $request)
    {
        $tenagaKerja = DB::table('users')
                ->where('role_id','=', 2)->get();
                return view('Admin.masterData.perorangan_md', compact('tenagaKerja'));
    }
    
    public function showPerusahaan(Request $request)
    {
        $badanUsaha = DB::table('users')
        ->join('perusahaan', 'users.id_company', '=', 'users.id_company')
        ->select('users.name', 'perusahaan.nama_perusahaan', 'perusahaan.nama_pj', 'perusahaan.bidang', 'perusahaan.tlp_perusahaan')
        ->where('role_id', '=', 2)->get();

        return view('Admin.masterData.perusahaan_md', compact('badanUsaha'));
    }
}