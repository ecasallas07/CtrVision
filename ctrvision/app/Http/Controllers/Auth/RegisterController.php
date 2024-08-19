<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
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
        $user = User::create($data);

        Auth::login($user);
        $user->sendEmailVerificationNotification();
        return redirect()->route('verification.notice');

    }

    public function verifyEmail(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        return redirect('/email-verification');
    }

    public function requestEmailVerification(Request $request) : RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

}
