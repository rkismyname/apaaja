<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        $jumlahNotApproved = $this->jumlahNotApproved();
        $jumlahApproved = $this->jumlahApproved();
        $jumlahDitolak = $this->jumlahDitolak();

        return view('Admin.dashboard', [
            'title' => 'Dashboard',
            'jumlahNotApproved' => $jumlahNotApproved,
            'jumlahApproved' => $jumlahApproved,
            'jumlahDitolak' => $jumlahDitolak
        ]);
    }
    public function dashboardCustomer()
    {
        $jumlahNotApproved = $this->jumlahNotApproved();
        $jumlahApproved = $this->jumlahApproved();
        $jumlahDitolak = $this->jumlahDitolak();

        $user = Auth::user()->name;
        return view('customer.dashboard', [
            'tittle' => 'Dashboard',
            'user' => $user,
            'jumlahNotApproved' => $jumlahNotApproved,
            'jumlahApproved' => $jumlahApproved,
            'jumlahDitolak' => $jumlahDitolak
        ]);
    }

    public function viewInformasi()
    {
        return view('customer.informasi.informasi');
    }
    
    public function jumlahNotApproved()
    {
        // Hitung jumlah pengajuan belum dikonfirmasi (not approved)
        $jumlahNotApproved = DB::table('sertif_tk')
            ->where('status', 0)
            ->count() + DB::table('sertif_bu')
            ->where('status', 0)
            ->count();
        
        return $jumlahNotApproved;
    }
    public function jumlahApproved()
    {
        // Hitung jumlah pengajuan yang sudah dikonfirmasi (approved)
        $jumlahApproved = DB::table('sertif_tk')
            ->where('status', 1)
            ->count() + DB::table('sertif_bu')
            ->where('status', 1)
            ->count();

        return $jumlahApproved;
    }
    public function jumlahDitolak()
    {
        $jumlahDitolak = DB::table('sertif_tk')
        ->where('status', 2)
        ->count() + DB::table('sertif_bu')
        ->where('status', 2)
        ->count();

        return $jumlahDitolak;
    }
}
