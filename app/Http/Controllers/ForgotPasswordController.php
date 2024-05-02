<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

date_default_timezone_set('Asia/Manila');
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    protected $farmersprofile;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'user_type']);
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('components.auth.forgot');
    }

    public function forgotpassword(Request $request)
    {
        return view('components.auth.forgot');
    }


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

        // Retrieve the FarmerProfile based on the email
        $farmersprofile = User::where('email', $request->email)->first();

        // Check if the FarmerProfile exists before logging the activity
        if ($farmersprofile) {
            $updatedAttributes = ['password'];

            // Log the "forgot password" action in the audit trail
            activity()
                ->causedBy(auth()->user())
                ->performedOn($farmersprofile)
                ->withProperties(['attributes' => $updatedAttributes])
                ->log('Forgot Password');
        }

        return $response == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', trans($response))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => trans($response)]);
    }
}
