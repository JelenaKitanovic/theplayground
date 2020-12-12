<?php


namespace App\Factory;


use App\Models\CustomerInterface;
use App\Models\CustomerStrengthInterface;
use App\Models\StrengthInterface;

interface CustomerStrengthFactoryInterface
{
    public function create(CustomerInterface $customer, StrengthInterface $strength): CustomerStrengthInterface;
}
