<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements CustomerInterface
{
    use HasFactory;

    public const VALIDATION_RULES = [
        "full_name" => ["required"],
        "goal" => ["in:"],
        "age" => ["required", "integer"]
    ];

    protected $guarded = [];

    public function getGoal(): string
    {
        return $this->goal;
    }

    public function setGoal(string $goal): void
    {
        $this->goal = $goal;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age):void
    {
        $this->age = $age;
    }

    public function getIdealPartner(): string
    {
        return $this->ideal_partner;
    }

    public function setIdealPartner(string $idealPartner): void
    {
        $this->ideal_partner = $idealPartner;
    }

    public function getStrengths()
    {
        return $this->strengths();
    }

    public function setStrengths(array $strengths)
    {
        return $this->strengths()->attach($strengths);
    }

    public function customerStrengths()
    {
        return $this->hasMany(CustomerStrength::class);
    }

    public function strengths()
    {
        return $this->belongsToMany(Strength::class);
    }
}
