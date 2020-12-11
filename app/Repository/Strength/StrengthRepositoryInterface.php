<?php

namespace App\Repository;

use App\Models\UserInterface;

interface StrengthRepositoryInterface extends RepositoryInterface
{
    public function getByUser(UserInterface $user);
}
