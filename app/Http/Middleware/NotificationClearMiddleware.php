<?php

namespace App\Http\Middleware;

use Closure;

class NotificationClearMiddleware
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
        if (($user = auth()->user()) && ($id = $request->input('notification_id'))) {
            optional($user->notifications()->find($id))->delete();
        }

        return $next($request);
    }
}
