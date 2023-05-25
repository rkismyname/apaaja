<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // $remember = $request->boolean('remember');
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            $data = [
                "success" => true,
                "message" => "Login Berhasil"
            ];
            if (auth()->user()->isAdmin()) {
                return redirect()->route('admin')->with('toast_success', 'Berhasil Login');
            }
            else if (auth()->user()->isUserTk()) {
                return redirect()->route('customer')->with('toast_success', 'Berhasil Login');
            }
            else if (auth()->user()->isUserBu()) {
                return redirect()->route('customer')->with('toast_success', 'Berhasil Login');
            }
        }

        $data = [
            "success" => false,
            "message" => "Login gagal"
        ];
        return response()->json($data)->setStatusCode(400);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('toast_success', 'Berhasil Logout');
    }
}
