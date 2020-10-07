<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\App;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, \Closure $next)
    {
        $request_token = $request->_token;
        $session_token = csrf_token();
        if($request_token!=$session_token){
            return redirect('login')->with('msg','your operation is too frequent, please try again later');
        }
        $request->getSession()->regenerateToken();

        return $next($request);
    }
}
