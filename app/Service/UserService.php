<?php

namespace App\Service;

use App\Factory\UserFactory;
use App\Repository\UserRepositoryInterface;

class UserService
{
    protected UserRepositoryInterface $userRepositoryInterface;
    protected UserFactory $userFactory;

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        UserFactory $UserFactory
    ){
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->userFactory = $UserFactory;
    }

    public function addUser(
        string $name,
        string $email,
        string $goal,
        int $age,
        string $idealPartner,
        string $favouriteQuote,
        string $favouriteGame,
        string $availability,
        array $strengths
    ){
        $user = $this->userFactory->create(
            $name,
            $email,
            $goal,
            $age,
            $idealPartner,
            $favouriteQuote,
            $favouriteGame,
            $availability,
            $strengths
        );

        $this->userRepositoryInterface->save($user);
    }

}
