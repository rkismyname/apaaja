<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email|email:rfc,dns',
            'password' => 'required|min:6|max:20|confirmed',
            'role_id' => 'required|in:2,3'
        ],[
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password harus lebih dari enam karakter',
            'password.max' => 'Password tidak boleh lebih dari 20 karakter',
            'password.confirmed' => 'Password tidak cocok',
        ]);

        $user = new User;
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);
        $user->role_id = $validateData['role_id'];
        $user->save();

        $request->session()->flash('success', 'Registration Success');

        return redirect()->route('login');

    }

}
