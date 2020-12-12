<?php


namespace App\Repository;


use App\Models\CustomerStrength;
use App\Models\Strength;
use Illuminate\Database\Eloquent\Collection;

class EloquentCustomerStrengthRepository implements CustomerStrengthRepositoryInterface
{
    public function save($customerStrength): void
    {
        $customerStrength->save();
    }

    public function getById(int $id): Strength
    {
        return Strength::findOrFail();
    }

    public function getAll(): Collection
    {
        return Strength::all();
    }

    public function delete($strength): void
    {
        $strength->delete();
    }
}
