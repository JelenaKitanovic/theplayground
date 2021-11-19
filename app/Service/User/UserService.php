<?php

namespace App\Service;

use App\Factory\UserFactoryInterface;
use App\Models\UserInterface;
use App\Repository\CustomerRepositoryInterface;

class UserService implements UserServiceInterface
{
    /** @var CustomerRepositoryInterface  */
    protected $userRepository;
    /** @var UserFactoryInterface  */
    protected $userFactory;

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
    ): UserInterface {
        $user = $this->userFactory->create($name, $email, $password);
        $this->userRepository->save($user);

        return $user;
    }
}
