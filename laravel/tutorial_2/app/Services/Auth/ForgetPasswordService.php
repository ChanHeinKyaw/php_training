<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\Auth\ForgetPasswordDaoInterface;
use App\Contracts\Services\Auth\ForgetPasswordServiceInterface;


class ForgetPasswordService implements ForgetPasswordServiceInterface
{
    /**
     * forgetPassword Dao
     */
    private $forgetPasswordDao;

    /**
     * Class Constructor
     * @param ForgetPasswordDaoInterface
     * @return
     */
    public function __construct(ForgetPasswordDaoInterface $forgetPasswordDao)
    {
        $this->forgetPasswordDao = $forgetPasswordDao;
    }

    /**
     * Save To Forget Password And Email Sending
     * @param Request $request request including inputs
     * @return
     */
    public function saveForgetPassword($request)
    {
        return $this->forgetPasswordDao->saveForgetPassword($request);
    }

    /**
     * Update Password
     * @param Request $request request including inputs
     * @return
     */
    public function saveResetPassword($request)
    {
        return $this->forgetPasswordDao->saveResetPassword($request);
    }
}
