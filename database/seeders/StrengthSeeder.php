<?php

namespace Database\Seeders;

use App\Models\StrengthInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrengthSeeder extends Seeder
{
    private const TABLE_NAME = "strengths";
    private const ALLOWED_STRENGTH_TITLES = [
        "Appreciation of beauty and excellence",
        "Bravery",
        "Creativity",
        "Curiosity",
        "Fairness",
        "Forgiveness",
        "Gratitude",
        "Honesty",
        "Hope",
        "Humility",
        "Humor",
        "Judgment",
        "Kindness",
        "Leadership",
        "Love",
        "Love of learning",
        "Perseverance",
        "Perspective",
        "Prudence", "Self regulation",
        "Social intelligence",
        "Spirituality",
        "Teamwork",
        "Zest"
    ];

    public function run(): void
    {
        $data = [];
        foreach (self::ALLOWED_STRENGTH_TITLES as $strengthTitle) {
            $data[] = [StrengthInterface::ATTRIBUTE_TITLE => $strengthTitle];
        }
        DB::table(self::TABLE_NAME)->insert($data);
    }
}
