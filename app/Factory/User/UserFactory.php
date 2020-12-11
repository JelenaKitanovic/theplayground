<?php

namespace App\Factory;

use App\Models\User;

class UserFactory implements UserFactoryInterface
{
    public function create(
        string $name,
        string $email,
        string $password
    ): User {
        return User::make(
            [
                User::ATTRIBUTE_NAME => $name,
                User::ATTRIBUTE_EMAIL => $email,
                User::ATTRIBUTE_PASSWORD => $password
            ]
        );
    }
}
