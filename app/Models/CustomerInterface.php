<?php

namespace App\Models;

interface CustomerInterface
{
    public const ATTRIBUTE_ID = "id";
    public const ATTRIBUTE_FULL_NAME = "full_name";
    public const ATTRIBUTE_EMAIL = "email";
    public const ATTRIBUTE_GOAL = "goal";
    public const ATTRIBUTE_AGE = "age";
    public const ATTRIBUTE_IDEAL_PARTNER = "ideal_partner";
    public const ATTRIBUTE_FAVOURITE_QUOTE = "favourite_quote";
    public const ATTRIBUTE_FAVOURITE_GAME = "favourite_game";
    public const ATTRIBUTE_AVAILABILITY = "availability";
    public const ATTRIBUTE_IS_MATCHED = "is_matched";

    public const ALLOWED_GOALS = [
        self::GOAL_TO_START_A_BUSINESS,
        self::GOAL_TO_FIND_A_JOB,
        self::GOAL_SIDE_PROJECT
    ];
    public const GOAL_TO_START_A_BUSINESS = "want to start a business";
    public const GOAL_TO_FIND_A_JOB = "want to find a job";
    public const GOAL_SIDE_PROJECT = "Want to work on a project/ side hussle";

    public const ALLOWED_IDEAL_PARTNER = [
        self::IDEAL_PARTNER_EFFECTIVE,
        self::IDEAL_PARTNER_LAID_BACK
    ];
    public const IDEAL_PARTNER_EFFECTIVE = "more effective & into discipline";
    public const IDEAL_PARTNER_LAID_BACK = "more laid back & takes it slowly";

//    public function getFullName();
//    public function setFullName(string $fullName);
//
//    public function getEmail();
//    public function setEmail(string $email);

    public function getGoal(): string;
    public function setGoal(string $goal);

    public function getAge(): int;
    public function setAge(int $age);

    public function getIdealPartner(): string;
    public function setIdealPartner(string $idealPartner);

    public function getStrengths(): array;
}
