<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerStrength extends Model implements CustomerStrengthInterface
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function strength()
    {
        return $this->belongsTo(Strength::class);
    }}
