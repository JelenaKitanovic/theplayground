<?php

namespace App\Repository;

use App\Models\StrengthInterface;

interface StrengthRepositoryInterface extends RepositoryInterface
{
    public function getById(int $id): StrengthInterface;
}
