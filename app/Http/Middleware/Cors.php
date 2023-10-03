<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
              // Pre-Middleware Action

        //$response = $next($request);

        // Post-Middleware Action

        //return $response;
        return $next($request)
        ->header('Access-Control-Allow-Origin','*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers','Content-Type, Accept, Authorization, X-Requested-With, Application');
    }
}