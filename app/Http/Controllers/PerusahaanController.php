<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index() {
        return view('pengajuan.pengajuan');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nib' => 'required|string',
            'npwp_bu'=> 'required|string',
            'akte_pend' => 'required|string',
            'akte_peru' => 'required|string',
            'ktp' => 'required|string',
            'npwp_dir' => 'required|string',
        ]);
    }
}
