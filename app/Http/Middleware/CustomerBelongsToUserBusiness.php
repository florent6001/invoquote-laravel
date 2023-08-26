<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerBelongsToUserBusiness
{
    public function handle(Request $request, Closure $next)
    {
        $customer = $request->route('customer');

        if ($customer) {
            $user = auth()->user();

            if (!$user->businesses->contains($customer->business)) {
                abort(403, 'Vous n\'avez pas accès à ce client.');
            }
        }

        return $next($request);
    }
}
