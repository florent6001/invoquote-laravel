<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Request;

class InvoiceState extends Component
{

    public $invoice;
    public $state;

    public function updatedState()
    {
        $this->invoice->state = $this->state;
        $this->invoice->save();

        toastr()->success('Le statut de la facture a bien été modifié.');
    }

    public function mount($invoice)
    {
        $this->state = $invoice->state;
    }


    public function __construct($invoice) {
        $this->invoice = $invoice;
    }

    public function render()
    {
        return view('livewire.invoice-state');
    }
}
