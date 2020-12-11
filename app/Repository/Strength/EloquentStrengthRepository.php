<?php

namespace App\Repository;

use App\Models\Strength;
use App\Models\User;
use App\Models\UserInterface;
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

    public function getByUser(UserInterface $user): Collection
    {
        //$user->strengths -> Collection
        return User::find($user->id)->strengths()->get();
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
