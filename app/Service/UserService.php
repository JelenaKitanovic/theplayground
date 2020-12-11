<?php

namespace App\Service;

use App\Factory\UserFactoryInterface;
use App\Models\User;
use App\Repository\CustomerRepositoryInterface;

class UserService
{
    protected CustomerRepositoryInterface $userRepository;
    protected UserFactoryInterface $userFactory;

    public function __construct(
        CustomerRepositoryInterface $userRepositoryInterface,
        UserFactoryInterface $UserFactory
    ){
        $this->userRepository = $userRepositoryInterface;
        $this->userFactory = $UserFactory;
    }

    public function addUser(
        string $name,
        string $email,
        string $password
    ): User {
        $user = $this->userFactory->create($name, $email, $password);
        $this->userRepository->save($user);

        return $user;
    }
}
