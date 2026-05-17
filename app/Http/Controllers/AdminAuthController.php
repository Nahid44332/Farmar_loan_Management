<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
       // LOGIN PAGE
    public function loginForm()
    {
        return view('backend.auth.login');
    }

    // LOGIN SUBMIT
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    // LOGOUT
    public function logOut()
    {
        Auth::logout();

        return redirect('/admin');
    }
}

   


