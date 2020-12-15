<?php


namespace App\Models;


interface StrengthInterface
{
    public const ATTRIBUTE_ID = "id";
    public const ATTRIBUTE_TITLE = "title";

    public function getTitle(): string;
}
