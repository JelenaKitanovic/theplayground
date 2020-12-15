<?php

namespace App\Repository;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getById(int $id): ?User
    {
        return User::findOrFail($id);
    }

    public function getAllWithRelations(): array
    {
        return User::all()->toArray();
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
