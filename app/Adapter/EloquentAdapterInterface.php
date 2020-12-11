<?php

namespace App\Adapter;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Model;

interface EloquentAdapterInterface
{
    public function toEloquent(Entity $entity): Model;

    public function toEntity(Model $model): Entity;
}
