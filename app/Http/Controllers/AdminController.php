<?php

namespace App\Http\Controllers;

use App\Models\perorangan;
use App\Models\perusahaan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showPerorangan(Request $request)
    {
        $perorangan = perorangan::all();

        return view('Admin.masterData.perorangan_md', [
            'title' => 'Data Perorangan',
            'perorangan' => $perorangan
        ]);
    }
    public function showPerusahaan(Request $request)
    {
        $perusahaan = perusahaan::all();

        return view('Admin.masterData.perusahaan_md',[
        'title' => ' Data Perusahaan',
        'perusahaan' => $perusahaan
        ]);
    }
}