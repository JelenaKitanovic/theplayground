<?php

namespace App\Http\Controllers;

use App\Repository\CustomerRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $userRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function show(int $id)
    {
        var_dump($this->userRepositoryInterface->getById($id));
//        return view("users.details", ["id" => $id]);
    }
}
