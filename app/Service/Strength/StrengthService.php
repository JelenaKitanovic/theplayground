<?php

namespace App\Service;

use App\Factory\StrengthFactoryInterface;
use App\Models\StrengthInterface;
use App\Repository\StrengthRepositoryInterface;

class StrengthService
{
    protected StrengthRepositoryInterface $strengthRepository;
    protected StrengthFactoryInterface $strengthFactory;

    public function __construct(
        StrengthRepositoryInterface $strengthRepository,
        StrengthFactoryInterface $strengthFactory
    )
    {
        $this->strengthRepository = $strengthRepository;
        $this->strengthFactory = $strengthFactory;
    }

    public function addStrength(string $title): StrengthInterface
    {
        $strength = $this->strengthFactory->create($title);
        $this->strengthRepository->save($strength);

        return $strength;
    }
}
