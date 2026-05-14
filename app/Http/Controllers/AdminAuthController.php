<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
      public function loginForm()
    {
        return view('backend.auth.login');
    }

     public function logOut(){
        Auth::logout();
        return redirect('/');
    }

}
