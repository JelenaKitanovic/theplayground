<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strength extends Model implements StrengthInterface
{
    protected $guarded = [];

    public function customerStrengths()
    {
        return $this->hasMany(CustomerStrength::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, "customer_strength");
    }
}
