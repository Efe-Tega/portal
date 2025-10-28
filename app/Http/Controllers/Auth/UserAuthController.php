<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLogin()
    {

        return view('auth.user-login');
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('registration_number', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors(['password' => 'Invalid credentials']);
    }
}
