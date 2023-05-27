<?php

namespace App\Http\Controllers;

use App\Models\Perorangan;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileEdit($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $rules = [
            'name' => 'required',
        ];
    
        // Exclude email field from validation if it's disabled
        if ($request->has('email') && $request->input('email') === $user->email) {
            unset($rules['email']);
        }
    
        $validatedData = $request->validate($rules);
    
        $user->update($validatedData);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}    