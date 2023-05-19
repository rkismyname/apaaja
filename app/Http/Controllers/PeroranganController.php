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
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'npwp'=> 'required|file|mimes:pdf|max:2048',
            'ijazah' => 'required|file|mimes:pdf|max:2048',
            'foto_terbaru' => 'required|file|mimes:pdf|max:2048',
        ]);
    }
}
