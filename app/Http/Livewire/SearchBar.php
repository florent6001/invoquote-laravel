<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Quotation;
use Cookie;
use Livewire\Component;

class SearchBar extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $business_id = Cookie::get('active_business');

        if ($this->searchTerm) {
            $results = [
                'invoices' => Invoice::whereHas('customer', function ($query) use ($business_id) {
                    $query->where('business_id', $business_id);
                })
                    ->where(function ($query) use ($searchTerm) {
                        $query->whereHas('quotation', function ($subQuery) use ($searchTerm) {
                            $subQuery->where('name', 'like', "%$searchTerm%");
                        })
                            ->orWhereHas('customer', function ($subQuery) use ($searchTerm) {
                                $subQuery->where('first_name', 'like', "%$searchTerm%")
                                    ->orWhere('last_name', 'like', "%$searchTerm%");
                            });
                    })
                    ->limit(3)
                    ->get(),
                'quotations' => Quotation::whereHas('customer', function ($query) use ($business_id) {
                    $query->where('business_id', $business_id);
                })
                    ->where(function ($query) use ($searchTerm) {
                        $query->where('name', 'like', "%$searchTerm%")
                            ->orWhereHas('customer', function ($subQuery) use ($searchTerm) {
                                $subQuery->where('first_name', 'like', "%$searchTerm%")
                                    ->orWhere('last_name', 'like', "%$searchTerm%");
                            });
                    })
                    ->limit(3)
                    ->get(),
                'customers' => Customer::where('business_id', $business_id)
                    ->where(function ($query) use ($searchTerm) {
                        $query->where('first_name', 'like', "%$searchTerm%")
                            ->orWhere('last_name', 'like', "%$searchTerm%");
                    })
                    ->limit(3)
                    ->get(),
            ];
        } else {
            $results = array();
        }


        return view('livewire.search-bar', ['results' => $results]);
    }
}
