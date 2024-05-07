<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $abilities): Response
    {

        // $user_abilites = explode('|', Auth::user()->roles);

        $user_abilites = Auth::user()->roles;



        $route_abilites = explode('|', $abilities);

        return count(array_intersect($user_abilites, $route_abilites)) > 0 ?
            $next($request) :

            abort(403, 'You are not allowed to access this page');
    }
}
