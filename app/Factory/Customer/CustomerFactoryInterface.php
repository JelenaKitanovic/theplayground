<?php


namespace App\Factory;


use App\Models\CustomerInterface;

interface CustomerFactoryInterface
{
    public function create(
        string $fullName,
        string $email,
        string $goal,
        int $age,
        string $idealPartner,
        string $favouriteQuote,
        string $favouriteGame,
        string $availability
    ): CustomerInterface;
}
