<?php

namespace App\Contracts\Services\Auth;


interface AuthServiceInterface
{
    /**
     * Create user
     * @param $request
     */
    public function saveUser($request);

    /**
     * To Login User
     * @param $request
     */
    public function loginUser($request);
}
