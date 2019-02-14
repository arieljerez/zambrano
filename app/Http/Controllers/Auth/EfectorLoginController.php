<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class EfectorLoginController extends Controller
{

    use AuthenticatesUsers;
    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = '/efector/home';
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
      $this->middleware('guest:efector')->except('logout');
    }

    public function username()
    {
        return 'usuario';
    }
    /**
    * Show the application’s login form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showLoginForm()
    {
      return view('auth.efector-login');
    }

    protected function guard()
    {
      return Auth::guard('efector');
    }

}
