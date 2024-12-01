<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::guard('admin')->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::BACK_HOME);
        }

        Auth::guard('admin')->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
