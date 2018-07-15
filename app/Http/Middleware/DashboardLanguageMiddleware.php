<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Locales\Language;

class DashboardLanguageMiddleware
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
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }

        config()->set('adminlte.appearence.dir', Language::current()->getDirection());

        Carbon::setLocale(Language::current()->getCode());

        return $next($request);
    }
}
