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
        $remember = $request->boolean('remember');
        $credentials = $request->only(['email','password']);

        if (Auth::attempt($credentials, $remember)) {
            request()->session()->regenerate();
            $data = [
                "success" => true,
                "redirect_to" => auth()->user()->isUser() ? route('dashboard') : route ('Admin.dashboard'),
                "message" => "Login Berhasil"
            ];
            return response()->json($data);
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