<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Response;

class ApiAbonner
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, \Closure $next)
    {
        if(!$request->user()->subscribed('boost')){
            return Response::json(['msg'=>'no subscription.'],402);
        }
        return $next($request);
    }

}
