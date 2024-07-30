<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'username'=>'required',
            'email'=> 'required|unique:users,email',
            'password'=> 'required',
            'confirm-password'=> 'required|same:password'
        ]);

        // excluye campos obtenidos del request, significa q  en data no trae password, esto con el fin de encoentrarla con $request->password
        $data = $request->except('password','confirm-password');
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect('/');

    }




}
