<?php

namespace App\Factory;

use App\Models\Strength;

class StrengthFactory
{
    public function create(string $title): Strength
    {
        return Strength::make(
            [
                Strength::ATTRIBUTE_TITLE => $title
            ]
        );
    }
}
