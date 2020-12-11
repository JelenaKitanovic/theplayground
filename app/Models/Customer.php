<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements CustomerInterface
{
    protected $guarded = [];

    public function customerStrengths()
    {
        return $this->hasMany(CustomerStrength::class);
    }

    public function strengths()
    {
        return $this->belongsToMany(Strength::class);
    }}
