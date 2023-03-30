<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticateAdmin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // $cekAdmin = \App\Models\Admin::where('username', $request->username)->first();
        // Log::info('check = '.Auth::guard('admin')->check());
        if(!Auth::guard('admin')->check()){
            return route('loginAdmin');
        }
        return $next($request);
    }
}