<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class QuotationBelongsToUserBusiness
{
    public function handle(Request $request, Closure $next)
    {
        $quotation = $request->route('quotation');

        if ($quotation) {
            $user = auth()->user();

            if (!$user->businesses->contains($quotation->customer->business))
            {
                abort(403, 'Vous n\'avez pas accès à ce devis.');
            }

            if(in_array($request->route()->getName(), ['dashboard.quotation.update', 'dashboard.quotation.edit']) && $quotation->state === 1 || $quotation->state === 2)
            {
                abort(403, 'Vous ne pouvez plus modifié ce devis.');
            }
        }

        return $next($request);
    }
}
