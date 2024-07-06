<?php

namespace App\Http\Middleware;

use App\Exceptions\GeneralException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class CheckUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('locale')) {
            $acceptLanguage = $request->header('Accept-Language');
            $languages = $this->parseAcceptLanguage($acceptLanguage);
            $preferredLanguage = $languages[0];
            $locale = $preferredLanguage == "vi-VN" ? "vi" : "jp";
            session(['locale' => $locale]);
            App::setLocale($locale);
        }

        if (!$request->user()) {
            throw new GeneralException('Unauthorized', 403, 403);
        }

        $routeName = $request->route()->getName();

        $allowedRoutes = [
            'user.index',
            'user.custom_update',
            'client.index',
            'statistical.viewStatisticalAdmin',
            'data.showDataMaster',
            'data.loadDataMaster',
            'data.createDataMaster',
            'data.updateDataMaster',
            'project.index',
            'project.search',
            'project.store',
            'project.getListMembers',
            'project.getListMembersByProject',
            'project.getManagerByProject',
            'project.updateProject',
            'working-time.show',
            'working-time.search',
            'gitlab.admin',
            'gitlab.admin.month'
        ];

        if ($request->user()->role !== 0 && in_array($routeName, $allowedRoutes)) {
            throw new GeneralException('Unauthorized', 403, 403);
        }

        return $next($request);
    }

    private function parseAcceptLanguage($acceptLanguage)
    {
        $languages = explode(',', $acceptLanguage);
        $parsedLanguages = [];

        foreach ($languages as $language) {
            $parts = explode(';q=', $language);
            $locale = trim($parts[0]);
            $quality = isset($parts[1]) ? (float) $parts[1] : 1.0;
            $parsedLanguages[$locale] = $quality;
        }
        arsort($parsedLanguages);
        return array_keys($parsedLanguages);
    }
}
