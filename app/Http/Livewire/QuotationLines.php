<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuotationLines extends Component
{
    public $lines = [];
    public $keyCounter = 0;

    public function mount($quotation_services)
    {
        $oldLines = old('lines', []);

        if (!empty($oldLines)) {
            foreach ($oldLines as $oldLine) {
                $this->lines[] = [
                    'name' => $oldLine['name'] ?? '',
                    'quantity' => $oldLine['quantity'] ?? 1,
                    'unit_price' => $oldLine['unit_price'] ?? 0,
                ];
            }
        } else {
            if (!empty($quotation_services[0])) {
                foreach ($quotation_services as $service) {
                    $this->lines[] = [
                        'name' => $service->name,
                        'quantity' => $service->quantity,
                        'unit_price' => $service->unit_price,
                    ];
                }
            } else {
                $this->lines[] = ['name' => '', 'quantity' => 1, 'unit_price' => 0];
            }
        }
    }

    public function addLine()
    {
        $this->lines[] = ['name' => '', 'quantity' => 1, 'unit_price' => 0];
    }

    public function removeLine($index)
    {
        unset($this->lines[$index]);
        $this->lines = array_values($this->lines); // Re-index the array
    }

    public function render()
    {
        return view('livewire.quotation-lines', [
            'lines' => $this->lines,
        ]);
    }
}
