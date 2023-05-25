<?php

namespace App\Http\Controllers;

use App\Models\Perorangan;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileCustomerController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_perorangan' => 'required',
        'no_ktp' => 'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
        'email' => 'required|email',
        'no_telepon' => 'required',
        'no_npwp' => 'required',
    ]);

    $user = new User();
    $user->name = $validatedData['nama_perorangan'];
    $user->email = $validatedData['email'];
    $user->save();

    $perorangan = new Perorangan();
    $perorangan->user_id = $user->id;
    $perorangan->nama_perorangan = $validatedData['nama_perorangan'];
    $perorangan->no_ktp = $validatedData['no_ktp'];
    $perorangan->tanggal_lahir = $validatedData['tanggal_lahir'];
    $perorangan->alamat = $validatedData['alamat'];
    $perorangan->email = $validatedData['email'];
    $perorangan->no_telepon = $validatedData['no_telepon'];
    $perorangan->no_npwp = $validatedData['no_npwp'];
    $perorangan->save();

    return redirect()->back()->with('success', 'Profile created successfully.');
}

    public function profileTkEdit($id)
    {
        $user = User::findOrFail($id);
        $perorangan = Perorangan::where('id_individual', $id)->first();

        if (!$perorangan) {
            $perorangan = new Perorangan();
            $perorangan->id_individual = $user->id;
        }

        return view('customer.profile.profile_tk', compact('perorangan', 'user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_perorangan' => 'required',
            'no_ktp' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'no_npwp' => 'required',
        ]);

        $user = User::findOrFail($id);
        $perorangan = $user->perorangan;

        if (!$perorangan) {
            $perorangan = new Perorangan();
            $perorangan->id_individual = $user->id;
        }

        $perorangan->nama_perorangan = $validatedData['nama_perorangan'];
        $perorangan->no_ktp = $validatedData['no_ktp'];
        $perorangan->tanggal_lahir = $validatedData['tanggal_lahir'];
        $perorangan->alamat = $validatedData['alamat'];
        $perorangan->email = $validatedData['email'];
        $perorangan->no_telepon = $validatedData['no_telepon'];
        $perorangan->no_npwp = $validatedData['no_npwp'];
        $perorangan->save();

        $user->name = $validatedData['nama_perorangan'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
