<?php

namespace App\Http\Controllers;

use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();

        $detailProfile = Profile::where('user_id', $iduser)->first();

        return view('profile.index', ['detailProfile' => $detailProfile]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'bio' => 'required',
        ]);

        $profile = Profile::find($id);

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->gender = $request->gender;
        $profile->bio = $request->bio;

        $profile->save();

        return redirect('/profile');
    }
}
