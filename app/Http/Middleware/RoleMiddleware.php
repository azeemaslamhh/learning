<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {

        if ($request->user()->hasRole($role) != "admin") {

            Auth::logout();
            return redirect('/login')->with('error-message', 'You do not have permission to access this page');
        }

        return $next($request);
    }
}
