<?php

namespace App\Factory;

use App\Models\Customer;
use App\Models\CustomerStrength;
use App\Models\Strength;

class CustomerStrengthFactory
{
    public function create(Customer $customer, Strength $strength): CustomerStrength
    {
        $customerStrength = CustomerStrength::make();
        $customerStrength->customer_id = $customer->getAttribute(Customer::ATTRIBUTE_ID);
        $customerStrength->strength_id = $strength->getAttribute(Strength::ATTRIBUTE_ID);

        return $customerStrength;
    }
}
