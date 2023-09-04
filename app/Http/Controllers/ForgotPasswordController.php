<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    //send email
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('components.auth.forgot');
    }

    //forgot pass

    public function showResetForm(Request $request, $token)
    {
        return view('components.auth.reset', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $response == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', trans($response))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }
}
