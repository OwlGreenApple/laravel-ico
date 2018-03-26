<?php

namespace Icocheckr\Http\Middleware;

use Closure;

class FrameHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);
			$response = $next($request);
			// $response->header('X-Frame-Options', 'ALLOW FROM https://youtu.be');
			// $response->header('X-Frame-Options', '*');
			$response->header('X-XSS-Protection', '1; mode=block');
			$response->header('X-Content-Type-Options', 'nosniff');
			return $response;				
    }
}
