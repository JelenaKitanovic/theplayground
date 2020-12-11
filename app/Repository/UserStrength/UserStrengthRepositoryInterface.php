<?php

namespace App\Repository;

use App\Models\User;
use App\Models\UserStrength;

interface UserStrengthRepositoryInterface
{
    public function save(UserStrength $userStrength);

    public function getByUser(User $user): array;
}
