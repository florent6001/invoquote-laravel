<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'state',
        'name',
        'additionals_informations'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function invoice()
    {
        return $this->hasOneThrough(Invoice::class, 'quotation_id');
    }

    public function quotation_services()
    {
        return $this->hasMany(QuotationService::class);
    }

    public function getSubtotalPriceAttribute()
    {
        $totalPrice = 0;

        foreach ($this->quotation_services as $service) {
            $totalPrice += $service->unit_price * $service->quantity;
        }

        return $totalPrice;
    }

    public function getTaxPriceAttribute()
    {
        return $this->getSubtotalPriceAttribute() * $this->customer->business->tax_rate / 100;
    }

    public function getTotalPriceWithTaxesAttribute()
    {
        return $this->getSubtotalPriceAttribute() + $this->getTaxPriceAttribute();
    }

    public function getStateLabelAttribute()
    {
        $stateMap = [
            0 => 'En attente',
            1 => 'Accepté',
            2 => 'Refusé',
        ];

        return $stateMap[$this->state] ?? '';
    }
}
