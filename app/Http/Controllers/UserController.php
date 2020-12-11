<?php

namespace App\Http\Controllers;

use App\Repository\CustomerRepositoryInterface;

class UserController extends Controller
{
    private $userRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function index()
    {
    }

    public function view(int $id)
    {
        var_dump($this->userRepositoryInterface->getById($id));
        die;
        return view("users.details", ["id" => $id]);
    }
}
