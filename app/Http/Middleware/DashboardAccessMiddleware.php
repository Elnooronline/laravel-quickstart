<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class DashboardAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->isAdmin()) {
            return $next($request);
        }

        return abort(Response::HTTP_NOT_FOUND);
    }
}