<?php

namespace App\Http\Livewire;

use App\Models\Business;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Quotation;
use App\Models\Invoice;
use Cookie;

class DashboardCards extends Component
{
    public $newCustomersCount;
    public $generatedQuotationsCount;
    public $acceptedQuotationsCount;
    public $totalRevenue;
    public $days = 30;

    public function render()
    {
        $active_business = Cookie::get('active_business');
        $startDate = now()->subDays($this->days);

        $this->newCustomersCount = Customer::where('business_id', $active_business)
            ->where('created_at', '>=', $startDate)
            ->count();

        $this->generatedQuotationsCount = Quotation::whereHas('customer', function ($query) use ($active_business) {
            $query->where('business_id', $active_business);
        })
            ->where('created_at', '>=', $startDate)
            ->count();

        $this->acceptedQuotationsCount = Quotation::whereHas('customer', function ($query) use ($active_business) {
            $query->where('business_id', $active_business);
        })
            ->where('created_at', '>=', $startDate)
            ->where('state', '=', '1')
            ->count();

        $this->totalRevenue = Quotation::whereHas('customer', function ($query) use ($active_business) {
            $query->where('business_id', $active_business);
        })
            ->where('created_at', '>=', $startDate)
            ->get()
            ->sum(function ($quotation) use ($active_business) {
                $tax_rate = Business::findOrFail($active_business)->tax_rate;
                return $quotation->subtotal_price * (1 + ($tax_rate / 100));
            });

        return view('livewire.dashboard-cards');
    }
}
