<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('api-key');
        if ($token !== config('wpy.api_key')) {
            return response()->json(['message' => 'Invalid Authentication'], Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
