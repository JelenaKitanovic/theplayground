<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strength extends Model implements StrengthInterface
{
    protected $guarded = [];

    public function userStrengths()
    {
        return $this->hasMany(UserStrength::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "user_strength");
    }
}
