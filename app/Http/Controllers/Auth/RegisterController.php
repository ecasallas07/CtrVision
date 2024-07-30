<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users,email',
            'password'=> 'required',
            'confirm-password'=> 'required|same:password'
        ]);



    }




}
