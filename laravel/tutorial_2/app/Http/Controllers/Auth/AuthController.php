<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use App\Contracts\Services\Auth\AuthServiceInterface;

class AuthController extends Controller
{
    /**
     * Auth Interface
     */
    private $authInterface;

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    /**
     * View Login Page
     * @return View Login
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * View Register Page
     * @return View Register
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * To Login User
     * @param LoginRequest $request
     * @return View Home Page
     */
    public function postLogin(LoginRequest $request)
    {
        $this->authInterface->loginUser($request);
        return redirect('/');
    }

    /**
     * To Create Register User
     * @param RegisterRequest $request
     * @return View Home Page
     */
    public function postRegistration(RegisterRequest $request)
    {
        $this->authInterface->saveUser($request);
        return redirect('/');
    }

    /**
     * To logout
     * @return View Login Page
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
