<?php

namespace App\Services;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login($data)
    {
        $user = User::where(['login' => $data['login']])->get();

        if(isset($user[0])) {
            if(Hash::check($data['password'], $user[0]->password)) {
                Auth::login($user[0]);

                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                throw ValidationException::withMessages([
                    'login' => 'Неверный логин или пароль'
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'login' => 'Неверный логин или пароль'
            ]);
        }
    }

    public function register($newUser): void
    {
        $user = User::create([
            'login' => $newUser['login'],
            'password' => Hash::make($newUser['password']),
            'lfp' => $newUser['lfp'],
            'phone' => $newUser['phone'],
            'email' => $newUser['email'],
        ]);

        Auth::login($user);
    }
}
