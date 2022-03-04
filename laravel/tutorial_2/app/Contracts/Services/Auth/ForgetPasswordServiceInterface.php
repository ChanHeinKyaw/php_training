<?php

namespace App\Contracts\Services\Auth;


interface ForgetPasswordServiceInterface
{
    /**
     * Save Forget Password And Email Sendgin
     * @param $request
     */
    public function saveForgetPassword($request);

    /**
     * Update Password
     * @param $request
     */
    public function saveResetPassword($request);
}
