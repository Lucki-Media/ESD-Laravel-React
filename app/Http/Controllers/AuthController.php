<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        // echo 'HIII<pre>';print_r($request->all());exit;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($this->guard($request)->attempt($request->only('email', 'password'))) {
            //Authentication passed...
            return redirect('admin/dashboard');
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Oppes! You have entered invalid credentials']);
        }
    }

    protected function guard($request)
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login')->with('success', 'Admin has been logged out!');
    }
}
