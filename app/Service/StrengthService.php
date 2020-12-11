<?php

namespace App\Service;

use App\Factory\StrengthFactoryInterface;
use App\Models\Strength;
use App\Repository\StrengthRepositoryInterface;
use App\Repository\CustomerStrengthRepositoryInterface;

class StrengthService
{
    protected StrengthRepositoryInterface $strengthRepository;
    protected CustomerStrengthRepositoryInterface $customerStrengthRepository;
    protected StrengthFactoryInterface $strengthFactory;

    public function __construct(
        StrengthRepositoryInterface $strengthRepository,
        CustomerStrengthRepositoryInterface $customerStrengthRepository,
        StrengthFactoryInterface $strengthFactory
    )
    {
        $this->strengthRepository = $strengthRepository;
        $this->customerStrengthRepository = $customerStrengthRepository;
        $this->strengthFactory = $strengthFactory;
    }

    public function addStrength(string $title): Strength
    {
        $strength = $this->strengthFactory->create($title);
        $this->strengthRepository->save($strength);

        return $strength;
    }
}
