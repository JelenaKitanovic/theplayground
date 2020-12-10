<?php

namespace App\Models;

class Strength extends AbstractModel
{
    protected string $title;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }
}
