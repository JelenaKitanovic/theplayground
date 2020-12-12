<?php

namespace App\Service;

use App\Models\UserInterface;

interface UserServiceInterface
{
    public function addUser(string $name, string $email, string $password): UserInterface;
}
