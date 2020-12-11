<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return User::all();
    }

    public function save($user): void
    {
        $user->save();
    }

    public function delete($user): void
    {
        $user->delete();
    }
}
