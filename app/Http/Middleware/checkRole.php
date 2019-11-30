<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;    //Add Auth facades

use Illuminate\Http\Request;
use Closure;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)  // ***Add 3rd parameter $role
    {
        if (!Auth::check()) //Optional
            return redirect(route('login'));

        $user = Auth::user();
        if($user->role == $role)    // this $role coming from Controller to verify role authority
        {
            return $next($request);
        }
        else    // If not matched goto login then there will be redirected to correct path
        {
            return redirect(route('login'));
        }
        // return $next($request);
    }
}
