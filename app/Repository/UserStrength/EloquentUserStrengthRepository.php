<?php


namespace App\Repository;


use App\Models\User;
use App\Models\UserStrength;

class EloquentUserStrengthRepository implements UserStrengthRepositoryInterface
{
    public function save(UserStrength $userStrength) {

    }

    public function getByUser(User $user): array
    {
        $userStrengths = UserStrength::where("user_id", $user->getId())->get();
    }
}
