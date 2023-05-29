<?php

namespace App\Http\Controllers;

use App\Models\Perorangan;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // Add password validation rules if a new password is provided
        if ($request->filled('new_password')) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|min:8|confirmed';
        }

        $validatedData = $request->validate($rules);

        // Update name and email
        $user->name = $validatedData['name'];
        if (isset($validatedData['email'])) {
            $user->email = $validatedData['email'];
        }

        // Update password if a new password is provided
        if ($request->filled('new_password')) {
            if (!Hash::check($validatedData['current_password'], $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
            $user->password = Hash::make($validatedData['new_password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
