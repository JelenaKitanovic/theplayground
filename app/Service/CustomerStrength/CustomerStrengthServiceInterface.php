<?php


namespace App\Service;


use App\Models\CustomerInterface;
use App\Models\CustomerStrengthInterface;
use App\Models\StrengthInterface;

interface CustomerStrengthServiceInterface
{
    public function addCustomerStrength(
        CustomerInterface $customer,
        StrengthInterface $strength
    ): CustomerStrengthInterface;
}
