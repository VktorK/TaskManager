<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(Request): (Response|RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {

        if(auth()->user()->is_admin)
        {
            return $next($request);
        }
            return response()->json(["message" => "not admin"]);
    }

}
