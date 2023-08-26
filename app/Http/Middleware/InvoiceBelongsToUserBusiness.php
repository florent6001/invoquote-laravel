<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InvoiceBelongsToUserBusiness
{
    public function handle(Request $request, Closure $next)
    {
        $invoice = $request->route('invoice');

        if ($invoice) {
            $user = auth()->user();

            if (!$user->businesses->contains($invoice->quotation->customer->business))
            {
                abort(403, 'Vous n\'avez pas accès à cette facture.');
            }
        }

        return $next($request);
    }
}
