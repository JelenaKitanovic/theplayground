<?php

namespace App\Adapter;

use App\Models\Entity;
use App\Models\Strength;
use Illuminate\Database\Eloquent\Model;

interface EloquentStrengthAdapterInterface extends EloquentAdapterInterface
{
    public function toEloquent(Entity $strength): Model;

    public function toEntity(Model $model): Strength;
}
