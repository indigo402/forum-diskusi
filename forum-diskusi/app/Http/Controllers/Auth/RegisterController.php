<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name'     => ['required', 'string', 'max:255'],
            'umur'     => ['nullable', 'integer'],
            'gender'   => ['nullable', 'string'],
            'alamat'   => ['nullable', 'string'],
            'bio'      => ['nullable', 'string'],
        ]);
    }

    protected function create(array $data)
    {
        // 1. Buat user dulu
        $user = User::create([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // 2. Langsung buat profile untuk user tersebut
        Profile::create([
            'user_id' => $user->id,
            'name'    => $data['name'],
            'email'   => $data['email'],  
            'umur'    => $data['umur'] ?? null,
            'gender'  => $data['gender'] ?? null,
            'alamat'  => $data['alamat'] ?? null,
            'bio'     => $data['bio'] ?? null,
        ]);

        return $user;
    }
}