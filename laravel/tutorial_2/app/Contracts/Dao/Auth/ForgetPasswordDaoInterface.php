<?php

namespace App\Contracts\Dao\Auth;



interface ForgetPasswordDaoInterface
{
    /**
     * Save Forget Password User And Email Sending
     * @param $request
     */
    public function saveForgetPassword($request);

    /**
     * Update Password
     * @param $request
     */
    public function saveResetPassword($request);
}
