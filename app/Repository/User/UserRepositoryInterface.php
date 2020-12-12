<?php

namespace App\Repository;

use App\Models\UserInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getById(int $id): UserInterface;
}
