<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailVerificationRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  App\Http\Requests\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        $admin = Auth::guard("admin")->user();
        if ($admin->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::BACK_HOME.'?verified=1');
        }

        if ($admin->markEmailAsVerified()) {
            event(new Verified($admin));
        }

        return redirect()->intended(RouteServiceProvider::BACK_HOME.'?verified=1');
    }
}
