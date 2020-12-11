<?php


namespace App\Repository;


use App\Models\CustomerStrength;

class EloquentCustomerStrengthRepository implements CustomerStrengthRepositoryInterface
{
    public function save(CustomerStrength $customerStrength): void
    {
        $customerStrength->save();
    }
}
