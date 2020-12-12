<?php

namespace App\Factory;

use App\Models\Strength;
use App\Models\StrengthInterface;

class StrengthFactory implements StrengthFactoryInterface
{
    public function create(string $title): StrengthInterface
    {
        return Strength::make(
            [
                Strength::ATTRIBUTE_TITLE => $title
            ]
        );
    }
}
