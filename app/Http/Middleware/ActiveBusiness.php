<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class ActiveBusiness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($request->hasCookie('active_business') && Cookie::get('active_business') !== "0")
        {
            if ($user && !$user->businesses->contains('id', $request->cookie('active_business')))
            {
                return $next($request)->cookie('active_business', 0);
            }
        }
        else
        {
            if ($user->businesses->count() > 0)
            {
                $activeBusiness = $user->businesses->first();

                if($activeBusiness->id)
                {
                    return $next($request)->cookie(Cookie::forget('active_business'))->cookie('active_business', $activeBusiness->id, 60 * 24 * 365); // Set the cookie for 1 year
                }
            }
            else
            {
                if(!$request->routeIs('dashboard.business.*'))
                {
                    return redirect()->route('dashboard.business.create');
                }
            }
        }

        return $next($request); // Set the cookie for 1 year
    }
}
