<?php

namespace App\Http\Middleware;

use Closure;

class NewSignatureMiddleware extends SignatureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $headerName = 'X-Name')
    {
        $response = $next($request);

        $response->headers->set($headerName, 'one');

        return $response;
    }
}
