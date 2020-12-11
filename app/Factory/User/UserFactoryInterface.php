<?php


namespace App\Factory;


use App\Models\UserInterface;

interface UserFactoryInterface
{
    public function create(
        string $name,
        string $email,
        string $goal,
        int $age,
        string $idealPartner,
        string $favouriteQuote,
        string $favouriteGame,
        string $availability,
        array $strengths
    ): UserInterface;
}
