<?php

namespace App\Factory;

use App\Models\Customer;
use App\Models\CustomerInterface;

class CustomerFactory implements CustomerFactoryInterface
{
    public function create(
        string $fullName,
        string $email,
        string $goal,
        int $age,
        string $idealPartner,
        ?string $favouriteQuote,
        ?string $favouriteGame,
        ?string $availability
    ): CustomerInterface
    {
        return Customer::make(
            [
                Customer::ATTRIBUTE_FULL_NAME => $fullName,
                Customer::ATTRIBUTE_EMAIL => $email,
                Customer::ATTRIBUTE_GOAL => $goal,
                Customer::ATTRIBUTE_AGE => $age,
                Customer::ATTRIBUTE_IDEAL_PARTNER => $idealPartner,
                Customer::ATTRIBUTE_FAVOURITE_QUOTE => $favouriteQuote,
                Customer::ATTRIBUTE_FAVOURITE_GAME => $favouriteGame,
                Customer::ATTRIBUTE_AVAILABILITY => $availability,
                Customer::ATTRIBUTE_IS_MATCHED => false
            ]
        );
    }
}
