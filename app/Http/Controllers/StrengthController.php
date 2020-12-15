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
        $strengths = [
            'Appreciation of beauty and excellence',
            'Bravery',
            'Creativity',
            'Curiosity',
            'Fairness',
            'Forgiveness',
            'Gratitude',
            'Honesty',
            'Hope',
            'Humility',
            'Humor',
            'Judgment',
            'Kindness',
            'Leadership',
            'Love',
            'Love of learning',
            'Perseverance',
            'Perspective',
            'Prudence',
            'Self regulation',
            'Social intelligence',
            'Spirituality',
            'Teamwork',
            'Zest'
        ];

        foreach ($strengths as $strength) {
            $this->strengthService->addStrength(strtolower($strength));
        }
    }
}
