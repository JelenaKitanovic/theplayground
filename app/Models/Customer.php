<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements CustomerInterface
{
    protected $guarded = [];

    public function getId(): int
    {
        return $this->id;
    }

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

    public function getStrengths(): array
    {
        return $this->strengths->all();
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
