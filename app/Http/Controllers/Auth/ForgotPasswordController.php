<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    protected function validateEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $executed = RateLimiter::attempt(
        'send-reset-link:'.$request->ip(),
        $perMinute = 2,
        function() {}
    );

    if (! $executed) {
        throw ValidationException::withMessages([
            'email' => 'Too many reset attempts. Please wait and try again.',
        ]);
    }
}
    

    use SendsPasswordResetEmails;
}

