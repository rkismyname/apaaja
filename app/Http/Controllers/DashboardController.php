<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('customer.dashboard', [
            'tittle' => 'Dashboard',
        ]);
    }
}