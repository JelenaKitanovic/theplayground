<?php

namespace App\Repository;

use App\Models\Strength;
use Illuminate\Database\Eloquent\Collection;

class EloquentStrengthRepository implements StrengthRepositoryInterface
{
    public function getById(int $id): Strength
    {
        return Strength::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return Strength::all();
    }

    public function save($strength): void
    {
        $strength->save();
    }

    public function delete($strength): void
    {
        $strength->delete();
    }
}
