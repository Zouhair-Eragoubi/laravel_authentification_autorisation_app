<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate extends Middleware
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (!Auth::guard("admin")->check()) {
            return redirect("back/login");
        }
        return $next($request);
    }

}
