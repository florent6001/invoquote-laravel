<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Cookie;
use Illuminate\View\View;

use function Ramsey\Uuid\v1;

class DashboardController extends Controller
{
    public function index(): View
    {
        $active_business = Business::FindOrFail(Cookie::get('active_business'));
        $quotations = $active_business->quotations->take(5);
        $invoices = $active_business->invoices->take(5);

        return view('dashboard.index', [
            'quotations' => $quotations,
            'invoices' => $invoices
        ]);
    }
}
