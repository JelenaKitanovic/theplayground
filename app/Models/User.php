<?php

namespace App\Models;

class User extends AbstractModel
{
    protected string $name;
    protected string $email;
    protected string $goal;
    protected int $age;
    protected string $idealPartner;
    protected string $favouriteQuote;
    protected string $favouriteGame;
    protected string $availability;
    protected bool $isMatched;

    /** @var Strength[] */
    protected array $strengths;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getGoal(): string
    {
        return $this->goal;
    }

    /**
     * @param string $goal
     */
    public function setGoal(string $goal): void
    {
        $this->goal = $goal;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getIdealPartner(): string
    {
        return $this->idealPartner;
    }

    /**
     * @param string $idealPartner
     */
    public function setIdealPartner(string $idealPartner): void
    {
        $this->idealPartner = $idealPartner;
    }

    /**
     * @return string
     */
    public function getFavouriteQuote(): string
    {
        return $this->favouriteQuote;
    }

    /**
     * @param string $favouriteQuote
     */
    public function setFavouriteQuote(string $favouriteQuote): void
    {
        $this->favouriteQuote = $favouriteQuote;
    }

    /**
     * @return string
     */
    public function getFavouriteGame(): string
    {
        return $this->favouriteGame;
    }

    /**
     * @param string $favouriteGame
     */
    public function setFavouriteGame(string $favouriteGame): void
    {
        $this->favouriteGame = $favouriteGame;
    }

    /**
     * @return string
     */
    public function getAvailability(): string
    {
        return $this->availability;
    }

    /**
     * @param string $availability
     */
    public function setAvailability(string $availability): void
    {
        $this->availability = $availability;
    }

    /**
     * @return bool
     */
    public function isMatched(): bool
    {
        return $this->isMatched;
    }

    /**
     * @param bool $isMatched
     */
    public function setIsMatched(bool $isMatched): void
    {
        $this->isMatched = $isMatched;
    }

    /**
     * @return Strength[]
     */
    public function getStrengths(): array
    {
        return $this->strengths;
    }

    /**
     * @param Strength[] $strengths
     */
    public function setStrengths(array $strengths): void
    {
        $this->strengths = $strengths;
    }
}
