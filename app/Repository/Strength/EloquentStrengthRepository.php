<?php

namespace App\Repository;

use App\Models\Strength;
use App\Models\StrengthInterface;
use App\Models\User;
use App\Models\UserInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentStrengthRepository implements StrengthRepositoryInterface
{
    public function getById(int $id): Strength
    {
        return Strength::findOrFail($id);
    }

    public function getByTitle(string $title): Strength
    {
        return Strength::where(StrengthInterface::ATTRIBUTE_TITLE, $title)->firstOrfail();
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
