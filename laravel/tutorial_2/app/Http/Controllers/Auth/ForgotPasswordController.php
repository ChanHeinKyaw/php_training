<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordFormRequest;
use App\Http\Requests\ForgetPasswordFormRequest;
use App\Contracts\Services\Auth\ForgetPasswordServiceInterface;

class ForgotPasswordController extends Controller
{
    private $forgetPasswordInterface;

    public function __construct(ForgetPasswordServiceInterface $forgetPasswordServiceInterface)
    {
      $this->forgetPasswordInterface = $forgetPasswordServiceInterface;
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(ForgetPasswordFormRequest $request)
    {
        $this->forgetPasswordInterface->saveForgetPassword($request);
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(ResetPasswordFormRequest $request)
    {
        $this->forgetPasswordInterface->saveResetPassword($request);
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
