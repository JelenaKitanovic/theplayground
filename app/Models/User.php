<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements UserInterface
{
    protected $guarded = [];

    public function userStrength()
    {
        return $this->hasOne(UserStrength::class);
    }
}
