<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerAuthController extends Controller
{
    public function logout()
    {
        Auth::guard('farmer')->logout();
        return redirect()->route('farmer.login');
    }
}
