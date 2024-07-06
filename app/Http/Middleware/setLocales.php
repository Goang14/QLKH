<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use App\Exceptions\GeneralException;

class setLocales
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')) {
            $locale = session()->get('locale') ?? 'jp';
            if (! in_array($locale, config('const.locale'))) {
                throw new GeneralException('禁止', 404, 404);
            }
            App::setLocale($locale);
        }
        return $next($request);
    }
}
