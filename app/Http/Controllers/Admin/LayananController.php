<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Http\Requests\StoreLayananRequest;
use App\Http\Requests\UpdateLayananRequest;

class LayananController extends Controller
{
    public function index() {
        $layanan = layanan::all();
        return view('Admin.layanan', compact('layanan'));
    }
}
