<?php

namespace App\Http\Controllers;

use App\Repository\EloquentUserRepository;
use App\Repository\StrengthRepositoryInterface;
use App\Repository\CustomerRepositoryInterface;
use App\Service\StrengthService;

class StrengthController extends Controller
{
    private StrengthRepositoryInterface $strengthRepository;
    private StrengthService $strengthService;
    private CustomerRepositoryInterface $userRepository;

    public function __construct(
        StrengthRepositoryInterface $strengthRepository,
        StrengthService $strengthService,
        CustomerRepositoryInterface $userRepository
    ){
        $this->strengthRepository = $strengthRepository;
        $this->strengthService = $strengthService;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = $this->userRepository->getById(1);
        foreach ($user->strengths as $strength){
            var_dump($strength->title);
        }
    }
}
