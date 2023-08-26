<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'customer_id',
        'state'
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function getSubtotalPriceAttribute()
    {
        $totalPrice = 0;

        foreach ($this->quotation->quotation_services as $service) {
            $totalPrice += $service->unit_price * $service->quantity;
        }

        return $totalPrice;
    }

    public function getTaxPriceAttribute()
    {
        return $this->getSubtotalPriceAttribute() * $this->quotation->customer->business->tax_rate / 100;
    }

    public function getTotalPriceWithTaxesAttribute()
    {
        return $this->getSubtotalPriceAttribute() + $this->getTaxPriceAttribute();
    }
}
