<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view ('Admin.dashboard', [
            "title" => "Dashboard"
        ]);
    }
    public function dashboard(Request $request)
    {
        // return the view for the dashboard page
        return view('dashboard');
}
}