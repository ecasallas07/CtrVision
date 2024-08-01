<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('success', 'Login Success');    
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
