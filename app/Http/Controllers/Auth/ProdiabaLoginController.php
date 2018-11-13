<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class ProdiabaLoginController extends Controller
{
    /**
    * Show the application’s login form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showLoginForm()
    {
      return view('auth.prodiaba-login');
    }

    protected function guard()
    {
      return Auth::guard('prodiaba');
    }

    use AuthenticatesUsers;
    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = '/prodiaba/home';
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
      $this->middleware('guest:prodiaba')->except('logout');
    }
}
