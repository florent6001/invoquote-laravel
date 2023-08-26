<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BusinessBelongsToUser
{
    public function handle(Request $request, Closure $next)
    {
        $business = $request->route('business');

        if ($business) {
            $user = auth()->user();

            if (!$user->businesses->contains($business)) {
                abort(403, 'Vous n\'avez pas accès à cette entreprise.');
            }
        }

        return $next($request);
    }
}
