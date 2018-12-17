<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class EfectorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:efector');
    }

    public function home()
    {
      return view('efector.home');
    }
}
