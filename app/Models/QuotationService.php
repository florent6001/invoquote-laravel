<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quotation;

class QuotationService extends Model
{

    protected $fillable = [
        'name',
        'quantity',
        'unit_price',
        'quotation_id'
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    use HasFactory;
}
