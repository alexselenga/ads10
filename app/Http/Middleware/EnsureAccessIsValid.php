<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAccessIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $modelName = $request->route()->parameterNames[0] ?? null;
        $model = $request->route()->parameters[$modelName] ?? null;

        if ($model?->access) {
            return $next($request);
        }

        return response('Forbidden.', 403);
    }
}
