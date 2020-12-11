<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements UserInterface
{
    protected $guarded = [];

    public function userStrengths()
    {
        return $this->hasMany(UserStrength::class);
    }

    public function strengths()
    {
        return $this->belongsToMany(Strength::class, "user_strength");
    }
}
