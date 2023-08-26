<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registration_number',
        'email',
        'phone_number',
        'address',
        'city',
        'zip_code',
        'country',
        'tax_rate',
        'logo',
        'quote_validity_days',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function invoices() 
    {
        return $this->hasManyThrough(Invoice::class, Customer::class);
    }

    public function quotations() 
    {
        return $this->hasManyThrough(Quotation::class, Customer::class);
    }
}
