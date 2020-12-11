<?php

namespace App\Factory;

use App\Models\User;

class UserFactory implements UserFactoryInterface
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
    ): User {
        return User::make(
            [
                User::ATTRIBUTE_NAME => $name,
                User::ATTRIBUTE_EMAIL => $email,
                User::ATTRIBUTE_GOAL => $goal,
                User::ATTRIBUTE_AGE => $age,
                User::ATTRIBUTE_IDEAL_PARTNER => $idealPartner,
                User::ATTRIBUTE_FAVOURITE_QUOTE => $favouriteQuote,
                User::ATTRIBUTE_FAVOURITE_GAME => $favouriteGame,
                User::ATTRIBUTE_AVAILABILITY => $availability,
                User::ATTRIBUTE_IS_MATCHED => false
            ]
        );
    }
}
