<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeroranganController extends Controller
{
    public function index() {
        return view('pengajuan.pengajuan');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'ktp' => 'required|string',
            'npwp'=> 'required|string',
            'ijazah' => 'required|string',
            'foto_terbaru' => 'required|string',
        ]);
    }
}
