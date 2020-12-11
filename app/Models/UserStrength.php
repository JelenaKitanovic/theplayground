<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStrength extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function strength()
    {
        return $this->belongsTo(Strength::class);
    }
}
