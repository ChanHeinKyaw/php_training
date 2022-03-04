<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordFormRequest;
use App\Http\Requests\ForgetPasswordFormRequest;
use App\Contracts\Services\Auth\ForgetPasswordServiceInterface;

class ForgotPasswordController extends Controller
{
    /**
     * ForgetPassword Interface
     */
    private $forgetPasswordInterface;

    /**
     * Create a new controller instance.
     * @param ForgetPasswordServiceInterface $forgetPasswordServiceInterface
     * @return void
     */
    public function __construct(ForgetPasswordServiceInterface $forgetPasswordServiceInterface)
    {
        $this->forgetPasswordInterface = $forgetPasswordServiceInterface;
    }

    /**
     * View Forget Password Form
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Submit Forget Password
     * @param ForgetPasswordFormRequest $request
     * @return Forget Password Form Page
     */
    public function submitForgetPasswordForm(ForgetPasswordFormRequest $request)
    {
        $this->forgetPasswordInterface->saveForgetPassword($request);
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * View Reset Password Form
     * @param $token
     * @return Send to email Reset Password Link
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Submit Reset Password Form
     * @param ResetPasswordFormRequest $request
     * @return Login Page
     */
    public function submitResetPasswordForm(ResetPasswordFormRequest $request)
    {
        $this->forgetPasswordInterface->saveResetPassword($request);
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
