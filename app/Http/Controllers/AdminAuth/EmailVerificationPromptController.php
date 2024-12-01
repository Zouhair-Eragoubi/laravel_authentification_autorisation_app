<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Auth::guard('admin')->user() && Auth::guard('admin')->user()->hasVerifiedEmail()
        ? redirect()->intended(RouteServiceProvider::BACK_HOME)
        : view('back.auth.verify-email');
    }
}
