<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'website_url',
        'address',
        'country',
        'zip_code',
        'city',
        'notes',
        'business_id',
        'registration_number'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function invoices()
    {
        return $this->hasManyThrough(Invoice::class, Quotation::class, 'customer_id', 'quotation_id');
    }

    public function getFullNameAttribute() : string
    {
        if($this->attributes['type'] == 0) {
            return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
        } else {
            return $this->name;
        }
    }
}
