<?php


namespace App\Http\Middleware;


use Closure;

class AdminAuthenticate
{
    public function  handle($request, Closure $next)
    {
        return $request->user()->isAdmin ? $next($request) : redirect('/client');
    }
}
