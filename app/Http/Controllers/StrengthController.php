<?php

namespace App\Http\Controllers;

use App\Repository\StrengthRepositoryInterface;
use App\Service\StrengthService;

class StrengthController extends Controller
{
    private StrengthRepositoryInterface $strengthRepository;
    private StrengthService $strengthService;

    public function __construct(
        StrengthRepositoryInterface $strengthRepository,
        StrengthService $strengthService
    )
    {
        $this->strengthRepository = $strengthRepository;
        $this->strengthService = $strengthService;
    }

    public function index()
    {
        $strengths = $this->strengthRepository->getAll();
        var_dump($strengths);
    }
}
