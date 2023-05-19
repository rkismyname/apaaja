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
            'password' => 'required|min:6|max:20'
        ]);

        $user = new User;
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);
        $user->role_id = 2;
        // dd($validateData);
        $user->save();

        $request->session()->flash('success', 'Registration Success');

        return redirect()->route('login');

    }

}
