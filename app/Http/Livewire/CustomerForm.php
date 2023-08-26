<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerForm extends Component
{

    public $customer;
    public $type;
    public $countries;

    public function mount($customer = null) {
        $this->customer = $customer;
        $this->type = $customer ? $customer->type : null;
        $this->countries = \Countries::getList('en');
    }

    public function render()
    {
        return view('livewire.customer-form');
    }
}
