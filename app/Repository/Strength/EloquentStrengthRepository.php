<?php

namespace App\Repository;

use App\Models\Strength;

class EloquentStrengthRepository implements StrengthRepositoryInterface
{
    public function getById(int $id): ?Strength
    {
        return Strength::findOrFail($id);
    }

    public function getByTitle(string $title): ?Strength
    {
        return Strength::where(Strength::ATTRIBUTE_TITLE, $title)->firstOrfail();
    }

    public function getAll(): array
    {
        return Strength::all()->toArray();
    }

    public function countAll(): int
    {
        return Strength::count();
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
