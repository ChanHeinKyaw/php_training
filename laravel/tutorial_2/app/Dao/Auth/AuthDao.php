<?php

namespace App\Dao\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Auth\AuthDaoInterface;

class AuthDao implements AuthDaoInterface
{
    /**
     * Create User with inputs values
     * @param $request
     * @return Home View
     */
    public function saveUser($request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Great! You have Successfully loggedin');
        }
    }
}
