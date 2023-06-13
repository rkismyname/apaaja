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
        $tenagaKerja = DB::table('perorangan')
            ->join('users', 'users.id', '=', 'perorangan.id')
            ->where('users.role_id', '=', 2)->get();
        return view('Admin.masterData.perorangan_md', compact('tenagaKerja'));
    }

    public function detailPerorangan_md($perorangan_id ) {
        $detailMasterData = DB::table('perorangan')
            ->join('users', 'users.id', '=', 'perorangan.id')
            ->where('perorangan.perorangan_id', $perorangan_id)
            ->get();

            return view('Admin.masterData.detailPerorangan_md', [
                'title' => 'Detail Master Data Perorangan',
                'detailMasterData' => $detailMasterData
            ]);
    }

    public function showPerusahaan(Request $request)
    {
        $badanUsaha = DB::table('users')
            ->join('perusahaan', 'users.id', '=', 'perusahaan.id')
            // ->select('users.name as user_name','perusahaan.nama_perusahaan', 'perusahaan.nama_pj', 'perusahaan.bidang', 'perusahaan.tlp_perusahaan')
            ->where('users.role_id', '=', 2)->get();

        return view('Admin.masterData.perusahaan_md', compact('badanUsaha'));
    }

    public function detailPerusahaan_md($perusahaan_id) {
        $detailsMasterData = DB::table('perusahaan')
        ->join('users', 'users.id', '=', 'perusahaan_id')
        ->where('perusahaan.perusahaan_id', $perusahaan_id)
        ->get();
        return view('Admin.masterData.detailPerusahaan_md', [
            'title' => 'Detail Master Data Perusahaan',
            'detailsMasterData' => $detailsMasterData
        ]);
    }

    public function testModal(){
        return view('Admin.testModal');
    }
}
