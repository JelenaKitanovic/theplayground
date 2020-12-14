<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements CustomerInterface
{
    public const VALIDATION_RULES = [
        "full_name" => ["required"],
        "goal" => ["in:"],
        "age" => ["required", "integer"]
    ];

    protected $guarded = [];

    public function customerStrengths()
    {
        return $this->hasMany(CustomerStrength::class);
    }

    public function strengths()
    {
        return $this->belongsToMany(Strength::class, "customer_strength");
    }}
