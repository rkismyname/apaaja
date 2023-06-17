<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        return view ('Admin.dashboard', [
            "title" => "Dashboard"
        ]);
    }
    public function dashboardCustomer()
    {
        $user = Auth::user()->name;
        return view('customer.dashboard', [
            'tittle' => 'Dashboard',
            'user' => $user
        ]);
    }
}