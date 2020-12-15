<?php

namespace App\Repository;

use App\Models\CustomerStrength;

class EloquentCustomerStrengthRepository implements CustomerStrengthRepositoryInterface
{
    public function save($customerStrength): void
    {
        $customerStrength->save();
    }

    public function getById(int $id): ?CustomerStrength
    {
        return CustomerStrength::findOrFail();
    }

    public function getAll(): array
    {
        return CustomerStrength::all()->toArray();
    }

    public function delete($strength): void
    {
        $strength->delete();
    }
}
