<?php


namespace App\Factory;


use App\Models\StrengthInterface;

interface StrengthFactoryInterface
{
    public function create(string $title): StrengthInterface;
}
