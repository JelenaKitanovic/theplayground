<?php

namespace App\Factory;

use App\Models\CustomerInterface;
use App\Models\CustomerStrength;
use App\Models\CustomerStrengthInterface;
use App\Models\StrengthInterface;

class CustomerStrengthFactory implements CustomerStrengthFactoryInterface
{
    public function create(CustomerInterface $customer, StrengthInterface $strength): CustomerStrengthInterface
    {
        return CustomerStrength::make(
            [
                CustomerStrength::ATTRIBUTE_CUSTOMER_ID => $customer->id,
                CustomerStrength::ATTRIBUTE_STRENGTH_ID => $strength->id
            ]
        );
    }
}
