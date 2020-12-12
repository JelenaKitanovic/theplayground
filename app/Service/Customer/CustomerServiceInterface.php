<?php

namespace App\Service;

use App\Models\CustomerInterface;

interface CustomerServiceInterface
{
    public function addCustomer(
        string $fullName,
        string $email,
        string $goal,
        int $age,
        string $idealPartner,
        ?string $favouriteQuote,
        ?string $favouriteGame,
        ?string $availability
    ): CustomerInterface;
}
