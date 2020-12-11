<?php

namespace App\Service;

use App\Factory\StrengthFactory;
use App\Models\Strength;
use App\Models\User;
use App\Models\UserStrength;
use App\Repository\StrengthRepositoryInterface;
use App\Repository\UserStrengthRepositoryInterface;

class StrengthService
{
    protected StrengthRepositoryInterface $strengthRepositoryInterface;
    protected UserStrengthRepositoryInterface $userStrengthRepositoryInterface;
    protected StrengthFactory $strengthFactory;

    public function __construct(
        StrengthRepositoryInterface $strengthRepositoryInterface,
        UserStrengthRepositoryInterface $userStrengthRepositoryInterface,
        StrengthFactory $strengthFactory
    )
    {
        $this->strengthRepositoryInterface = $strengthRepositoryInterface;
        $this->userStrengthRepositoryInterface = $userStrengthRepositoryInterface;
        $this->strengthFactory = $strengthFactory;
    }

    public function addStrength(string $title): void
    {
        $strength = $this->strengthFactory->create($title);
        $this->strengthRepositoryInterface->save($strength);
    }

    /**
     * @param User $user
     * @return Strength[]
     */
    public function getByUser(User $user): array
    {
        $strengths = [];

        /** @var UserStrength[] $userStrengths */
        $userStrengths = $this->userStrengthRepositoryInterface->getByUser($user);
        foreach ($userStrengths as $userStrength) {
            $strengths[] = $this->strengthRepositoryInterface->getById($userStrength->getStrengthId());
        }

        return $strengths;
    }
}
