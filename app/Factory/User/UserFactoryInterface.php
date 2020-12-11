<?php


namespace App\Factory;


use App\Models\UserInterface;

interface UserFactoryInterface
{
    public function create(
        string $name,
        string $email,
        string $password
    ): UserInterface;
}
