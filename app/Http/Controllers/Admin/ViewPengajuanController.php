<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sertif_bu;
use App\Models\sertif_tk;

use Illuminate\Http\Request;

class ViewPengajuanController extends Controller
{
    public function peroranganAdmin() {
        $peroranganAdmin = sertif_tk::all();
        return view('Admin.pengajuan_tk', compact('peroranganAdmin'));
    }

    public function perusahaanAdmin() {
        $perusahaanAdmin = sertif_bu::all();
        return view('Admin.pengajuan_bu', compact('perusahaanAdmin'));
    }
}
