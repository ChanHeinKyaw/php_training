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
    private $authInterface;

    public function __construct(AuthServiceInterface $authServiceInterface)
    {
      $this->authInterface = $authServiceInterface;
    }

    public function index()
    {
        return view('auth.login');
    }  
      
    public function registration()
    {
        return view('auth.registration');
    }
      
    public function postLogin(LoginRequest $request)
    {   
        $this->authInterface->loginUser($request);
        return redirect('/');
    }


    public function postRegistration(RegisterRequest $request)
    {             
        $this->authInterface->saveUser($request);
        return redirect('/');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
